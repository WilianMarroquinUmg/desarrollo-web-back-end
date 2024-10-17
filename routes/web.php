<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// routes/web.php
Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::get('/admin/users', 'AdminController@users')->name('admin.users');
Route::get('/admin/settings', 'AdminController@settings')->name('admin.settings');
