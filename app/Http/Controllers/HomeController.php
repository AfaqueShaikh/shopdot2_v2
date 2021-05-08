<?php

namespace App\Http\Controllers;

use App\ContentCreatorInfo;
use App\ContentCreatorSocial;
use App\Jobs\SendEmail;
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
            elseif (Auth::user()->user_type == 4)
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
                            return redirect('/content-creator/to/dashboard');
                        }
                        else
                        {
                            $current_stage = Auth::user()->current_profile_stage;
                            switch ($current_stage)
                            {
                                case "1":
                                    return redirect('/content-creator/info');
                                    break;
                                case "2":
                                    return redirect('/content-creator/extra/info');
                                    break;
                                case "3":
                                    return redirect('/content-creator/content');
                                    break;
                                case "4":
                                    return redirect('/content-creator/values');
                                    break;
                                case "5":
                                    return redirect('/content-creator/connect/shop');
                                    break;
                                case "6":
                                    return redirect('/content-creator/invite/brands');
                                    break;
                                default:
                                    return redirect('/content-creator/to/dashboard');
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
        $info = RetailerInfo::where('user_id',Auth::user()->id)->first();
        if($request->method() == "GET")
        {
            return view('retailer-info',compact('info'));
        }
        else
        {
            if(isset($info))
            {
                $info->business_name = $request->business_name;
                $info->website_address = $request->website_address;
                $info->platform = $request->platform;
                $info->save();
            }
            else
            {
                RetailerInfo::create([
                    "user_id" => Auth::user()->id,
                    "business_name" => $request->business_name,
                    "website_address" => $request->website_address,
                    "platform" => $request->platform,
                ]);
            }
            $update_current_profile_stage = User::where('id',Auth::user()->id)->first();
            if($update_current_profile_stage)
            {
                $update_current_profile_stage->current_profile_stage = '2';
                $update_current_profile_stage->save();
            }
            return redirect('/retailer/extra/info');
        }
    }

    public function retailerExtraInfo(Request $request)
    {
        $info = RetailerInfo::where('user_id',Auth::user()->id)->first();
        if($request->method() == "GET")
        {
            return view('retailer-extra-info',compact('info'));
        }
        else
        {
            $info->interact_with_customer = implode(", ",$request->interact_with_customer);
            $info->find_new_brand = implode(", ",$request->find_new_brand);
            $info->save();

            $update_current_profile_stage = User::where('id',Auth::user()->id)->first();
            if($update_current_profile_stage)
            {
                $update_current_profile_stage->current_profile_stage = '3';
                $update_current_profile_stage->save();
            }
            return redirect('/retailer/category');
        }
    }

    public function retailerCategory(Request $request)
    {
        $info = RetailerInfo::where('user_id',Auth::user()->id)->first();
        if($request->method() == "GET")
        {
            return view('retailer-category',compact('info'));
        }
        else
        {
            $info->category = $request->category;
            $info->save();
            $update_current_profile_stage = User::where('id',Auth::user()->id)->first();
            if($update_current_profile_stage)
            {
                $update_current_profile_stage->current_profile_stage = '4';
                $update_current_profile_stage->save();
            }
            return redirect('/retailer/values');
        }
    }

    public function retailerValues(Request $request)
    {
        $info = RetailerInfo::where('user_id',Auth::user()->id)->first();
        if($request->method() == "GET")
        {
            return view('retailer-value',compact('info'));
        }
        else
        {
            $info->values = implode(", ",$request->value);
            $info->save();

            $update_current_profile_stage = User::where('id',Auth::user()->id)->first();
            if($update_current_profile_stage)
            {
                $update_current_profile_stage->current_profile_stage = '5';
                $update_current_profile_stage->save();
            }
            return redirect('/retailer/connect/shop');
        }
    }

    public function retailerConnectShop(Request $request)
    {
        $info = RetailerInfo::where('user_id',Auth::user()->id)->first();
        if($request->method() == "GET")
        {
            return view('retailer-connect-shop',compact('info'));
        }
        else
        {
            $info->shopify_url = $request->shopify_url;
            $info->save();

            $update_current_profile_stage = User::where('id',Auth::user()->id)->first();
            if($update_current_profile_stage)
            {
                $update_current_profile_stage->current_profile_stage = '6';
                $update_current_profile_stage->save();
            }
            return redirect('/retailer/invite/brands');
        }
    }

    public function retailerInviteBrands(Request $request)
    {
        $info = RetailerInfo::where('user_id',Auth::user()->id)->first();
        return view('retailer-invite-brands',compact('info'));
    }

    public function sendBrandsInvitationMail(Request $request)
    {
        $emails =  json_decode($request->email);
        $details = ['emails' => $emails,'body' => $request->email_content];
        SendEmail::dispatch($details);
        $insert_invited_brands = RetailerInfo::where('user_id',Auth::user()->id)->first();
        if(isset($insert_invited_brands))
        {
            $insert_invited_brands->invited_brands_email = implode(", ",$emails);
            $insert_invited_brands->save();

            $update_current_profile_stage = User::where('id',Auth::user()->id)->first();
            if($update_current_profile_stage)
            {
                $update_current_profile_stage->is_profile_completed = '1';
                $update_current_profile_stage->save();
            }
        }
        $result = array('status' => '1');
        return json_encode($result);
    }

    public function welcomeToDashboard()
    {
        $update_current_profile_stage = User::where('id',Auth::user()->id)->first();
        if($update_current_profile_stage)
        {
            $update_current_profile_stage->is_profile_completed = '1';
            $update_current_profile_stage->save();
        }
        $info = RetailerInfo::where('user_id',Auth::user()->id)->first();
        return view('retailer-welcome-to-dashboard',compact('info'));
    }



    public function contentCreatorInfo(Request $request)
    {
        $info = ContentCreatorInfo::where('user_id',Auth::user()->id)->first();
        if($request->method() == "GET")
        {
            return view('content-creator.content-creator-info',compact('info'));
        }
        else
        {
            if(isset($info))
            {
                $info->business_name = $request->business_name;
                $info->website_address = $request->website_address;
                $info->platform = $request->platform;
                $info->save();
            }
            else
            {
                ContentCreatorInfo::create([
                    "user_id" => Auth::user()->id,
                    "business_name" => $request->business_name,
                    "website_address" => $request->website_address,
                    "platform" => $request->platform,
                ]);
            }
            $update_current_profile_stage = User::where('id',Auth::user()->id)->first();
            if($update_current_profile_stage)
            {
                $update_current_profile_stage->current_profile_stage = '2';
                $update_current_profile_stage->save();
            }
            return redirect('/content-creator/extra/info');
        }
    }

    public function contentCreatorExtraInfo(Request $request)
    {
        $socials = ContentCreatorSocial::where('user_id',Auth::user()->id)->first();
        $info = ContentCreatorInfo::where('user_id',Auth::user()->id)->first();
        if($request->method() == "GET")
        {
            return view('content-creator.content-creator-social-handle',compact('socials','info'));
        }
        else
        {
            if(isset($socials))
            {
                $socials->facebook = $request->facebook;
                $socials->youtube = $request->youtube;
                $socials->instagram = $request->instagram;
                $socials->twitter = $request->twitter;
                $socials->tel_code = $request->tel_code;
                $socials->whatsapp = $request->whatsapp;
                $socials->messenger = $request->messenger;
                $socials->save();
            }
            else
            {
                ContentCreatorSocial::create([
                    "user_id" => Auth::user()->id,
                    "facebook" => $request->facebook,
                    "youtube" => $request->youtube,
                    "instagram" => $request->instagram,
                    "twitter" => $request->twitter,
                    "tel_code" => $request->tel_code,
                    "whatsapp" => $request->whatsapp,
                    "messenger" => $request->messenger,
                ]);
            }
            $update_current_profile_stage = User::where('id',Auth::user()->id)->first();
            if($update_current_profile_stage)
            {
                $update_current_profile_stage->current_profile_stage = '3';
                $update_current_profile_stage->save();
            }
            return redirect('/content-creator/content');
        }
    }

    public function contentCreatorContent(Request $request)
    {
        $info = ContentCreatorInfo::where('user_id',Auth::user()->id)->first();
        $socials = ContentCreatorSocial::select('facebook','youtube','instagram','twitter','whatsapp','messenger')->where('user_id',Auth::user()->id)->first()->toArray();
        if($request->method() == "GET")
        {
            return view('content-creator.content-creator-content-type',compact('info','socials'));
        }
        else
        {
            $info->content_type = $request->content_type;
            $info->about = $request->about;
            $info->save();
            $update_current_profile_stage = User::where('id',Auth::user()->id)->first();
            if($update_current_profile_stage)
            {
                $update_current_profile_stage->current_profile_stage = '4';
                $update_current_profile_stage->save();
            }
            return redirect('/content-creator/values');
        }
    }

    public function contentCreatorValues(Request $request)
    {
        $info = ContentCreatorInfo::where('user_id',Auth::user()->id)->first();
        $socials = ContentCreatorSocial::select('facebook','youtube','instagram','twitter','whatsapp','messenger')->where('user_id',Auth::user()->id)->first()->toArray();
        if($request->method() == "GET")
        {
            return view('content-creator.content-creator-values',compact('info','socials'));
        }
        else
        {
            $info->values = implode(", ",$request->value);
            $info->save();
            $update_current_profile_stage = User::where('id',Auth::user()->id)->first();
            if($update_current_profile_stage)
            {
                $update_current_profile_stage->current_profile_stage = '5';
                $update_current_profile_stage->save();
            }
            return redirect('/content-creator/connect/shop');
        }
    }

    public function contentCreatorConnectShop(Request $request)
    {
        $info = ContentCreatorInfo::where('user_id',Auth::user()->id)->first();
        $socials = ContentCreatorSocial::select('facebook','youtube','instagram','twitter','whatsapp','messenger')->where('user_id',Auth::user()->id)->first()->toArray();
        if($request->method() == "GET")
        {
            return view('content-creator.content-creator-connect-shop',compact('info','socials'));
        }
        else
        {
            $info->shopify_url = $request->shopify_url;
            $info->save();
            $update_current_profile_stage = User::where('id',Auth::user()->id)->first();
            if($update_current_profile_stage)
            {
                $update_current_profile_stage->current_profile_stage = '6';
                $update_current_profile_stage->save();
            }
            return redirect('/content-creator/invite/brands');
        }
    }

    public function contentCreatorInviteBrands(Request $request)
    {
        $info = ContentCreatorInfo::where('user_id',Auth::user()->id)->first();
        $socials = ContentCreatorSocial::select('facebook','youtube','instagram','twitter','whatsapp','messenger')->where('user_id',Auth::user()->id)->first()->toArray();
        return view('content-creator.content-creator-invite-brands',compact('info','socials'));
    }

    public function contentCreatorSendBrandsInvitationMail(Request $request)
    {
        $emails =  json_decode($request->email);
        $details = ['emails' => $emails,'body' => $request->email_content];
        SendEmail::dispatch($details);
        $insert_invited_brands = ContentCreatorInfo::where('user_id',Auth::user()->id)->first();
        if(isset($insert_invited_brands))
        {
            $insert_invited_brands->invited_brands_email = implode(", ",$emails);
            $insert_invited_brands->save();

            $update_current_profile_stage = User::where('id',Auth::user()->id)->first();
            if($update_current_profile_stage)
            {
                $update_current_profile_stage->is_profile_completed = '1';
                $update_current_profile_stage->save();
            }
        }
        $result = array('status' => '1');
        return json_encode($result);
    }

    public function contentCreatorToDashboard()
    {
        $update_current_profile_stage = User::where('id',Auth::user()->id)->first();
        if($update_current_profile_stage)
        {
            $update_current_profile_stage->is_profile_completed = '1';
            $update_current_profile_stage->save();
        }
        $info = ContentCreatorInfo::where('user_id',Auth::user()->id)->first();
        $socials = ContentCreatorSocial::select('facebook','youtube','instagram','twitter','whatsapp','messenger')->where('user_id',Auth::user()->id)->first()->toArray();
        return view('content-creator.content-creator-welcome-to-dashboard',compact('info','socials'));
    }

}
