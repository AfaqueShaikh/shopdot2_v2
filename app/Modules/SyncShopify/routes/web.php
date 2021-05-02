<?php
Route::middleware(['auth','brand'])->group(function () {
    Route::get('brand/sync-shopify/index', 'SyncShopifyController@index');
    Route::get('brand/sync-shopify/authenticate/{name?}', 'SyncShopifyController@authenticate');
    Route::get('brand/sync-shopify/sync', 'SyncShopifyController@syncShopifyStore');
});