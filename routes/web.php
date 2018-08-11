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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('trang-chu')->group(function () {
	Route::get('/', [
		'as'=> 'article.index',
		'uses'=>'ActicleController@index'
	]);
	Route::get('/{name}/{id}', [
		'as'=>'article.category',
		'uses'=>'ActicleController@getByCategory'
	]);
});

Route::prefix('thi-thu')->group(function () {
	Route::get('/', [
		'as'=> 'license.type',
		'uses'=>'ExamController@showLicense'
	]);
	Route::get('/{license}/{id}', [
		'as'=>'license.rank',
		'uses'=>'ExamController@showRank'
	]);
});

Route::prefix('bo-de')->group(function () {
	Route::get('/', [
		'as'=> 'quizzes.type',
		'uses'=>'ExamController@showLicense'
	]);
	Route::get('/{name}/{id}', [
		'as'=>'article.category',
		'uses'=>'ActicleController@getByCategory'
	]);
});

Route::prefix('tin-tuc')->group(function () {
	Route::get('/', [
		'as'=> 'article.index',
		'uses'=>'ActicleController@index'
	]);
	Route::get('/{name}/{id}', [
		'as'=>'article.category',
		'uses'=>'ActicleController@getByCategory'
	]);
});

Route::prefix('ky-nang')->group(function () {
	Route::get('/', [
		'as'=> 'article.index',
		'uses'=>'ActicleController@index'
	]);
	Route::get('/{name}/{id}', [
		'as'=>'article.category',
		'uses'=>'ActicleController@getByCategory'
	]);
});

Route::prefix('tin-tuc')->group(function () {
	Route::get('/', [
		'as'=> 'article.index',
		'uses'=>'ActicleController@index'
	]);
	Route::get('/{name}/{id}', [
		'as'=>'article.category',
		'uses'=>'ActicleController@getByCategory'
	]);
});

Route::prefix('lien-he')->group(function () {
	Route::get('/', [
		'as'=> 'article.index',
		'uses'=>'ActicleController@index'
	]);
	Route::get('/{name}/{id}', [
		'as'=>'article.category',
		'uses'=>'ActicleController@getByCategory'
	]);
});

Route::group(['prefix' => 'private', 'as' => 'private.'], function () {
	
	Route::get('/login',[
			'as'=>'login',
			'uses'=>'AdminAuth\LoginController@showLoginForm'
	]);

	Route::post('/login',[
			'as'=>'auth',
			'uses'=>'AdminAuth\LoginController@login'
	]);

});


	



	
// });
// Route::group(['prefix' => 'admin'], function () {
  
//   Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

//   Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
//   Route::post('/register', 'AdminAuth\RegisterController@register');

//   Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
//   Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
//   Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
//   Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
// });

// Route::group(['prefix' => 'user'], function () {
//   Route::get('/login', 'UserAuth\LoginController@showLoginForm')->name('login');
//   Route::post('/login', 'UserAuth\LoginController@login');
//   Route::post('/logout', 'UserAuth\LoginController@logout')->name('logout');

//   Route::get('/register', 'UserAuth\RegisterController@showRegistrationForm')->name('register');
//   Route::post('/register', 'UserAuth\RegisterController@register');

//   Route::post('/password/email', 'UserAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
//   Route::post('/password/reset', 'UserAuth\ResetPasswordController@reset')->name('password.email');
//   Route::get('/password/reset', 'UserAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
//   Route::get('/password/reset/{token}', 'UserAuth\ResetPasswordController@showResetForm');
// });
