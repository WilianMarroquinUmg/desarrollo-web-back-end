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

    Route::apiResource('residentes', 'App\Http\Controllers\Api\ResidenteApiController');

    Route::apiResource('tipos-adquisicions', 'App\Http\Controllers\Api\TipoAdquisicionApiController');

    Route::apiResource('paja-aguas', 'App\Http\Controllers\Api\PajaAguaApiController');

    Route::get('paja-aguas/getDetalles/residente{id}', 'App\Http\Controllers\Api\PajaAguaApiController@getDetallesForResidente');

    Route::get('paja-aguas/from/residente/{id}', 'App\Http\Controllers\Api\PajaAguaApiController@getPajaAguasFromResidente');

    Route::post('traslados-paja-agua', 'App\Http\Controllers\Api\PajaAguaApiController@trasladarResidente');


});


