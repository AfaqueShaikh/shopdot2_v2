<?php
Route::middleware(['auth'])->group(function () {
    //Route::get('brand/order/index', 'OrderController@index');
    Route::get('brand/order/list', function () {
        return view('work-in-progress');
    });
    Route::get('brand/order/data', 'OrderController@orderData');
    Route::get('brand/order/create', 'OrderController@orderCreate');
    Route::post('brand/order/create', 'OrderController@orderCreate');
    Route::get('brand/order/edit/{id}', 'OrderController@orderEdit');
    Route::post('brand/order/edit/{id}', 'OrderController@orderEdit');
    Route::get('brand/order/delete/{id}', 'OrderController@orderDelete');
});
