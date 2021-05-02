<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('register-confirm', function () {
    return view('register-confirm');
});

Route::get('signin-confirm', function () {
    Auth::logout();
    return view('auth.login2');
});
Route::get('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/login');
});



Auth::routes(['verify' => true]);

Route::get('/retailer/info','HomeController@retailerInfo');
Route::post('/retailer/info','HomeController@retailerInfo');

Route::get('/retailer/extra/info','HomeController@retailerExtraInfo');
Route::post('/retailer/extra/info','HomeController@retailerExtraInfo');

Route::get('/retailer/category','HomeController@retailerCategory');
Route::post('/retailer/category','HomeController@retailerCategory');

Route::get('/retailer/values','HomeController@retailerValues');
Route::post('/retailer/values','HomeController@retailerValues');

Route::get('/retailer/connect/shop','HomeController@retailerConnectShop');
Route::post('/retailer/connect/shop','HomeController@retailerConnectShop');

Route::get('/retailer/invite/brands','HomeController@retailerInviteBrands');
Route::post('/retailer/invite/brands','HomeController@retailerInviteBrands');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/activate/account/{email}/{code}', 'HomeController@activateAccount');
