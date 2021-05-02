<?php

namespace App\Modules\RetailerRequest\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\RetailerRequest\Models\RetailerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Yajra\DataTables\DataTables;

class RetailerRequestController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function requestList()
    {
        return view("RetailerRequest::list");
    }
    public function retailerrequestData(){
        $retailer_requests = RetailerRequest::where('brand_id', Auth::user()->id)->get();
        return Datatables::of($retailer_requests)
            ->addColumn('retailer', function($request) {
                $name = $request->retailer->businessDetails ? $request->retailer->businessDetails->brand_name : $request->retailer->name;
                return $name;
            })
            ->addColumn('status', function($request) {
                if($request->status){
                    return '<label class="label label-success">Active</label>';
                } else {
                    return '<label class="label label-danger">Inactive</label>';
                }

            })
            ->addColumn('action', function($request) {
                if($request->status){
                    return '<button class="btn btn-danger btn-xs" onclick="changeStatus('.$request->id.',0)">Remove Access</button>';
                } else {
                    return '<button class="btn btn-success btn-xs" onclick="changeStatus('.$request->id.',1)">Allow Access</button>';
                }

            })
            ->rawColumns(['action','status'])
            ->make(true);
    }
    public function retailerrequestStatus(Request $request){
        $retailerRequest = RetailerRequest::find($request->id);
        $retailerRequest->status = $request->status;
        $retailerRequest->save();
        return;
    }
}
