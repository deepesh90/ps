<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\project_fte;

class Project_fteController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function lists()
	{
	
		$data=project_fte::
		leftJoin('employee', 'employee.id', '=', 'projectftes.employee_id')
		->leftJoin('projects', 'projects.id', '=', 'projectftes.project_id')
		->leftJoin('report_date', 'report_date.id', '=', 'projectftes.rep_id')
		->select('projectftes.*','project_name','employee.name as emp_name','report_date.from_date','report_date.to_date')->paginate(20);
		
	
		return view('projectfte/list',array('data'=>$data));
	}
	public function add()
	{
	
		$data=project_fte::paginate(20)->all();
	
	
		return view('projectfte/add',array('data'=>$data));
	}
	public function edit()
	{
	
		$data=project_fte::paginate(20)->all();
	
	
		return view('Project/customer_list',array('data'=>$data));
	}

	public function save()
	{
	
		$data=Customer::paginate(20)->all();
	
	
		return view('Project/customer_list',array('data'=>$data));
	}
}
