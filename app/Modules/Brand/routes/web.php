<?php
Route::middleware(['auth','brand'])->group(function () {
    Route::get('brand/dashboard', 'BrandController@dashboard');
    Route::get('brand/profile', 'BrandController@profile');
    Route::post('brand/update/account-credential', 'BrandController@updateAccountCredential');
    Route::post('brand/update/bank-detail', 'BrandController@updateBankCredential');
    Route::post('brand/update/business-detail', 'BrandController@updateBusinessCredential');
    Route::post('brand/update/shipping-detail', 'BrandController@updateShippingCredential');
});