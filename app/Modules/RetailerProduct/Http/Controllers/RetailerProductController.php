<?php

namespace App\Modules\RetailerProduct\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Product\Models\Product;
use App\Modules\RetailerProduct\Models\RetailerProduct;
use App\Modules\RetailerRequest\Models\RetailerRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Yajra\DataTables\DataTables;

class RetailerProductController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function RetailerProductList()
    {
        return view("RetailerProduct::list");
    }
    public function RetailerProductData()
    {
        $products = Product::where('status','1')->get();
        return Datatables::of($products)
            ->addColumn('image', function($product) {
                $path = url("storage/app/public/".$product->user_id."/feature-image/".$product->featured_image);
                return '<img width="80px" src="'.$path.'">';
            })
            ->addColumn('category', function($product) {
                return $product->category->name;
            })
            ->addColumn('brand_name', function($product) {
                if($product->user->businessDetails){
                    return $product->user->businessDetails->brand_name;
                } else {
                    return $product->user->name;
                }
            })
            ->addColumn('qty', function($product) {
                if(count($product->variants) > 0){
                    return ($product->variants->sum('qty')).' qty with '.$product->variants->count().' variants';
                }
                return $product->qty;
            })
            ->addColumn('shipping', function($product) {
                if($product->user->shippingDetails){
                    return '<label class="">'.$product->user->shippingDetails->shippingTime($product->user_id).'</label>';
                } else {
                    return '<label class="">Not added yet</label>';
                }

            })
            ->addColumn('action', function($product) {
                $retailer_product = RetailerProduct::where('product_id', $product->id)->where('retailer_id', Auth::user()->id)->first();
                $retailer_request = $this->isRequestSent($product->user_id, Auth::user()->id);
                if($retailer_request){
                    if($retailer_request->status){
                        if(!$retailer_product){
                            return '<button class="btn btn-info btn-xs" onclick="importProduct('.$product->id.')">Import</button>';
                        }
                    } else {
                        return '<button class="btn btn-warning btn-xs">Request Pending</button>';
                    }
                } else {
                    return '<button class="btn btn-primary btn-xs" onclick="requestToAccess('.$product->user_id.')">Request to access</button>';
                }
            })
            ->addColumn('status', function($product) {
                $retailer_request = $this->isRequestSent($product->user_id, Auth::user()->id);
                $retailer_product = RetailerProduct::where('product_id', $product->id)->where('retailer_id', Auth::user()->id)->first();
                if($retailer_request){
                    if($retailer_request->status){
                        if(!$retailer_product) {
                            return '<label class="label label-info">import now</label>';
                        } else {
                            return '<label class="label label-success">imported</label>';
                        }
                    } else {
                        return '<label class="label label-warning">request sent to the brand</label>';
                    }
                } else {
                    return '<label class="label label-primary">send request for access</label>';
                }
            })
            ->rawColumns(['shipping', 'action', 'image', 'status'])
            ->make(true);
    }
    public function RetailerProductSearch(Request $request){

    }
    public function requestAccess(Request $request){
        $retailerRequest = new RetailerRequest();
        $retailerRequest->brand_id = $request->id;
        $retailerRequest->retailer_id = Auth::user()->id;
        $retailerRequest->save();
        return ['status'=>'1'];
    }
    public function isRequestSent($brand_id, $retailer_id){
        $request = RetailerRequest::where('brand_id', $brand_id)->where('retailer_id', $retailer_id)->first();
        return $request;
    }
    public function importProduct(Request $request){
        $retailerProduct = new RetailerProduct();
        $retailerProduct->retailer_id = Auth::user()->id;
        $retailerProduct->product_id = $request->id;
        $retailerProduct->save();
        return ['status'=>'1'];
    }
}
