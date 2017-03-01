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
	Route::get('/detail/{id}', 'UsertypeController@detail');
	Route::get('/edit/{id}', 'UsertypeController@edit');
	Route::get('/clone/{id}', 'UsertypeController@clone_role');
	
	
});
