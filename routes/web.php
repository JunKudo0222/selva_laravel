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

// //入力フォーム画面を表示する。
// Route::get('/', function () {
//     return view('test');
// });
 
// //ajax通信をポストで受け取った際に処理を実行する。
// Route::post('/test', 'TestController@test');





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
Route::post('/edit/{user_id}', 'UsersController@post')->name('users.post');
//レビュー編集
Route::get('/editreview/{user_id}', 'UsersController@editreview')->name('users.editreview');

// 更新
Route::put('/{id}', 'UsersController@update')->name('users.update');
// 削除
Route::delete('/{user_id}', 'UsersController@destroy')->name('users.destroy');
Route::get('php/member_withdrawal.php','UsersController@delete_confirm')->name('users.delete_confirm');




Route::get('/search', 'PostController@search')->name('posts.search');
Route::group(['middleware' => 'auth'], function() {
    Route::post('/confirm', 'PostController@confirm')->name('posts.confirm');
    Route::get('/create', 'PostController@create')->name('posts.create');
    //ajax通信をポストで受け取った際に処理を実行する。
    Route::post('/create/create', 'PostController@test')->name('posts.test');
});
// 一覧
Route::get('/posts', 'PostController@index')->name('posts.index');
// 保存
Route::get('/ajaxtest', 'PostController@ajaxtest')->name('posts.ajaxtest');
//ajax
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
Route::post('comments/confirm', 'CommentController@confirm')->name('comments.confirm');
Route::get('comments/delete/{id}', 'CommentController@destroyconfirm')->name('comments.destroyconfirm');
Route::post('comments/editconfirm', 'CommentController@editconfirm')->name('comments.editconfirm');




