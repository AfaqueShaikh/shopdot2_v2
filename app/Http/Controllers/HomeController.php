<?php

namespace App\Http\Controllers;

use App\RetailerInfo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check())
        {
            if(Auth::user()->user_type == 1)
            {
                return redirect('admin/dashboard');
            }
            elseif (Auth::user()->user_type == 2)
            {
                if (Auth::user()->user_status) {
                    return redirect('brand/dashboard');
                } else {
                    if(Auth::user()->activation_code == ''){
                        Auth::logout();
                        return redirect('login')->with('success','We have sent activation link to your registered email address successfully');
                    } else{
                        Auth::logout();
                        return redirect('login')->with('error','Your account is inactive please contact with service provider');
                    }
                }
            }
            elseif (Auth::user()->user_type == 3)
            {
                if (Auth::user()->email_verified_at == '')
                {
                    Auth::logout();
                    return redirect('login')->with('success','Confirmation link has been sent to your email address. Please follow the link to activate your account. If you cannot see it, please check your Spam or Trash folder or contact support@shopdotapp.com.');
                }
                else
                {
                    if(Auth::user()->user_status)
                    {
                        if(Auth::user()->is_profile_completed == "1")
                        {
                            return redirect('retailer/dashboard');
                        }
                        else
                        {
                            $current_stage = Auth::user()->current_profile_stage;
                            switch ($current_stage)
                            {
                                case "1":
                                    return redirect('/retailer/info');
                                    break;
                                case "2":
                                    return redirect('/retailer/extra/info');
                                    break;
                                case "3":
                                    return redirect('/retailer/category');
                                    break;
                                case "4":
                                    return redirect('/retailer/values');
                                    break;
                                case "5":
                                    return redirect('/retailer/connect/shop');
                                    break;
                                case "6":
                                    return redirect('/retailer/invite/brands');
                                    break;
                                default:
                                    return redirect('/retailer/info');
                            }
                        }
                    }
                    else
                    {
                        Auth::logout();
                        return redirect('login')->with('error','Your account is inactive please contact with service provider');
                    }
                }
            }

            return redirect('login')->with('error','Something went wrong');
        }
    }

    public function activateAccount($email, $code){
        $user = User::where('email', $email)->where('activation_code', $code)->first();
        if($user){
            $user->activation_code = '';
            $user->user_status = '1';
            $user->save();
            return redirect('login')->with('success','Your account has been activated. You can login now');
        }
        return redirect('login');
    }

    public function sendEmail($data){
        Mail::send($data['template'], $data, function($message) use ($data) {
            $message->to($data['to_email'], $data['to_name'])->subject($data['subject']);
            $message->from($data['from_email'], $data['from_name']);
        });
    }

    public function retailerInfo(Request $request)
    {
        if($request->method() == "GET")
        {
            return view('retailer-info');
        }
        else
        {
            $create_info = RetailerInfo::create([
                "user_id" => Auth::user()->id,
                "business_name" => $request->business_name,
                "website_address" => $request->website_address,
                "platform" => $request->platform,
            ]);
            if($create_info)
            {
                $update_current_profile_stage = User::where('id',Auth::user()->id)->first();
                if($update_current_profile_stage)
                {
                    $update_current_profile_stage->current_profile_stage = '2';
                    $update_current_profile_stage->save();
                }
                return redirect('/retailer/extra/info');
            }
        }
    }

    public function retailerExtraInfo(Request $request)
    {
        if($request->method() == "GET")
        {
            $info = RetailerInfo::where('user_id',Auth::user()->id)->first();
            return view('retailer-extra-info',compact('info'));
        }
        else
        {
            $insert_extra_info = RetailerInfo::where('user_id',Auth::user()->id)->first();
            if(isset($insert_extra_info))
            {
                $insert_extra_info->interact_with_customer = implode(", ",$request->interact_with_customer);
                $insert_extra_info->find_new_brand = implode(", ",$request->find_new_brand);
                $insert_extra_info->save();

                $update_current_profile_stage = User::where('id',Auth::user()->id)->first();
                if($update_current_profile_stage)
                {
                    $update_current_profile_stage->current_profile_stage = '3';
                    $update_current_profile_stage->save();
                }
                return redirect('/retailer/category');
            }
        }
    }

    public function retailerCategory(Request $request)
    {
        if($request->method() == "GET")
        {
            $info = RetailerInfo::where('user_id',Auth::user()->id)->first();
            return view('retailer-category',compact('info'));
        }
        else
        {
            $insert_category = RetailerInfo::where('user_id',Auth::user()->id)->first();
            if(isset($insert_category))
            {
                $insert_category->category = $request->category;
                $insert_category->save();

                $update_current_profile_stage = User::where('id',Auth::user()->id)->first();
                if($update_current_profile_stage)
                {
                    $update_current_profile_stage->current_profile_stage = '4';
                    $update_current_profile_stage->save();
                }
                return redirect('/retailer/values');
            }
        }
    }

    public function retailerValues(Request $request)
    {
        if($request->method() == "GET")
        {
            $info = RetailerInfo::where('user_id',Auth::user()->id)->first();
            return view('retailer-value',compact('info'));
        }
        else
        {
            $insert_values = RetailerInfo::where('user_id',Auth::user()->id)->first();
            if(isset($insert_values))
            {
                $insert_values->values = implode(", ",$request->value);
                $insert_values->save();

                $update_current_profile_stage = User::where('id',Auth::user()->id)->first();
                if($update_current_profile_stage)
                {
                    $update_current_profile_stage->current_profile_stage = '5';
                    $update_current_profile_stage->save();
                }
                return redirect('/retailer/connect/shop');
            }
        }
    }

    public function retailerConnectShop(Request $request)
    {
        if($request->method() == "GET")
        {
            $info = RetailerInfo::where('user_id',Auth::user()->id)->first();
           return view('retailer-connect-shop',compact('info'));
        }
        else
        {
            $insert_shopify_url = RetailerInfo::where('user_id',Auth::user()->id)->first();
            if(isset($insert_shopify_url))
            {
                $insert_shopify_url->shopify_url = $request->shopify_url;
                $insert_shopify_url->save();

                $update_current_profile_stage = User::where('id',Auth::user()->id)->first();
                if($update_current_profile_stage)
                {
                    $update_current_profile_stage->current_profile_stage = '6';
                    $update_current_profile_stage->is_profile_completed = '1';
                    $update_current_profile_stage->save();
                }
                return redirect('retailer/dashboard');
            }
        }
    }

    public function retailerInviteBrands(Request $request)
    {
        if($request->method() == "GET")
        {
            dd('Retailor invite brands');
        }
        else
        {

        }
    }

}
