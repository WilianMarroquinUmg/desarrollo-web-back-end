<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('auth')->group(function () {
    Route::post('signup', 'App\Http\Controllers\API\Auth\AuthApiController@signup')->name('auth.signup');
    Route::post('login', 'App\Http\Controllers\API\Auth\AuthApiController@login')->name('auth.login');
    Route::post('logout', 'App\Http\Controllers\API\Auth\AuthApiController@logout')->middleware('auth:sanctum')->name('auth.logout');
    Route::get('user', 'App\Http\Controllers\API\Auth\AuthApiController@getAuthenticatedUser')->middleware('auth:sanctum')->name('auth.user');

    Route::post('/password/email', 'App\Http\Controllers\API\Auth\AuthApiController@sendPasswordResetLinkEmail')->middleware('throttle:5,1')->name('password.email');
    Route::post('/password/reset', 'App\Http\Controllers\API\Auth\AuthApiController@resetPassword')->name('password.reset');
});


Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::apiResource('users', 'App\Http\Controllers\API\UserApiController');

    Route::apiResource('direcciones', 'App\Http\Controllers\API\DireccionApiController');

    Route::apiResource('residentes', 'App\Http\Controllers\API\ResidenteApiController');

    Route::apiResource('tipos-adquisicions', 'App\Http\Controllers\API\TipoAdquisicionApiController');

    Route::apiResource('paja-aguas', 'App\Http\Controllers\API\PajaAguaApiController');

    Route::get('paja-aguas/getDetalles/residente{id}', 'App\Http\Controllers\API\PajaAguaApiController@getDetallesForResidente');

    Route::get('paja-aguas/from/residente/{id}', 'App\Http\Controllers\API\PajaAguaApiController@getPajaAguasFromResidente');

    Route::post('traslados-paja-agua', 'App\Http\Controllers\API\PajaAguaApiController@trasladarResidente');


});
