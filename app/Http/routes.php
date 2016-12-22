<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as'=>'index','uses'=>'WelcomeController@index']);

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);



Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
		Route::group(['prefix'=>'cate'],function(){
			Route::get('add',['as'=>'admin.cate.getAdd','uses'=>'CateController@getAdd']);
			Route::post('add',['as'=>'admin.cate.postAdd','uses'=>'CateController@postAdd']);
			Route::get('list',['as'=>'admin.cate.list','uses'=>'CateController@getList']);
			Route::get('delete/{id}',['as'=>'admin.cate.getDelete','uses'=>'CateController@getDelete']);
			Route::get('edit/{id}',['as'=>'admin.cate.getEdit','uses'=>'CateController@getEdit']);
			Route::post('edit/{id}',['as'=>'admin.cate.postEdit','uses'=>'CateController@postEdit']);
		});

		Route::group(['prefix'=>'product'],function(){
			Route::post('add',['as'=>'admin.product.postAdd','uses'=>'ProductController@postAdd']);
			Route::get('add',['as'=>'admin.product.getAdd','uses'=>'ProductController@getAdd']);
			Route::get('list',['as'=>'admin.product.list','uses'=>'ProductController@getList']);
			Route::get('delete/{id}',['as'=>'admin.product.getDelete','uses'=>'ProductController@getDelete']);
			Route::get('edit/{id}',['as'=>'admin.product.getEdit','uses'=>'ProductController@getEdit']);
			Route::post('edit/{id}',['as'=>'admin.product.postEdit','uses'=>'ProductController@postEdit']);
				Route::get('delimg/{id}',['as'=>'admin.product.getDelImg','uses'=>'ProductController@getDelImg']);
		});
		Route::group(['prefix'=>'user'],function(){
			Route::post('add',['as'=>'admin.user.postAdd','uses'=>'UserController@postAdd']);
			Route::get('add',['as'=>'admin.user.getAdd','uses'=>'UserController@getAdd']);
			Route::get('list',['as'=>'admin.user.list','uses'=>'UserController@getList']);
			Route::get('delete/{id}',['as'=>'admin.user.getDelete','uses'=>'UserController@getDelete']);
			Route::get('edit/{id}',['as'=>'admin.user.getEdit','uses'=>'UserController@getEdit']);
			Route::post('edit/{id}',['as'=>'admin.user.postEdit','uses'=>'UserController@postEdit']);
		});
	});



Route::get('loai-san-pham/{id}/{tenloai}',['as'=>'loaisanpham','uses'=>'WelcomeController@loaisanpham']);
Route::get('chi-tiet-san-pham/{id}/{tenloai}',['as'=>'chitietsanpham','uses'=>'WelcomeController@chitietsanpham']);
Route::get('mua-hang/{id}/{tensanpham}',['as'=>'muahang','uses'=>'WelcomeController@muahang']);
Route::get('gio-hang',['as'=>'giohang','uses'=>'WelcomeController@giohang']);
Route::get('xoa-san-pham/{id}',['as'=>'xoasanpham','uses'=>'WelcomeController@xoasanpham']);
Route::get('cap-nhat/{id}/{qty}',['as'=>'capnhat','uses'=>'WelcomeController@capnhat']);
Route::get('check-out',['as'=>'checkout','uses'=>'WelcomeController@checkout','middleware' => 'auth']);
Route::get('dang-ki',['as'=>'dangky','uses'=>'WelcomeController@dangky']);
Route::post('dang-ki',['as'=>'dangky','uses'=>'WelcomeController@postAdd']);
Route::get('pro-file',['as'=>'profile','uses'=>'WelcomeController@profile']);
Route::get('dang-nhap',['as'=>'getdangnhap','uses'=>'WelcomeController@getdangnhap']);
Route::post('dang-nhap',['as'=>'postdangnhap','uses'=>'WelcomeController@postdangnhap']);
