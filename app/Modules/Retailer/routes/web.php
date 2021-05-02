<?php
Route::middleware(['auth','retailer'])->group(function ()
{
    Route::get('retailer/dashboard', 'RetailerController@dashboard');
    Route::get('retailer/profile', 'RetailerController@profile');
    Route::post('retailer/update/account-credential', 'RetailerController@updateAccountCredential');
    Route::post('retailer/update/bank-detail', 'RetailerController@updateBankCredential');
    Route::post('retailer/update/business-detail', 'RetailerController@updateBusinessCredential');
    Route::post('retailer/update/shipping-detail', 'RetailerController@updateShippingCredential');
});