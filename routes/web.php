<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false, 'verify' => true, 'reset' => true]);
Auth::routes(['login' => false, 'verify' => true, 'reset' => true]);

Route::group(['prefix' => '', 'as' => 'admin.', 'namespace' => 'Admin'], function () {

    Route::get('/',  [App\Http\Controllers\Admin\PagesController::class, 'getRgisterPage'])->name('register_client');
    Route::get('/admins_panel',  [App\Http\Controllers\Admin\PagesController::class, 'getAdminPage'])->name('admin_page');
    Route::get('/home/{link}', [App\Http\Controllers\Admin\PagesController::class, 'getHomePage'])->middleware('check_if_link_admin');
    Route::get('/home/delete_link', [App\Http\Controllers\Admin\PagesController::class, 'get_Delete_Link_Page']);

});
