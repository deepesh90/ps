<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\employee;
use App\model\Department;

class EmployeeController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
	{ 
		$data=employee::leftJoin('departments', 'departments.id', '=', 'employee.department_id')->select('employee.*','department_name')->paginate(20);
		
		return view('employee/index',array('data'=>$data));
	}
	public function add()
	{
		$department_arr['']='--select department--';
		$department=Department::all();
		foreach ($department as $dep)
			$department_arr[$dep->id]=$dep->department_name;
		return view('employee/add',['department_arr'=>$department_arr]);
	}
	public function edit($id)
	{
		$role_type_array=role_array();
		$result = employee::find($id);
		$department_arr['']='--select department--';
		$department=Department::all();
		foreach ($department as $dep)
			$department_arr[$dep->id]=$dep->department_name;
			
		return view('employee/add',array('department_arr'=>$department_arr,'result'=>$result));
	}
	
	
	public function save(Request $request)
	{
		if ($request->input('record') != '') {
			$this->validate($request, [
							'name' => 'required|max:255',
							]);				
		} else {
				$this->validate($request, [
							'name' => 'required|max:255',
							'emp_id' => 'required|unique:employee|max:255',
							]);	
		}
		$post_array=$request->input();
		if ($request->input('record') != '') {
			$data_to_save = employee::find($request->input('record'));
		} else {
			$data_to_save = new employee;
		}
		
		$data_to_save->name = $request->input('name');
		$data_to_save->emp_id = $request->input('emp_id');
		$data_to_save->department_id = $request->input('department_id');
		$data_to_save->status = $request->input('status');
		
		$data_to_save->save();
		return redirect('employee');
		
	}

	
}
