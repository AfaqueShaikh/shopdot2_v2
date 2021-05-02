<?php
Route::middleware(['auth','retailer'])->group(function () {
    Route::get('retailer/import-product/list', 'ImportProductController@ImportProductList');
    Route::get('retailer/import-product/data', 'ImportProductController@ImportProductData');
});
