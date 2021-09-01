<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'v1'], function () {

    Route::post('token', 'API\UserController@getToken');

    Route::group(['middleware' => ['auth:api']], function () {
        Route::get('doctors', 'API\DoctorController@index');
    });
});
