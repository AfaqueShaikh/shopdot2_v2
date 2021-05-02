<?php

namespace App\Modules\Cms\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Cms\Models\Cms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Yajra\DataTables\DataTables;

class CmsController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function returnPolicy(Request $request)
    {
        $cms = Cms::where('title','return-policy')->where('user_id', Auth::user()->id)->first();
        if($request->method() == 'GET') {
            return view("Cms::return-policy", compact('cms'));
        } else {
            $cms->value = $request->cms_data;
            $cms->save();
            return redirect('brand/return-policy')->with('success','Return & Refund policy updated successfully');
        }
    }
    public function shopifyRule(Request $request)
    {
        $cms = Cms::where('title','shopify-sync-rule')->where('user_id', Auth::user()->id)->first();
        if($request->method() == 'GET') {
            return view("Cms::shopify-rule", compact('cms'));
        } else {
            $cms->value = $request->cms_data;
            $cms->save();
            return redirect('brand/shopify-rule')->with('success','Shopify sync rules updated successfully');
        }
    }
}
