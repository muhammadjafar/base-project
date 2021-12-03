<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Auth\LoginController@index')->middleware('guest')->name('backoffice.login');
Route::post('/login', 'Auth\LoginController@authenticate');

Route::middleware('auth.backoffice')->group(function(){
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/dashboard', 'Dashboard\DashboardController@index');
});