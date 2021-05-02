<?php

namespace App\Modules\InviteBrand\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Modules\InviteBrand\Models\InviteBrand;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Yajra\DataTables\DataTables;

class InviteBrandController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function inviteBrandList()
    {
        return view("InviteBrand::list");
    }
    public function inviteBrandData()
    {
        $brands = InviteBrand::where('user_id',Auth::user()->id)->get();
        return Datatables::of($brands)
            ->addColumn('invite', function($brand) {
                return '<label class="">'.Carbon::parse($brand->created_at)->format('m/d/Y').'</label>';
            })
            ->rawColumns(['invite'])
            ->make(true);
    }
    public function inviteBrand(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'unique:users', 'unique:invite_brands'],
        ]);
        if ($validator->fails()) {
            return redirect('retailer/invite-brand/list')
                ->withErrors($validator)
                ->withInput();
        }
        $data = [
            'to_email' => $request->email,
            'to_name' => $request->email,
            'from_email' => 'aamirkazitesting@gmail.com',
            'from_name' => 'Shopdot',
            'subject' => 'Invitation',
            'name'=>"aamir",
            'template'=>"emails.brand-invitation",
        ];
        $homeController = New HomeController();
        $homeController->sendEmail($data);

        $brand = new InviteBrand();
        $brand->user_id = Auth::user()->id;
        $brand->email = $request->email;
        $brand->save();

        return redirect('retailer/invite-brand/list')->with('success','Brand invited successfully');
    }
}