//管理側
Route::group(['middleware' => ['auth.admin']], function () {
	
	//管理側トップ
	Route::get('php/admin.php', 'admin\AdminTopController@show')->name('admin.top');
	//ログアウト実行
	Route::post('php/admin/logout.php', 'admin\AdminLogoutController@logout');
	//ユーザー一覧
	Route::get('php/admin/member.php', 'admin\ManageUserController@showUserList')->name('members.userlist');
    //ユーザー検索
	Route::get('php/admin/member.php/search', 'admin\ManageUserController@search')->name('members.search');
	//ユーザー詳細
	Route::get('php/admin/member_detail.php/{id}', 'admin\ManageUserController@showUserDetail')->name('members.detail');
	//ユーザー編集
	Route::get('php/admin/member_edit.php/{id}', 'admin\ManageUserController@edit')->name('members.edit');
	Route::post('php/admin/member_edit.php', 'admin\ManageUserController@post')->name('members.post');
	//ユーザー編集確認
	Route::get('php/admin/member_edit.php/confirm', 'admin\ManageUserController@editconfirm')->name('members.editconfirm');
	//ユーザー編集完了
	Route::put('php/admin/member_edit.php/{id}', 'admin\ManageUserController@update')->name('members.update');
    //ユーザー登録
	Route::get('php/admin/member_regist.php', 'admin\ManageUserController@showRegistrationForm')->name('members.register_show');
	//ユーザー登録完了
	Route::post('php/admin/member_regist.php', 'admin\ManageUserController@register')->name('members.register');



	//商品カテゴリ一覧
	Route::get('php/admin/category.php', 'admin\ManageCategoryController@showCategoryList')->name('categories.categorylist');
    //商品カテゴリ検索
	Route::get('php/admin/category.php/search', 'admin\ManageCategoryController@search')->name('categories.search');
	//商品カテゴリ詳細
	Route::get('php/admin/category_detail.php/{id}', 'admin\ManageCategoryController@showCategoryDetail')->name('categories.detail');
	//商品カテゴリ編集
	Route::get('php/admin/category_edit.php/{id}', 'admin\ManageCategoryController@edit')->name('categories.edit');
	Route::post('php/admin/category_edit.php', 'admin\ManageCategoryController@post')->name('categories.post');
	//商品カテゴリ編集確認
	Route::get('php/admin/category_edit.php/confirm', 'admin\ManageCategoryController@editconfirm')->name('categories.editconfirm');
	//商品カテゴリ編集完了
	Route::put('php/admin/category_edit.php/{id}', 'admin\ManageCategoryController@update')->name('categories.update');
    //商品カテゴリ登録
	Route::get('php/admin/category_regist.php', 'admin\ManageCategoryController@showRegistrationForm')->name('categories.register_show');
	//商品カテゴリ登録完了
	Route::post('php/admin/category_regist.php', 'admin\ManageCategoryController@register')->name('categories.register');
    //商品カテゴリ削除
    Route::delete('php/admin/category_delete.php/{id}', 'admin\ManageCategoryController@destroy')->name('categories.destroy');



	//商品一覧
	Route::get('php/admin/product.php', 'admin\ManageProductController@showProductList')->name('products.productlist');
    //商品検索
	Route::get('php/admin/product.php/search', 'admin\ManageProductController@search')->name('products.search');
	//商品詳細
	Route::get('php/admin/product_detail.php/{id}', 'admin\ManageProductController@showProductDetail')->name('products.detail');
	//商品編集
	Route::get('php/admin/product_edit.php/{id}', 'admin\ManageProductController@edit')->name('products.edit');
	Route::post('php/admin/product_edit.php', 'admin\ManageProductController@product')->name('products.product');
	//商品編集確認
	Route::get('php/admin/product_edit.php/confirm', 'admin\ManageProductController@editconfirm')->name('products.editconfirm');
	//商品編集完了
	Route::put('php/admin/product_edit.php/{id}', 'admin\ManageProductController@update')->name('products.update');
    //商品登録
	Route::get('php/admin/product_regist.php', 'admin\ManageProductController@showRegistrationForm')->name('products.register_show');
	//商品登録完了
	Route::post('php/admin/product_regist.php', 'admin\ManageProductController@register')->name('products.register');
	//商品削除
    Route::delete('php/admin/product_delete.php/{id}', 'admin\ManageProductController@destroy')->name('products.destroy');





	//レビュー一覧
	Route::get('php/admin/review.php', 'admin\ManageReviewController@showReviewList')->name('reviews.reviewlist');
    //レビュー検索
	Route::get('php/admin/review.php/search', 'admin\ManageReviewController@search')->name('reviews.search');
	//レビュー詳細
	Route::get('php/admin/review_detail.php/{id}', 'admin\ManageReviewController@showReviewDetail')->name('reviews.detail');
	//レビュー編集
	Route::get('php/admin/review_edit.php/{id}', 'admin\ManageReviewController@edit')->name('reviews.edit');
	Route::post('php/admin/review_edit.php', 'admin\ManageReviewController@post')->name('reviews.post');
	//レビュー編集確認
	Route::get('php/admin/review_edit.php/confirm', 'admin\ManageReviewController@editconfirm')->name('reviews.editconfirm');
	//レビュー編集完了
	Route::put('php/admin/review_edit.php/{id}', 'admin\ManageReviewController@update')->name('reviews.update');
    //レビュー登録
	Route::get('php/admin/review_regist.php', 'admin\ManageReviewController@showRegistrationForm')->name('reviews.register_show');
	//レビュー登録完了
	Route::post('php/admin/review_regist.php', 'admin\ManageReviewController@register')->name('reviews.register');
	//レビュー削除
    Route::delete('php/admin/review_delete.php/{id}', 'admin\ManageReviewController@destroy')->name('reviews.destroy');
});

//管理側ログイン
Route::get('php/admin/login.php', 'admin\AdminLoginController@showLoginform')->name('admin.login');
Route::post('php/admin/login.php', 'admin\AdminLoginController@login')->name('admin.logout');
