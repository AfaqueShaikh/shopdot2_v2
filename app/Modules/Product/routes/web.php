<?php
Route::middleware(['auth','brand'])->group(function () {
    Route::get('brand/product/list', 'ProductController@productList');
    Route::get('brand/product/data', 'ProductController@productData');
    Route::get('brand/product/create', 'ProductController@productCreate');
    Route::get('brand/product/add-variant', 'ProductController@productAddVariant');
    Route::post('brand/product/create', 'ProductController@productCreate');
    Route::get('brand/product/edit/{id}', 'ProductController@productEdit');
    Route::post('brand/product/edit/{id}', 'ProductController@productEdit');
    Route::get('brand/product/edit/variant/{id}', 'ProductController@productVariant');
    Route::post('brand/product/edit/variant/{id}', 'ProductController@productVariant');
    Route::get('brand/product/delete/{id}', 'ProductController@productDelete');
    Route::get('brand/product/remove-variant', 'ProductController@variantDelete');
    Route::get('brand/product/remove-detail-image', 'ProductController@detailImageDelete');
});
