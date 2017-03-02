<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Customer;
use App\Project;

class ProjectController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth');
	}
	//
	public function customer_list()
	{
	
		$data=Customer::paginate(20)->all();
	
	
		return view('Project/customer_list',array('data'=>$data));
	}
	public function customer_add()
	{
		return view('Project/customer_add');
	}
	public function customer_edit($id)
	{
		$result = Customer::find($id);
		
		return view('Project/customer_add',['result'=>$result]);
	}
	public function customer_save(Request $request)
	{
		$post_array=$request->input();
		
		if ($request->input('record') != '') {
			$data_to_save = Customer::find($request->input('record'));
		
		
		} else {
			$data_to_save = new Customer;
				
		}

		$data_to_save->customer_id = $request->input('customer_id');
		$data_to_save->customer_name = $request->input('customer_name');
		$data_to_save->website = $request->input('website');
		$data_to_save->phone_no = $request->input('phone_no');
		$data_to_save->address_line_1	 = $request->input('address_line_1');
		$data_to_save->address_line_2 = $request->input('address_line_2');
		$data_to_save->state_id = $request->input('state_id');
		$data_to_save->country =$request->input('country');
		$data_to_save->zip_code	 =$request->input('zip_code');
		$data_to_save->p3_contact_person =$request->input('p3_contact_person');
		$data_to_save->save();
		return redirect('customer');
		
	}
	// for project
	
	public function project_list()
	{
	
		$data=Project::paginate(20)->all();
			
		
		return view('Project/project_list',array('data'=>$data));
	}
	public function project_add()
	{
		$res = Customer::all();
		$select_data=[];
		foreach ($res as $arr)
			$select_data[$arr->id]=$arr->customer_name;
		return view('Project/project_add',['select_data'=>$select_data]);
	}
	public function project_edit($id)
	{
		$result = Project::find($id);
	
		return view('Project/project_add',['result'=>$result]);
	}
	public function project_save(Request $request)
	{
		$post_array=$request->input();
	
		if ($request->input('record') != '') {
			$data_to_save = Project::find($request->input('record'));
	
	
		} else {
			$data_to_save = new Project;
	
		}
	
		$data_to_save->project_name = $request->input('project_name');
		$data_to_save->customer_id = $request->input('customer_id');
		$data_to_save->start_date = $request->input('start_date');
		$data_to_save->end_date = $request->input('end_date');
		$data_to_save->project_manager_id	 = $request->input('pm');
		$data_to_save->save();
		return redirect('customer');
	
	}
}
