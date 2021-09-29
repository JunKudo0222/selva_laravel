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





// 一覧
Route::get('/users', 'UsersController@index')->name('users.index');
// 保存
Route::post('/users', 'UsersController@store')->name('users.store');
// 作成
Route::get('/users/{user_id}', 'UsersController@show')->name('users.show');
// 編集
Route::get('/edit/{user_id}', 'UsersController@edit')->name('users.edit');
// 更新
Route::put('/{user_id}', 'UsersController@update')->name('users.update');
// 削除
Route::delete('/{user_id}', 'UsersController@destroy')->name('users.destroy');
Route::get('php/member_withdrawal.php','UsersController@delete_confirm')->name('users.delete_confirm');




Route::get('/search', 'PostController@search')->name('posts.search');
Route::group(['middleware' => 'auth'], function() {
    Route::get('/create', 'PostController@create')->name('posts.create');
    Route::post('/confirm', 'PostController@confirm')->name('posts.confirm');
});
// 一覧
Route::get('/posts', 'PostController@index')->name('posts.index');
// 保存
Route::post('/posts', 'PostController@store')->name('posts.store');
// 作成
Route::get('/posts/{post_id}', 'PostController@show')->name('posts.show');
// 編集
Route::get('/edit/{post_id}', 'PostController@edit')->name('posts.edit');
// 更新
Route::put('/{post_id}', 'PostController@update')->name('posts.update');
// 削除
Route::delete('/{post_id}', 'PostController@destroy')->name('posts.destroy');





Route::resource('comments', 'CommentController');
