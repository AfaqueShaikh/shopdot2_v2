<?php

namespace App\Modules\ImportProduct\Http\Controllers;

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

class ImportProductController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function ImportProductList()
    {
        return view("ImportProduct::list");
    }
    public function ImportProductData()
    {
        $products = RetailerProduct::where('retailer_id',Auth::user()->id)->get();
        return Datatables::of($products)
            ->addColumn('image', function($product) {
                $path = url("storage/app/public/".$product->product->user_id."/feature-image/".$product->product->featured_image);
                return '<img width="80px" src="'.$path.'">';
            })
            ->addColumn('category', function($product) {
                return $product->product->category->name;
            })
            ->addColumn('name', function($product) {
                return $product->product->name;
            })
            ->addColumn('sale_price', function($product) {
                return $product->product->sale_price;
            })
            ->addColumn('brand_name', function($product) {
                if($product->product->user->businessDetails){
                    return $product->product->user->businessDetails->brand_name;
                } else {
                    return $product->product->user->name;
                }
            })
            ->addColumn('qty', function($product) {
                if(count($product->product->variants) > 0){
                    return ($product->product->variants->sum('qty')).' qty with '.$product->product->variants->count().' variants';
                }
                return $product->product->qty;
            })
            ->addColumn('shipping', function($product) {
                if($product->product->user->shippingDetails){
                    return '<label class="">'.$product->product->user->shippingDetails->shippingTime($product->product->user_id).'</label>';
                } else {
                    return '<label class="">Not added yet</label>';
                }

            })
            ->addColumn('action', function($product) {
                return;
            })
            ->addColumn('status', function($product) {
                if($product->product->status){
                    return '<label class="label label-success">Active</label>';
                } else {
                    return '<label class="label label-danger">Inactive</label>';
                }
            })
            ->rawColumns(['shipping', 'action', 'image', 'status'])
            ->make(true);
    }
    public function isRequestSent($brand_id, $retailer_id){
        $request = RetailerRequest::where('brand_id', $brand_id)->where('retailer_id', $retailer_id)->first();
        return $request;
    }
}
