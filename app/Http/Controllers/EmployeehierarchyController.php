<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\employee_heirarchy;
use App\model\employee_stucture;
use Carbon\Carbon;

class EmployeehierarchyController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
	{
		$data=employee_heirarchy::orderBy('effective_date', 'desc')->paginate(20);
		
		return view('Employeehierarcy/index',array('data'=>$data));
	}
	public function add()
	{

		return view('Employeehierarcy/add');
	}
	public function detail($id)
	{
		$data=employee_heirarchy::find($id);
		$data1=employee_stucture::leftJoin('employee', 'employee.id', '=', 'employee_stucture.employee_id')
		->leftJoin('departments', 'departments.id', '=', 'employee.department_id')
		->select("employee_stucture.*","employee.name as emp_name","departments.department_name as department_name")
		->where('employee_heirarchy_id','=',$id)->get();

		return view('Employeehierarcy/detail',['detail'=>$data,'data'=>$data1]	);
	}
	public function edit($id)
	{
		
		$data=employee_heirarchy::find($id);
		
		$data1=employee_stucture::leftJoin('employee', 'employee.id', '=', 'employee_stucture.employee_id')
		->leftJoin('departments', 'departments.id', '=', 'employee.department_id')
		->select("employee_stucture.*","employee.name as emp_name","departments.department_name as department_name")
		->where('employee_heirarchy_id','=',$id)->get();
		return view('Employeehierarcy/add',['result'=>$data,'data1'=>$data1]	);
		
	}
	
	
	public function save(Request $request)
	{
		
		$post_array=$request->input();
	
		if ($request->input('record') != '') {
			$data_to_save = employee_heirarchy::find($request->input('record'));
		} else {
			$data_to_save = new employee_heirarchy;
		}
	
		 $data_to_save->effective_date = date('Y-m-d H:i:s', strtotime($post_array['effective_date']));
		$data_to_save->save();
		employee_stucture::where('employee_heirarchy_id',$data_to_save->id)->delete();
		
		foreach ($post_array['employee'] as $k=>$v){
			if($k!=0){
			$data_to_save1 = new employee_stucture;
			$data_to_save1->employee_id = $k;
			$data_to_save1->parent_employee_id = $v['parent'];
			$data_to_save1->employee_heirarchy_id = $data_to_save->id;
		
			$data_to_save1->save();
			}
		}
		
		return redirect('employee-hierarchy');
	
	}
	
}
