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
Route::post('/challenge1', 'HomeController@challenge1answer')->name('answerOne');

Route::get('/verify', 'HomeController@verify');
Route::post('/verify', 'HomeController@checkverify')->name('verify');
Route::post('/ResendCode', 'HomeController@ResendCode')->name('ResendCode');
Route::post('/test', 'welcomeController@test')->name('test');
// for Dr and Drs
Route::get('/Daily_Reward', 'AdminController@DailyRewardShow');
Route::post('/Daily_RewardHome', 'AdminController@DailyRewardHome')->name('DailyRewardHome');
Route::post('/Daily_RewardAway', 'AdminController@DailyRewardAway')->name('DailyRewardAway');
// for us 
Route::get('/Controller', 'AdminController@ControllerShow');
Route::post('/Controller_challengeOpen', 'AdminController@ChallengeOpen')->name('ChallengeOpen');
Route::post('/Controller_challengeClose', 'AdminController@ChallengeClose')->name('ChallengeClose');
Route::post('/Controller_check', 'AdminController@CheckRecord')->name('DailyRewardAway');