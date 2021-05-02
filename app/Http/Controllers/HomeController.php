<?php

namespace App\Http\Controllers;

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
        if(Auth::check()){
            if(Auth::user()->user_type == 1) {
                return redirect('admin/dashboard');
            } elseif (Auth::user()->user_type == 2) {
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
            } elseif (Auth::user()->user_type == 3) {
                if (Auth::user()->email_verified_at == '') {
                    Auth::logout();
                    return redirect('login')->with('success','Confirmation link has been sent to your email address. Please follow the link to activate your account. If you cannot see it, please check your Spam or Trash folder or contact support@shopdotapp.com.');
                } else {
                    if(Auth::user()->user_status){
                        return redirect('retailer/dashboard');
                    } else{
                        Auth::logout();
                        return redirect('login')->with('error','Your account is inactive please contact with service provider');
                    }
                }
            }
            Auth::logout();
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
}
