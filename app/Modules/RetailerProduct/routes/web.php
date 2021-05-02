<?php
Route::middleware(['auth','retailer'])->group(function () {
    Route::get('retailer/retailer-product/list', 'RetailerProductController@retailerProductList');
    Route::get('retailer/retailer-product/data', 'RetailerProductController@retailerProductData');
    Route::get('retailer/retailer-product/search', 'RetailerProductController@retailerProductSearch');
    Route::get('retailer/request-access', 'RetailerProductController@requestAccess');
    Route::get('retailer/product/import', 'RetailerProductController@importProduct');
});
