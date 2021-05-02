<?php

namespace App\Modules\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use App\Modules\Product\Models\Product;
use App\Modules\Product\Models\ProductDetailImage;
use App\Modules\Product\Models\ProductVariant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Validator;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function productList()
    {
        return view("Product::list");
    }
    public function productData()
    {
        $products = Product::where('user_id',Auth::user()->id)->get();
        return Datatables::of($products)
            ->addColumn('image', function($product) {
                $path = url("storage/app/public/".Auth::user()->id."/feature-image/".$product->featured_image);
                return '<img width="80px" src="'.$path.'">';
            })
            ->addColumn('category', function($product) {
                return $product->category->name;
            })
            ->addColumn('qty', function($product) {
                if(count($product->variants) > 0){
                    return ($product->variants->sum('qty')).' qty with '.$product->variants->count().' variants';
                }
                return $product->qty;
            })
            ->addColumn('status', function($product) {
                if($product->status){
                    return '<label class="label label-success">Active</label>';
                } else {
                    return '<label class="label label-danger">Inactive</label>';
                }

            })
            ->rawColumns(['status', 'image'])
            ->make(true);
    }
    public function productCreate(Request $request)
    {
        if($request->method() == 'GET') {
            $categories = Category::where('user_id',Auth::user()->id)->where('status','1')->get();
            return view("Product::create", compact('categories'));
        } else {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string'],
                'category' => ['required'],
                'weight' => ['required'],
                'sku' => ['required'],
                'price' => ['required'],
                'sell_price' => ['required'],
                'qty' => ['required'],
                'featured_image' => ['required'],
                'offer_price' => ['required_if:offer,1'],
                'start_date' => ['required_if:offer,1'],
                'end_date' => ['required_if:offer,1'],
            ],[
                'offer_price.required_if' => 'The offer price field is required when offer available is yes',
                'start_date.required_if' => 'The offer price field is required when offer available is yes',
                'end_date.required_if' => 'The offer price field is required when offer available is yes'
            ]);
            if ($validator->fails()) {
                return redirect('brand/product/create')
                    ->withErrors($validator)
                    ->withInput();
            }
            $product = new Product();
            $this->productAddEdit($request, $product);
            return redirect('brand/product/list')->with('success','Product added successfully');
        }
    }
    public function productEdit(Request $request, $id)
    {
        $product = Product::find($id);
        if($request->method() == 'GET') {
            $categories = Category::where('user_id',Auth::user()->id)->where('status','1')->get();
            return view("Product::edit", compact('product', 'categories'));
        } else {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string'],
                'category' => ['required'],
                'weight' => ['required'],
                'sku' => ['required'],
                'price' => ['required'],
                'sell_price' => ['required'],
                'qty' => ['required'],
                'offer_price' => ['required_if:offer,1'],
                'start_date' => ['required_if:offer,1'],
                'end_date' => ['required_if:offer,1'],
            ],[
                'offer_price.required_if' => 'The offer price field is required when offer available is yes',
                'start_date.required_if' => 'The offer price field is required when offer available is yes',
                'end_date.required_if' => 'The offer price field is required when offer available is yes'
            ]);
            if ($validator->fails()) {
                return redirect('brand/product/edit/'.$id)
                    ->withErrors($validator)
                    ->withInput();
            }
            $this->productAddEdit($request, $product);
            return redirect('brand/product/list')->with('success','Product updated successfully');
        }
    }
    public function productAddEdit(Request $request, $product){
        $product->user_id = Auth::user()->id;
        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->description = $request->description;
        $product->weight = $request->weight;
        $product->weight_unit = $request->weight_unit;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->sale_price = $request->sell_price;
        $product->qty = $request->qty;
        $product->status = $request->status;
        $product->offer_available = $request->offer;
        if($request->offer){
            $product->offer_price = $request->offer_price;
            $product->offer_startdate = Carbon::parse($request->start_date)->format('m/d/Y');
            $product->offer_enddate = Carbon::parse($request->end_date)->format('m/d/Y');
        }
//            add feature image
        if($request->hasFile('featured_image')){
            $extension = $request->file('featured_image')->getClientOriginalExtension();
            $feature_image_name = str_replace(' ','',str_replace('.','',microtime())).'.'.$extension;
            $feature_image_path = 'public/'.Auth::user()->id.'/feature-image/'.$feature_image_name;
            Storage::put($feature_image_path, file_get_contents($request->file('featured_image')->getRealPath()));
            $product->featured_image = $feature_image_name;
        } else {
            $feature_image_name = $product->featured_image;
        }
        $product->save();
//            add detail images
        if($request->hasFile('detailed_images')){
            foreach ($request->detailed_images as $detailed_image){
                $product_detail_image = new ProductDetailImage();
                $extension = $detailed_image->getClientOriginalExtension();
                $detail_image_name = str_replace(' ','',str_replace('.','',microtime())).'.'.$extension;
                $detail_image_path = 'public/'.Auth::user()->id.'/detail-image/'.$detail_image_name;
                Storage::put($detail_image_path, file_get_contents($detailed_image->getRealPath()));
                $product_detail_image->product_id = $product->id;
                $product_detail_image->name = $detail_image_name;
                $product_detail_image->save();
            }
        }

//            add variant
        if($request->size || $request->color || $request->material){
            foreach ($request->variant_prices as $index=>$price){
                if($price){
                    $product_variant = new ProductVariant();
                    $product_variant->product_id = $product->id;
                    $product_variant->sale_price = $price;
                    $product_variant->image = $feature_image_name;
                    $product_variant->qty = $request->variant_qtys[$index];
                    $product_variant->sku = $request->variant_skus[$index];
                    $product_variant->size = $request->variant_s[$index];
                    $product_variant->color = $request->variant_c[$index];
                    $product_variant->material = $request->variant_m[$index];
                    if($request->variant_images[$index]){
                        $extension = $request->variant_images[$index]->getClientOriginalExtension();
                        $variant_image_name = str_replace(' ','',str_replace('.','',microtime())).'.'.$extension;
                        $variant_image_path = 'public/'.Auth::user()->id.'/variant-image/'.$variant_image_name;
                        Storage::put($variant_image_path, file_get_contents($request->variant_images[$index]->getRealPath()));
                        $product_variant->image = $variant_image_name;
                    }
                    $product_variant->save();
                }
            }
        }
    }
    public function productVariant(Request $request, $id){
        if($request->method() == 'GET'){
            $variants = ProductVariant::where('product_id',$id)->get();
            return view('Product::edit-variant', compact('variants'));
        } else {
            $product = Product::find($id);
            ProductVariant::where('product_id', $id)->delete();
            foreach ($request->variant_prices as $index=>$price){
                if($price){
                    $product_variant = new ProductVariant();
                    $product_variant->product_id = $product->id;
                    $product_variant->sale_price = $price;
                    $product_variant->image = $product->featured_image;
                    $product_variant->qty = $request->variant_qtys[$index];
                    $product_variant->sku = $request->variant_skus[$index];
                    $product_variant->size = $request->variant_size[$index];
                    $product_variant->color = $request->variant_color[$index];
                    $product_variant->material = $request->variant_material[$index];
                    if($request->variant_images[$index]){
                        $extension = $request->variant_images[$index]->getClientOriginalExtension();
                        $variant_image_name = str_replace(' ','',str_replace('.','',microtime())).'.'.$extension;
                        $variant_image_path = 'public/'.Auth::user()->id.'/variant-image/'.$variant_image_name;
                        Storage::put($variant_image_path, file_get_contents($request->variant_images[$index]->getRealPath()));
                        $product_variant->image = $variant_image_name;
                    }
                    $product_variant->save();
                }
            }
            return redirect('brand/product/list')->with('success','Product variant updated successfully');
        }
    }
    public function productDelete($id){
        ProductVariant::where('product_id',$id)->delete();
        ProductDetailImage::where('product_id',$id)->delete();
        Product::destroy($id);
        return redirect('brand/product/list')->with('success','Product deleted successfully');
    }
    public function variantDelete(Request$request){
        ProductVariant::destroy($request->id);
        return ['status'=>'success'];
    }
    public function detailImageDelete(Request$request){
        ProductDetailImage::destroy($request->id);
        return ['status'=>'success'];
    }
    public function productAddVariant(Request $request){
        $colors = explode(',',str_replace(' ','',$request->color));
        $sizes = explode(',',str_replace(' ','',$request->size));
        $materials = explode(',',str_replace(' ','',$request->material));
        $price = $request->price;
        $qty = $request->qty;
        $sku = $request->sku;
        $first = [];
        $second = [];
        $third = [];
        if(count($colors) >= count($sizes) && count($colors) >= count($materials)) {
            $first['type'] = 'color';
            $first['value'] = $colors;
            if(count($sizes) >= count($materials)){
                $second['type'] = 'size';
                $second['value'] = $sizes;
                $third['type'] = 'material';
                $third['value'] = $materials;
            } else {
                $second['type'] = 'material';
                $second['value'] = $materials;
                $third['type'] = 'size';
                $third['value'] = $sizes;
            }
        } elseif (count($sizes) >= count($colors) && count($sizes) >= count($materials)){
            $first['type'] = 'size';
            $first['value'] = $sizes;
            if(count($colors) >= count($materials)){
                $second['type'] = 'color';
                $second['value'] = $colors;
                $third['type'] = 'material';
                $third['value'] = $materials;
            } else {
                $second['type'] = 'material';
                $second['value'] = $materials;
                $third['type'] = 'color';
                $third['value'] = $colors;
            }
        } else {
            $first['type'] = 'material';
            $first['value'] = $materials;
            if(count($colors) >= count($sizes)){
                $second['type'] = 'color';
                $second['value'] = $colors;
                $third['type'] = 'size';
                $third['value'] = $sizes;
            } else {
                $second['type'] = 'size';
                $second['value'] = $sizes;
                $third['type'] = 'color';
                $third['value'] = $colors;
            }
        }
        return view('Product::variant', compact('first','second','third','price','sku','qty'))->render();
    }
}
