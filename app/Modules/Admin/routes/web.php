<?php
Route::middleware(['auth'])->group(function () {
    Route::get('admin/dashboard', 'AdminController@welcome');
});