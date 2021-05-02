<?php
Route::middleware(['auth','retailer'])->group(function () {
    Route::get('retailer/register-brand/list', 'RegisterBrandController@registerBrandList');
    Route::get('retailer/register-brand/data', 'RegisterBrandController@registerBrandData');
    Route::get('retailer/register-brand/info/{id}', 'RegisterBrandController@registerBrandInfo');
});
