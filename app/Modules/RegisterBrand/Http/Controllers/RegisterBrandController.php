<?php

namespace App\Modules\RegisterBrand\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Yajra\DataTables\DataTables;

class RegisterBrandController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function registerBrandList()
    {
        return view("RegisterBrand::list");
    }
    public function registerBrandData()
    {
        $brands = User::where('user_type','2')->where('user_status','1')->get();
        return Datatables::of($brands)
            ->addColumn('brand', function($brand) {
                if($brand->businessDetails){
                    return '<label class="">'.$brand->businessDetails->brand_name.'</label>';
                } else {
                    return '<label class="">'.$brand->name.'</label>';
                }

            })
            ->addColumn('info', function($brand) {
                $path = url('/retailer/register-brand/info/'.$brand->id);
                if($brand->businessDetails){
                    return '<a href="'.$path.'" class="btn btn-xs btn-primary">Brand Info</a>';
                }
                return 'Info not updated yet';
            })
            ->addColumn('product', function($brand) {
                $path = url('/retailer/retailer-product/list');
                return '<a href="'.$path.'" class="btn btn-xs btn-info">View Products</a>';
            })
            ->rawColumns(['brand','info','product'])
            ->make(true);
    }
    public function registerBrandInfo($id){
        $brand = User::find($id);
        return view("RegisterBrand::info", compact('brand'));
    }
}
