<?php
Route::middleware(['auth','retailer'])->group(function () {
    Route::get('retailer/invite-brand/list', 'InviteBrandController@inviteBrandList');
    Route::get('retailer/invite-brand/data', 'InviteBrandController@inviteBrandData');
    Route::post('retailer/invite-brand/invite', 'InviteBrandController@inviteBrand');
});
