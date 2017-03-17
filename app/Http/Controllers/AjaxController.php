<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\model\employee;
use DB;
use App\model\report_date;
use App\Project;
use App\project_fte;
class AjaxController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function search_customer(Request $request)
	{
		$input=$request->input();
		 $data=Customer::where('customer_name','LIKE',"%$input[term]%")->limit(10)->get();
		 
		$result=[];
		$i=0;
		foreach ($data as $arr){
			$result[$i]['label']=$arr->customer_name;
			$result[$i]['value']=$arr->customer_name;
			$result[$i]['id']=$arr->id;
			$i++;
		}
		
		echo json_encode($result);exit;
	}
	public function search_project(Request $request)
	{
		$input=$request->input();
		 $data=Project::where('project_name','LIKE',"%$input[term]%")->limit(10)->get();
		 
		$result=[];
		$i=0;
		foreach ($data as $arr){
			$result[$i]['label']=$arr->project_name;
			$result[$i]['value']=$arr->project_name;
			$result[$i]['id']=$arr->id;
			$i++;
		}
		
		echo json_encode($result);exit;
	}
	
	public function search_manager(Request $request)
	{
		$input=$request->input();
		 $data=employee::leftJoin('departments', 'departments.id', '=', 'employee.department_id')->
		 where('name','LIKE',"%$input[term]%")-> where('department_name','LIKE',"Project Manager")->select('employee.*')->limit(10)->get();
		 
		$result=[];
		$i=0;
		foreach ($data as $arr){
			$result[$i]['label']=$arr->name;
			$result[$i]['value']=$arr->name;
			$result[$i]['id']=$arr->id;
			$i++;
		}
		
		echo json_encode($result);exit;
	}
	public function search_employee(Request $request)
	{
		$input=$request->input();
		 $data=employee::leftJoin('departments', 'departments.id', '=', 'employee.department_id')
		 ->orWhere('name','LIKE',"%$input[term]%")
		 ->orWhere('emp_id','LIKE',"%$input[term]%")
		 ->select('employee.*')->limit(10)->get();
		 
		$result=[];
		$i=0;
		foreach ($data as $arr){
			$result[$i]['label']=$arr->name;
			$result[$i]['value']=$arr->name;
			$result[$i]['id']=$arr->id;
			$i++;
		}
		
		echo json_encode($result);exit;
	}
	public function list_module(Request $request)
	{
		$input=$request->input();
		
		$test=		DB::table($input['module_name']);
		$filter=[];
		if(isset($input['filter']) && count($input['filter'])>0){
			foreach ($input['filter'] as $key=>$value)
			{
				if(isset($type[$key]))
					$test->where($key,$type[$key],$value);
				else	
					$test->where($key,'like',$value.'%');
				$filter[$key]=$value;
			}
		}
		$select=$input['select'];
		$map=$input['map'];
		$test->select('id',implode(',', $input['select']));
		$res=$test->paginate(20);
		return view('common/list',['result'=>$res,'visible_field'=>((isset($input['visible']))?$input['visible']:''),'filter'=>$filter,'select'=>$select,'map'=>$map]);		
	}
	public function emp_detail(Request $request)
	{
		$input=$request->input();
		 $data=employee::find($input['employee_id'])->toarray();
		 echo json_encode($data);exit;
		
	}

	public function load_assign_fte(Request $request){
		$input=$request->input();
		$data=employee::leftJoin('departments', 'departments.id', '=', 'employee.department_id')
		->where('employee.id','=',$input['employee_id'])
		->select('employee.*','departments.department_name')->first();
		$rep_date=report_date::where('status','=','Active')->first();
		if(is_null($rep_date)){
			echo 'No Report Date Set as Active';exit;
		}
		$data1=project_fte::leftJoin('projects', 'projects.id', '=', 'projectftes.project_id')
		->where('rep_id','=',$rep_date->id)
		->where('employee_id','=',$input['employee_id'])
		->select('projectftes.*','projects.project_name')
		->get();
		return view('ajax/assign_fte',['employee'=>$data,'rep_date'=>$rep_date,'data1'=>$data1]);
	
	}
	public function save_fte(Request $request){
		$input=$request->input();
	
		project_fte::where('employee_id','=',$input['employee_id'])->
		where('rep_id','=',$input['rep_id'])->delete();
		foreach($input['projects'] as $arr){
			$data_to_save1 = new project_fte;
			$data_to_save1->start_date = date('Y-m-d',strtotime($input['start_date'][$arr]));
			$data_to_save1->end_date = date('Y-m-d',strtotime($input['end_date'][$arr]));
			$data_to_save1->project_id = $input['project_id'][$arr];
			$data_to_save1->employee_id = $input['employee_id'];
			$data_to_save1->rep_id = $input['rep_id'];
			$data_to_save1->project_location = $input['project_location'][$arr];
			$data_to_save1->save();
			
		}
		echo 1;exit;
		
	}
}
