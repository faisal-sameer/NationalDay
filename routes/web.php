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

Route::get('/king', 'welcomeController@king');

Route::get('/home', 'HomeController@index');
Route::get('/challenge1', 'HomeController@challenge1');
Route::post('/challenge1', 'HomeController@challenge1answer')->name('answerOne');
Route::get('/challenge2', 'HomeController@challenge2');
Route::post('/challenge2', 'HomeController@challenge2answer')->name('answerTwo');
Route::get('/challenge3', 'HomeController@challenge3');
Route::post('/challenge3', 'HomeController@challenge3answer')->name('answerThree');

Route::get('/challenge4', 'HomeController@challenge4');
Route::post('/challenge4', 'HomeController@challenge4answer')->name('answerFour');

Route::get('/challenge5', 'HomeController@challenge5');
Route::post('/challenge5', 'HomeController@challenge5answer')->name('answerFive');

Route::get('/challenge6', 'HomeController@challenge6');
Route::post('/challenge6', 'HomeController@challenge6answer')->name('answerSix');

Route::get('/challenge7', 'HomeController@challenge7');
Route::post('/challenge7', 'HomeController@challenge7answer')->name('answerSeven');

Route::get('/challenge8', 'HomeController@challenge8');
Route::post('/challenge8', 'HomeController@challenge8answer')->name('answerEight');

Route::get('/challenge9', 'HomeController@challenge9');
Route::post('/challenge9', 'HomeController@challenge9answer')->name('answeNine');

Route::get('/challenge10', 'HomeController@challenge10');
Route::post('/challenge10', 'HomeController@challenge10answer')->name('answerTen');




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
Route::post('/Controller_check', 'AdminController@CheckRecord');
