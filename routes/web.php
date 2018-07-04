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
	// Route::get('/', function () {
	//     return view('welcome');
	// });
	//Route::resource('mobile','PagesController');


Route::group(['middleware' => 'locale'], function() {

	// Login with Facebook
	Route::get('auth/facebook', 'Auth\AuthController@redirectToFacebook')->name('auth.facebook');
	Route::get('auth/facebook/callback', 'Auth\AuthController@handleFacebookCallback');

	// Multi Language 
    Route::get('change-language/{language}', 'User\HomeController@changeLanguage')
        ->name('user.change-language');

    
	Route::get('send','mailController@send');

	// Pages - Trang chủ
	Route::get('/', ['as'  => 'index', 'uses' =>'User\PagesController@index']);

	// Pages - sản phẩm mobile
	Route::get('/mobile', ['as'  => 'getmobile', 'uses' =>'User\PagesController@getcate']);

	// Route::get('/register', ['as'  => 'register', 'uses' =>'AuthController@create']);

	// Mobile detail
	Route::get('/mobile/{id}', ['as'  => 'getmobile', 'uses' =>'User\PagesController@mobiledetail']);
	
	// loại sản phẩm
	Route::get("/mobile/loai/{id}", ['as' => 'getmobileloai', 'uses' =>'User\PagesController@getLoaiSp']);

	// Pages - Intro
	Route::get('intro',['as'=>'getintro','uses'=>'User\PagesController@getintro']);

	// Pages - giỏ hàng
	Route::get('cart',['as'=>'getcart','uses'=>'User\CartController@getcart']);
	Route::get('cart/addcart/{id}', ['as'  => 'getcartadd', 'uses' =>'User\CartController@addcart']);
	Route::get('cart/update/{id}/{qty}-{dk}', ['as'  => 'getupdatecart', 'uses' =>'User\CartController@getupdatecart']);
	Route::get('cart/delete/{id}', ['as'  => 'getdeletecart', 'uses' =>'User\CartController@getdeletecart']);
	Route::get('cart/xoa', ['as'  => 'getempty', 'uses' =>'User\CartController@xoa']);

	// tien hanh dat hang
	Route::get('order', ['as'  => 'getoder', 'uses' =>'User\OrderController@getoder']);
	Route::post('order', ['as'  => 'postoder', 'uses' =>'User\OrderController@postoder']);
	
	// Email Order
	Route::get('verify/{verifyToken}','User\OrderController@sendEmailDoneOder')->name('sendEmailDoneOder');

	// User
	// Route::get('user', ['as'  => 'index', 'uses' =>'UserController@index']);
	// Route::get('user/{id}', ['as'  => 'getedit', 'uses' =>'UserController@edit']);

	// Route::post('user/edit/{id}', ['as'  => 'getupdate', 'uses' =>'UserController@capnhat']);
	Route::resource('user','User\UserController');
		// Route::get('user', ['as'  => 'user.index ', 'uses' =>'UserController@index']);
		// Route::get('user/create  ', ['as'  => 'user.create', 'uses' =>'UserController@create']);
		// Route::delete('/user/{user}  ', ['as'  => 'user.destroy', 'uses' =>'UserController@destroy']);
		// Route::get('/user/{user}/edit', ['as'  => 'user.edit', 'uses' =>'UserController@edit']);
		// Route::put('/user/{user}', ['as'  => 'user.update', 'uses' =>'UserController@update']);

	Auth::routes(); 


	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');


	Route::get('verifyEmailFirst','Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');
	Route::get('verify/{email}/{verifyToken}','Auth\RegisterController@sendEmailDone')->name('sendEmailDone');


	// Route::get('verifyEmailFirst','PagesController@verifyEmailFirst')->name('verifyEmailFirst');
	// Route::get('verify/{verifyToken}','PagesController@sendEmailDone')->name('sendEmailDone');

});







	
// Công việc Admin
Route::group(array('prefix'=>'admin','namespace'=>'Admin','mdidleware'=>'auth'),function (){
	Route::resource('home', 'IndexController');
	Route::resource('category', 'CategoryController');
	Route::resource('product','ProductController');
	Route::resource('customer', 'CustomerController');


	// Route::get('user', ['as'  => 'user.index ', 'uses' =>'UserController@index']);
	// Route::get('user/create  ', ['as'  => 'user.create', 'uses' =>'UserController@create']);
	// Route::delete('/user/{user}  ', ['as'  => 'user.destroy', 'uses' =>'UserController@destroy']);
	// Route::get('/user/{user}/edit', ['as'  => 'user.edit', 'uses' =>'UserController@edit']);
	// Route::put('/user/{user}', ['as'  => 'user.update', 'uses' =>'UserController@update']);


	Route::resource('order', 'OrderController');
	//Route::get('oder/detail/{id}', ['as'  => 'getdetail', 'uses' =>'OrderController@getdetail']);

});

Route::prefix('admin')->group(function() {
	Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
		// Password reset routes
  	Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  	Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  	Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
  	Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});

// Route::group(array('prefix'=>'admin','namespace'=>'Admin','mdidleware'=>'auth'),function (){
// 	//Route::resource('auth','AuthController');
	
// 	Route::resource('home', 'IndexController');
// 	Route::get('home',['as'=>'getcat','uses' => 'IndexController@index']);
	
	

// 	Route::resource('category', 'CategoryController');
// 	Route::get('/',['as'=>'getcat','uses' => 'CategoryController@index']);
	
// 	Route::resource('product','ProductController');
// 	Route::get('/',['as'=>'getpro','uses' => 'ProductController@index']);
	
// 	Route::resource('customer', 'customerController');
// 	Route::resource('order', 'orderController');
// });
