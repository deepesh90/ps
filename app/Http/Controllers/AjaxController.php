<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\model\employee;
use DB;
use App\model\report_date;
use App\Project;
use App\project_fte;
use App\model\allocation_pcrhead;
use App\model\allocation_subhead;
use App\model\allocationlist;
use App\ProjectInputForecast;
use App\ProjectInputActual;
class AjaxController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth');
	}
	
public function getprojectyear(Request $request)
	{
		$input=$request->input();
		$project_id=$input['project_id'];
		$query=Project::where('id','=',$project_id	)->select('start_date')->first();
		if(!isset($query->start_date))
		{echo '';exit;}
		else $year=date('Y',strtotime($query->start_date));

		$current_year=date('Y');
		if($current_year>=$year)
		for($i=$current_year;$i>$year;$i--){
			echo '<option value="'.$i.'">'.$i.'</option>';
		}
		exit;
	}
	

	public function saveprojectyear(Request $request)
	{
		$input=$request->input();
		$dom=dom_array();
 		ProjectInputForecast::where('project_id','=',$input['project_id'])->where('year','=',$input['year'])->delete();
		
		foreach ($input['cost_type'] as $arr){
			foreach($dom['month_dom'] as $key1=>$arr1){
				
				$data_to_save=new ProjectInputForecast();
				$data_to_save->name=$arr;
				$data_to_save->value=(($input[$arr][$key1]!='')?$input[$arr][$key1]:0);
				$data_to_save->month=$key1;
				$data_to_save->year=$input['year'];
				$data_to_save->project_id=$input['project_id'];
				$data_to_save->save(); 
			}
		}
		echo '1';
		exit;
	}

	public function getprojecttable(Request $request){
		$input=$request->input();
	
		$year=$input['year'];
	
		$project_id=$input['project_id'];
		$query=ProjectInputForecast::where('project_id','=',$project_id)->where('year','=',$year)->get();
		$data=array();
		foreach($query as $arr){
			$data[$arr->name][$arr->month]=$arr->value;
		}
		return view('ajax.project_table',['year'=>$year,'project_id'=>$project_id,'data'=>$data]);
	}
	public function getprojecttable_other(Request $request){
		$input=$request->input();
		
		$month=$input['month'];
		$rep_date=report_date::where('status','=','Active')->first();
		
		$project_id=$input['project_id'];
		$query=ProjectInputActual::where('project_id','=',$project_id)->where([['year','=',$rep_date->from_date->format('Y')],['month','=',$month]])->get();
		$data=array();
		$year=$rep_date->from_date->format('Y');
		foreach($query as $arr){
			if($arr->type=='Cost')
			$data[$arr->name]=$arr->value;
			else
				$data[$arr->name]=$arr->descripton;
				
		}
		return view('ajax.project_table_other',['year'=>$year,'month'=>$month,'project_id'=>$project_id,'data'=>$data]);
	}

	public function getprojecttable_other_save(Request $request){
		$input=$request->input();
		$dom=dom_array();
 		ProjectInputActual::where('project_id','=',$input['project_id'])->where('year','=',$input['year'])->delete();

 		foreach ($input['cost_type'] as $arr){
 		
 			$data_to_save=new ProjectInputActual();
 			$data_to_save->name=$arr;
 			$data_to_save->value=(($input[$arr]!='')?$input[$arr]:0);
 			$data_to_save->month=$input['month'];
 			$data_to_save->year=$input['year'];
 			$data_to_save->project_id=$input['project_id'];
 			$data_to_save->type='Cost';
 			$data_to_save->descripton='';
 			$data_to_save->save();
 		}
		foreach ($input['description'] as $arr){
				
				$data_to_save=new ProjectInputActual();
				$data_to_save->name=$arr;
				$data_to_save->value=0;
				$data_to_save->month=$input['month'];
				$data_to_save->year=$input['year'];
				$data_to_save->project_id=$input['project_id'];
				$data_to_save->type='Description';
				$data_to_save->descripton=(($input[$arr]!='')?$input[$arr]:'');
				$data_to_save->save(); 
		}
		echo '1';
		exit;
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
			$result[$i]['label']=$arr->name.' ('.$arr->emp_id.')';
			$result[$i]['value']=$arr->name.'  ('.$arr->emp_id.')';
			$result[$i]['id']=$arr->id;
			$i++;
		}
		
		echo json_encode($result);exit;
	}
	public function list_module(Request $request)
	{
		$input=$request->input();
		
		$test=DB::table($input['module_name']);
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
	public function getSelectData(Request $request){
		$input=$request->input();
		switch($input['module']){
			case 'allocation_subhead':
				$data_arr=allocation_subhead::where('allocation_head_id','=',$input['allocation_head_id'])->where('allocation_subhead_status','=','Active')->orderby('allocation_subhead_name','ASC')->get();
				$data[]='--Select--';
				foreach ($data_arr as $arr)
					$data[$arr->id]=$arr->allocation_subhead_name;
						
				break;


			case 'allocation_pcrhead':
				$data_arr=allocation_pcrhead::where('allocation_subhead_id','=',$input['allocation_subhead_id'])->where('allocation_pcr_status','=','Active')->orderby('allocation_pcr_name','ASC')->get();
				$data[]='--Select--';
				foreach ($data_arr as $arr)
					$data[$arr->id]=$arr->allocation_pcr_name;
					
				break;
				
			case 'allocationlist':
				$data_arr=allocationlist::where('allocation_pcrhead_id','=',$input['allocation_pcrhead_id'])->orderby('name','ASC')->get();
				$data[]='--Select--';
				foreach ($data_arr as $arr)
					$data[$arr->id]=$arr->name;
			
				break;
			
		}
		foreach ($data as $key=>$arr)
			echo '<option value="'.$key.'">'.$arr.'</option>';
		
		exit;
	}
}
