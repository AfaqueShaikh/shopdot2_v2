<?php

namespace App\Modules\SyncShopify\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use App\Modules\Product\Models\Product;
use App\Modules\Product\Models\ProductDetailImage;
use App\Modules\Product\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Yajra\DataTables\DataTables;

class SyncShopifyController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("SyncShopify::index");
    }
    public function authenticate(Request $request, $name){
        $hmac = $request->hmac;
        $shop = $name;
        $timestamp = $request->timestamp;
//        $rediect_url = 'https://771f7c356908.ngrok.io/shopdot/brand/sync-shopify/sync';
        $rediect_url = url('/brand/sync-shopify/sync');
        $rediect_url = str_replace('http:','https:', $rediect_url);
        $scope = "read_orders,write_products,read_themes,write_themes";
//        $api_key = "a7b93b025f1485abdd2765ff88fdf92f";
        $api_key = "539e99f54bacbcc304b57afe482b6aea";
        return redirect('https://'.$shop.'.myshopify.com/admin/oauth/authorize?client_id='.$api_key.'&scope='.$scope.'&redirect_uri='.urlencode($rediect_url));
    }
    public function syncShopifyStore(Request $request){
        $hmac = $request->hmac;
        $shop = $request->shop;
        $timestamp = $request->timestamp;
        $code = $request->code;
        $query = [
//            'client_id' => "a7b93b025f1485abdd2765ff88fdf92f",
//            'client_secret' => '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',
            'client_id' => "539e99f54bacbcc304b57afe482b6aea",
            'client_secret' => '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',
            'code' => $code
        ];
        $access_token_url = 'https://'.$shop.'/admin/oauth/access_token';
        $header = [];
        $result = $this->shopifyCall($header, $access_token_url, 'POST',$query);
        $access_token = $result->access_token;

        $header = ['X-Shopify-Access-Token: '.$access_token];
        $access_token_url = 'https://'.$shop.'/admin/api/2021-01/products.json';
        $products = $this->shopifyCall($header, $access_token_url, 'GET',$query);
        $this->storeProduct($products);
        return view('shopify');
    }
    public function getCategoryId($cat){
        if($cat) {
            $category = Category::where('name', $cat)->where('user_id', Auth::user()->id)->first();
            if (!$category) {
                $category = new Category();
                $category->user_id = Auth::user()->id;
                $category->name = $cat;
                $category->status = '1';
                $category->save();
            }
            return $category->id;
        }
        return 0;
    }
    public function storeProduct($products){
        foreach ($products as $product){
            foreach($product as $p){
                $productStore = new Product();
                $productStore->user_id = Auth::user()->id;
                $productStore->name = $p->title;
                $productStore->category_id = $this->getCategoryId($p->product_type);
                $productStore->description = $p->body_html;
                $productStore->weight = $p->variants[0]->weight;
                $productStore->weight_unit = $p->variants[0]->weight_unit;
                $productStore->sku = $p->variants[0]->sku;
                $productStore->price = 1.00;
                $productStore->sale_price = $p->variants[0]->price;
                $productStore->qty = $p->variants[0]->inventory_quantity;
                $productStore->status = $p->status == 'active' ? '1' : '0';
                $productStore->offer_available = '0';
                $productStore->featured_image = $p->image->src;
                $productStore->sync_from_shopify = '1';
                $productStore->save();

                foreach($p->images as $image){
                    $product_detail_image = new ProductDetailImage();
                    $product_detail_image->product_id = $productStore->id;
                    $product_detail_image->name = $image->src;
                    $product_detail_image->save();
                }

                foreach ($p->variants as $variant){
                    $product_variant = new ProductVariant();
                    $product_variant->product_id = $productStore->id;
                    $product_variant->sale_price = $variant->price;
                    $product_variant->image = $p->image->src;
                    $product_variant->qty = $p->variants[0]->inventory_quantity;
                    $product_variant->sku = $p->variants[0]->sku;
                    $product_variant->save();
                }
            }
        }
        return;
    }
    public function shopifyCall($header, $url, $method, $data){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_URL, $url);
        if($method == 'POST'){
            curl_setopt($ch, CURLOPT_POST, count($data));
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        }
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result);
    }
}
