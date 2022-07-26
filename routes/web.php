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

// 更新计数，自增或者清零
Route::post('/api/count', 'CounterController@updateCount');

Route::group(['prefix' => 'api'], function ($router) {
	// 获取当前计数
	Route::get('/count', 'CounterController@getCount');
	// 更新计数，自增或者清零
	Route::post('/count', 'CounterController@updateCount');

	Route::get('/user/info', 'UserController@getUserInfo');

	Route::get('/user/info2', 'UserController@getUserInfoByOpenid');

	Route::get('/user/add', 'UserController@addUserInfo');

	Route::get('/book/list', 'BookController@getBookList');

	Route::get('/book/info', 'BookController@getBookInfo');

	Route::get('/book/search/isbn', 'BookController@getBookInfoByIsbn');
});