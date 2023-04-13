<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'v1',  'as' => 'api.', 'namespace' => 'Api\V1'], function () {

    Route::post('send_data_for_register_client', [App\Http\Controllers\Api\V1\UserController::class, 'send_data_registration']);
    Route::post('send_edit_client_value', [App\Http\Controllers\Api\V1\UserController::class, 'edit_client_in_DB']);
    Route::post('send_value_Delete_client', [App\Http\Controllers\Api\V1\UserController::class, 'delete_client_from_DB']);
    Route::get('get_all_clients', [App\Http\Controllers\Api\V1\UserController::class, 'get_all_clients']);

    Route::post('send_value_for_delete_link', [App\Http\Controllers\Api\V1\UserController::class, 'delete_link']);
    Route::post('send_value_for_get_new_link', [App\Http\Controllers\Api\V1\UserController::class, 'generate_new_link']);

    Route::post('send_value_for_FEEL_LOCK', [App\Http\Controllers\Api\V1\UserController::class, 'value_feelLock']);
    Route::post('query_history_for_FEEL_LOCK', [App\Http\Controllers\Api\V1\UserController::class, 'history_feelLock']);
    Route::post('insert_and_FEEL_LOCK_result', [App\Http\Controllers\Api\V1\UserController::class, 'step1_for_feelLocky_result']);



});

