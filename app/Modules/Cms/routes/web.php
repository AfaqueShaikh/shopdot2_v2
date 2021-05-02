<?php
Route::middleware(['auth','brand'])->group(function () {
    Route::get('brand/return-policy', 'CmsController@returnPolicy');
    Route::post('brand/return-policy', 'CmsController@returnPolicy');
    Route::get('brand/shopify-rule', 'CmsController@shopifyRule');
    Route::post('brand/shopify-rule', 'CmsController@shopifyRule');
});
