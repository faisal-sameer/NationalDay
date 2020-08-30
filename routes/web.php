<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::post('/Register', 'Auth\RegisterController@createUser')->name('register');
Route::get('/Register', 'Auth\RegisterController@register');

Route::get('/', 'welcomeController@welcome');

Route::get('/home', 'HomeController@index');
Route::get('/challenge1', 'HomeController@challenge1');

Route::get('/verify', 'HomeController@verify');
Route::post('/verify', 'HomeController@checkverify')->name('verify');
Route::post('/ResendCode', 'HomeController@ResendCode')->name('ResendCode');
Route::post('/test', 'welcomeController@test')->name('test');
