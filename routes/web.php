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

Route::get('/', function () {
    return view('welcome');
});

Route::get('physiolung', function () {
    return view('lungs.physiolung');
});

//Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');
Route::get('password/confirm', 'Auth\LoginController@showConfirmForm')->name('password.confirm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::get('home', 'HomeController@index')->name('home');
Route::get('xlung-pcv', 'HomeController@xLungPcv')->name('xlung-pcv');
Route::post('xlung-pcv', 'HomeController@xLungPost')->name('xlung-pcv');
Route::get('xlung-vcv', 'HomeController@xLungVcv')->name('xlung-vcv');
Route::post('xlung-vcv', 'HomeController@xLungPost')->name('xlung-vcv');
Route::get('psv', 'HomeController@psv')->name('psv');
Route::post('psv', 'HomeController@psvPost')->name('psv');
