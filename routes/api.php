<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('auth')->group(function () {
    Route::post('signup', 'App\Http\Controllers\Api\Auth\AuthApiController@signup')->name('auth.signup');
    Route::post('login', 'App\Http\Controllers\Api\Auth\AuthApiController@login')->name('auth.login');
    Route::post('logout', 'App\Http\Controllers\Api\Auth\AuthApiController@logout')->middleware('auth:sanctum')->name('auth.logout');
    Route::get('user', 'App\Http\Controllers\Api\Auth\AuthApiController@getAuthenticatedUser')->middleware('auth:sanctum')->name('auth.user');

    Route::post('/password/email', 'App\Http\Controllers\Api\Auth\AuthApiController@sendPasswordResetLinkEmail')->middleware('throttle:5,1')->name('password.email');
    Route::post('/password/reset', 'App\Http\Controllers\Api\Auth\AuthApiController@resetPassword')->name('password.reset');
});


Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::apiResource('users', 'App\Http\Controllers\Api\UserApiController');

    Route::apiResource('direcciones', 'App\Http\Controllers\Api\DireccionApiController');

});


