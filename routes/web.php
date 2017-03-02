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
        return redirect()->guest('login');
});
	
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::group(['prefix' => '/user-type'], function(){
	Route::get('/', 'UsertypeController@index');
	Route::get('/add', 'UsertypeController@addUserType');
	Route::post('/saveRole', 'UsertypeController@saveRole');
	Route::get('/delete/{id}/{table}/{redirect_url}', 'UsertypeController@delete');
	Route::get('/edit/{id}', 'UsertypeController@edit');
	
	
});
Route::group(['prefix' => '/user'], function(){
	Route::get('/', 'UserController@index');
	Route::get('/add', 'UserController@addUser');
	Route::post('/save', 'UserController@save');
});
Route::group(['prefix' => '/customer'], function(){
	Route::get('/', 'ProjectController@customer_list');
	Route::get('/add', 'ProjectController@customer_add');
	Route::post('/save', 'ProjectController@customer_save');
	Route::get('/edit/{id}', 'ProjectController@customer_edit');
	
});
Route::group(['prefix' => '/project'], function(){
	Route::get('/', 'ProjectController@project_list');
	Route::get('/add', 'ProjectController@project_add');
	Route::post('/save', 'ProjectController@project_save');
	Route::get('/edit/{id}', 'ProjectController@project_edit');
	
});

