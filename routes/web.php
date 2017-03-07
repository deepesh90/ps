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
Route::delete('/delete', 'DeleteController@delete');
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
	Route::get('/edit/{id}', 'UserController@editUser');
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

Route::group(['prefix' => '/roles'], function(){
	Route::get('/', 'RoleController@index');
	Route::get('/add', 'RoleController@addRole');
	Route::get('/add/{user_id}', 'RoleController@addRole');
	Route::post('/saveRole', 'RoleController@saveRole');
	Route::get('/detail/{id}', 'RoleController@detail');
	Route::get('/edit/{id}', 'RoleController@edit');
	Route::get('/clone/{id}', 'RoleController@clone_role');
	Route::get('/clone/{id}/{user_id}', 'RoleController@clone_role');
});


Route::group(['prefix' => '/employee'], function(){
	Route::get('/', 'EmployeeController@index');
	Route::get('/add', 'EmployeeController@add');
	Route::get('/add/{user_id}', 'EmployeeController@add');
	Route::post('/save', 'EmployeeController@save');
	Route::get('/detail/{id}', 'EmployeeController@detail');
	Route::get('/edit/{id}', 'EmployeeController@edit');
	Route::get('/clone/{id}', 'EmployeeController@clone_role');
	Route::get('/clone/{id}/{user_id}', 'RoleController@clone_role');
});

	Route::group(['prefix' => '/currency'], function(){
		Route::get('/', 'CurrencyController@index');
		Route::get('/add', 'CurrencyController@add');
		Route::get('/add/{user_id}', 'CurrencyController@add');
		Route::post('/save', 'CurrencyController@save');
		Route::post('/save_rate', 'CurrencyController@save_rate');
		Route::get('/detail/{id}', 'CurrencyController@detail');
		Route::get('/edit/{id}', 'CurrencyController@edit');
		Route::get('/add-rate/{id}', 'CurrencyController@add_currencyrate');
	});

		Route::group(['prefix' => '/department'], function(){
			Route::get('/', 'DepartmentController@index');
			Route::get('/add', 'DepartmentController@add');
			Route::post('/save', 'DepartmentController@save');

			Route::get('/edit/{id}', 'DepartmentController@edit');
		});
		
