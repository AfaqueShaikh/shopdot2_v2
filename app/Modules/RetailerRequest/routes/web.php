<?php
Route::middleware(['auth','brand'])->group(function () {
    Route::get('brand/retailer-request/list', 'RetailerRequestController@requestList');
    Route::get('brand/retailer-request/data', 'RetailerRequestController@retailerrequestData');
    Route::get('brand/retailer-request/status', 'RetailerRequestController@retailerrequestStatus');
});