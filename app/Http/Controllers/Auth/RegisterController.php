<?php

namespace App\Http\Controllers\Auth;

use App\AdminCms;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Modules\Cms\Models\Cms;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = 'register-confirm';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function showRegistrationForm()
    {
//        $slug = $request->userType == '2' ? 'brand-terms-and-privacy' : 'retailer-terms-and-privacy';
        $data = AdminCms::where('slug','retailer-terms-and-privacy')->first();
        return view('auth.register', ['policy'=> $data]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'agree_term' => ['required'],
        ],[
            'password.regex'=> "Must be a combination of at least 8 lowercase and uppercase letters, numbers and special character"
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {


        $user = User::create([
            'first_name' => isset($data['first_name']) ? $data['first_name'] : '',
            'last_name' => isset($data['last_name']) ? $data['last_name'] : '',
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'agree_term' => '1',
            'user_type' => $data['user_type'],
            'user_status' => '1',
        ]);
        if($user->user_type == '2'){
            $cms = new Cms();
            $cms->user_id = $user->id;
            $cms->title = 'return-policy';
            $cms->value = '';
            $cms->save();

            $cms = new Cms();
            $cms->user_id = $user->id;
            $cms->title = 'shopify-sync-rule';
            $cms->value = '';
            $cms->save();

            $template = "emails.brand-activation";
        } else{
            $template = "emails.retailer-activation";
        }
        $data = [
                'to_email' => $data['email'],
                'to_name' => $data['email'],
                'from_email' => 'shopdot@gmail.com',
                'from_name' => 'Shopdot',
                'subject' => 'Account activation',
                'name'=>"Shopdot",
                'template'=>$template,
                'activation_code'=>$user->activation_code,
            ];
//        $homeController = new HomeController();
//        $homeController->sendEmail($data);
        return $user;
    }
}
