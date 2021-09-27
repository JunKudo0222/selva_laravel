<?php

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

// Auth::routes();
Route::get('php/login.php', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('php/login.php', 'Auth\LoginController@login');
Route::post('php/logout.php', 'Auth\LoginController@logout')->name('logout');

Route::get('member_regist.php', 'Auth\RegisterController@showRegistrationForm')->name('user.register_show');
Route::post('member_regist.php', 'Auth\RegisterController@post')->name('user.register_post');
Route::get('member_regist.php/confirm', 'Auth\RegisterController@confirm')->name('user.register_confirm');
Route::post('member_regist.php/confirm', 'Auth\RegisterController@register')->name('user.register_register');
Route::get('member_regist.php/complete', 'Auth\RegisterController@complete')->name('user.register_complete');


Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');






Route::get('/home', 'HomeController@index')->name('home');





Route::resource('users','UsersController',['only'=>['destroy']]);
Route::get('php/member_withdrawal.php','UsersController@delete_confirm')->name('users.delete_confirm');
