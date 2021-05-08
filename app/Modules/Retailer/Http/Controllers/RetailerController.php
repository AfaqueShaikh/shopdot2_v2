<?php

namespace App\Modules\Retailer\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\Modules\Brand\Models\BankDetail;
use App\Modules\Brand\Models\BusinessDetail;
use App\Modules\Brand\Models\ShippingDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Http\Request;

class RetailerController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {

        return view("Retailer::dashboard");
    }
    public function profile(){
        return view('Retailer::profile');
    }
    public function updateAccountCredential(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.Auth::user()->id],
            'password' => ['required', 'string', 'min:8'],
            'new_password' => ['required', 'string', 'min:8'],
        ]);
        if ($validator->fails()) {
            return redirect('retailer/profile#credential')
                ->withErrors($validator)
                ->withInput();
        }
        $user = User::find(Auth::user()->id);
        $user->email = $request->email;
        if($request->password){
            if(Hash::check($request->password,$user->password)){
                $user->password = Hash::make($request->new_password);
            } else {
                return redirect('retailer/profile#credential')->with('error','Old password does not match with our record');
            }
        }
        $user->save();
        return redirect('retailer/profile#credential')->with('success','Credential changed successfully');
    }
    public function updateBankCredential(Request $request){
        $validator = Validator::make($request->all(), [
            'bank_name' => ['required'],
            'account_number' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect('retailer/profile#bank-setting')
                ->with('bank-setting','')
                ->withErrors($validator)
                ->withInput();
        }
        $bank = BankDetail::where('user_id', Auth::user()->id)->first();
        if(!$bank){
            $bank = new BankDetail();
        }
        $bank->bank_name= $request->bank_name;
        $bank->account_number = $request->account_number;
        $bank->user_id = Auth::user()->id;
        $bank->save();
        return redirect('retailer/profile#bank-setting')->with('success','Bank details added successfully')->with('bank-setting','');
    }
    public function updateBusinessCredential(Request $request){
        $validator = Validator::make($request->all(), [
            'retailer_name' => ['required'],
            'company_name' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'zip' => ['required'],
            'country' => ['required'],
            'phone' => ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect('retailer/profile#business-setting')
                ->with('business-setting','')
                ->withErrors($validator)
                ->withInput();
        }
        $user = User::find(Auth::user()->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->save();

        $business = BusinessDetail::where('user_id', $user->id)->first();
        if(!$business){
            $business = new BusinessDetail();
        }
        $business->brand_name= $request->retailer_name;
        $business->company_name = $request->company_name;
        $business->city = $request->city;
        $business->state = $request->state;
        $business->zip = $request->zip;
        $business->country = $request->country;
        $business->phone = $request->phone;
        $business->fax = $request->fax;
        $business->user_id = Auth::user()->id;
        $business->save();
        return redirect('retailer/profile#business-setting')->with('success','Business details added successfully')->with('business-setting','');
    }
}
