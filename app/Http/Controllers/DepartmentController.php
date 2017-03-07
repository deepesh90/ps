<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Department;

class DepartmentController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
	{
		$data=Department::paginate(20);
	
		return view('department/index',array('data'=>$data));
	}
	public function add()
	{
		return view('department/add');
	}
	
	
	public function edit($id)
	{
		$result=Department::find($id);
		return view('department/add',['result'=>$result]);
	}
	public function save(Request $request)
	{
		$post_array=$request->input();
	
		
		if ($request->input('record') != '') {
			$data_to_save = Department::find($request->input('record'));
	
		} else {
			$data_to_save = new Department;
		}
	
		$data_to_save->department_name = $request->input('department_name');
		$data_to_save->status = $request->input('status');
		$data_to_save->save();
		return redirect('department');
	
	}
}
