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
Route::get('/fixed_cost', 'OtherexpensesController@index');
Route::get('/fixed_cost_other', 'OtherexpensesController@fixed_cost_other');

Route::get('/expenses', 'ExpensesController@monthly_expenses');
Route::post('/expenses/save', 'ExpensesController@save');




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
Route::group(['prefix' => '/project_fte'], function(){
	Route::get('/', 'Project_fteController@lists');
	Route::get('/add', 'Project_fteController@add');
	Route::post('/save', 'Project_fteController@save');
	Route::get('/edit/{id}', 'Project_fteController@edit');
	
});
Route::group(['prefix' => '/multi-project_fte'], function(){
	Route::get('/', 'Multiproject_fteController@index');
	Route::get('/add', 'Multiproject_fteController@add');
	Route::post('/save', 'Multiproject_fteController@save');
	Route::get('/edit/{id}', 'Multiproject_fteController@edit');
	
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
Route::group(['prefix' => '/ajax'], function(){
	Route::get('/search_customer', 'AjaxController@search_customer');
	Route::get('/search_manager', 'AjaxController@search_manager');
	Route::get('/employee', 'AjaxController@search_employee');
	Route::get('/list', 'AjaxController@list_module');
	Route::post('/emp_detail', 'AjaxController@emp_detail');
	Route::post('/load_assign_fte', 'AjaxController@load_assign_fte');
	Route::get('/search_project', 'AjaxController@search_project');
	Route::get('/getprojectyear', 'AjaxController@getprojectyear');
	Route::post('/saveprojectyear', 'AjaxController@saveprojectyear');
	Route::post('/save_fte', 'AjaxController@save_fte');
	Route::post('/getprojecttable', 'AjaxController@getprojecttable');
	Route::post('/getprojecttable_other', 'AjaxController@getprojecttable_other');
	Route::post('/getSelectData', 'AjaxController@getSelectData');
	Route::post('/getprojecttable_other_save', 'AjaxController@getprojecttable_other_save');
	
	
});
Route::group(['prefix' => '/department'], function(){
	Route::get('/', 'DepartmentController@index');
	Route::get('/add', 'DepartmentController@add');
	Route::post('/save', 'DepartmentController@save');
	Route::get('/edit/{id}', 'DepartmentController@edit');
});

	Route::group(['prefix' => '/designation'], function(){
		Route::get('/', 'DesignationController@index');
		Route::get('/add', 'DesignationController@add');
		Route::post('/save', 'DesignationController@save');
		Route::get('/edit/{id}', 'DesignationController@edit');
	});
	
Route::group(['prefix' => '/employee-hierarchy'], function(){
	Route::get('/', 'EmployeehierarchyController@index');
	Route::get('/add', 'EmployeehierarchyController@add');
	Route::post('/save', 'EmployeehierarchyController@save');
	Route::get('/edit/{id}', 'EmployeehierarchyController@edit');
	Route::get('/detail/{id}', 'EmployeehierarchyController@detail');
});
					

	Route::group(['prefix' => '/report_date'], function(){
		Route::get('/', 'ReportdateController@lists');
		Route::get('/add', 'ReportdateController@add');
		Route::post('/save', 'ReportdateController@save');
		Route::get('/edit/{id}', 'ReportdateController@edit');
		Route::get('/detail/{id}', 'ReportdateController@detail');
	});
Route::group(['prefix' => '/import'], function(){
	Route::get('/', 'ImportController@lists');
	Route::get('/Expenses', 'ImportController@expenses');
	Route::post('/save', 'ImportController@save');
	Route::get('/edit/{id}', 'ImportController@edit');
	Route::get('/detail/{id}', 'ImportController@detail');
});
Route::group(['prefix' => '/salary'], function(){
	Route::post	('/save', 		'UserController@save_user_to_company');
	Route::get('/add/{emp_id}', 'EmployeeController@add_salary');
	Route::post('/{company_id}', 'UserController@add_user_to_company');
});
Route::group(['prefix' => '/emp_expense'], function(){
	Route::post	('/save', 		'UserController@save_user_to_company');
	Route::get('/add/{emp_id}', 'EmployeeController@add_expense');
	Route::post('/{company_id}', 'UserController@add_user_to_company');
});

	Route::group(['prefix' => '/fte_cost'], function(){
		Route::get('/', 'EmployeeController@fte_cost');
		Route::post('/expense/save', 'EmployeeController@fte_cost_save');
		Route::post('/salary/save', 'EmployeeController@fte_cost_salary_save');
	});
		Route::group(['prefix' => '/fte_cost_other'], function(){
			Route::get('/', 'EmployeeController@fte_cost_other');
			Route::post('/fte_cost_other/save', 'EmployeeController@fte_cost_other_save');
		});
		
Route::post('/expenses_emp/save', 'EmployeeController@expenses_emp_save');
		
