<?php
Route::middleware(['auth','brand'])->group(function () {
    Route::get('brand/category/list', 'CategoryController@categoryList');
    Route::get('brand/category/data', 'CategoryController@categoryData');
    Route::get('brand/category/create', 'CategoryController@categoryCreate');
    Route::post('brand/category/create', 'CategoryController@categoryCreate');
    Route::get('brand/category/edit/{id}', 'CategoryController@categoryEdit');
    Route::post('brand/category/edit/{id}', 'CategoryController@categoryEdit');
    Route::get('brand/category/delete/{id}', 'CategoryController@categoryDelete');
});
