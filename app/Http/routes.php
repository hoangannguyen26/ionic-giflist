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
Route::auth();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/posts', 'PostController@index');
Route::get('/post/{post}', 'PostController@detail');
Route::get('/user/thong-bao-bhxh', 'ReportController@index');

Route::get('/jobs', 'JobController@index');

Route::group(['prefix' => '/'], function () {
	Route::get('reports', 'ReportController@api_get_all_index');
	Route::get('report/{report}', 'ReportController@api_get_by_id');
	Route::get('township/{township}', 'TownShipController@api_get_by_id');
	Route::get('townships', 'TownShipController@api_get_all');
});

Route::group(['prefix' => '/api/v1'], function () {
	Route::get('address_lists', 'HomeController@foo');
});

// For admin
Route::group(['prefix' => 'user/api'], function () {
	Route::get('reports', 'ReportController@api_get_all_index');
	Route::get('report/{report}', 'ReportController@api_get_by_id');
	Route::get('township/{township}', 'TownShipController@api_get_by_id');
	Route::get('townships', 'TownShipController@api_get_all');
});

// For normal user logged-in
Route::group(['middleware' => 'auth', 'prefix' => 'profile'], function () {
	Route::get('/', 'UserController@index');
	Route::post('/', 'UserController@update');
	Route::get('/password', 'UserController@showChangePassword');
	Route::post('/password', 'UserController@updatePassword');
});

// For admin
Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
	Route::get('/', 'HomeController@index');
	Route::get('/view', 'AdminController@index');
	Route::get('/posts', 'PostController@index_admin');
	Route::get('/post/edit/{post}', 'PostController@edit');
	Route::post('/post', 'PostController@store');
	Route::patch('/post/{post}', 'PostController@update');
	Route::delete('/post/{post}', 'PostController@destroy');

	Route::get('/upload', 'ExcelController@showUpload');
	Route::post('/upload', 'ExcelController@upload');

	Route::get('/homepage', 'HomeController@homepage');
	Route::post('/homepage', 'HomeController@store');
	Route::patch('/homepage/edit/{id}', 'HomeController@update');

	Route::get('/townships', 'TownShipController@index');
	Route::post('/township', 'TownShipController@store');
	Route::get('/township/edit/{id}', 'TownShipController@edit');
	Route::patch('/township/{id}', 'TownShipController@update');
	Route::delete('/township/{township}', 'TownShipController@destroy');

	Route::get('/phongbans', 'PhongbanController@index');
	Route::post('/phongban', 'PhongbanController@store');
	Route::get('/phongban/edit/{id}', 'PhongbanController@edit');
	Route::patch('/phongban/{id}', 'PhongbanController@update');
	Route::delete('/phongban/{phongban}', 'PhongbanController@destroy');

	Route::get('/jobs', 'JobController@index_admin');
	Route::post('/jobs', 'JobController@store');
	Route::patch('/jobs/edit/{id}', 'JobController@update');
});
