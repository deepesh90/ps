<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\report_date;

class ReportdateController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function lists()
	{
	
		$data=report_date::orderby('from_date','desc')->paginate(20)->all();
	
	
		return view('reportdate/list',array('data'=>$data));
	}
	public function add()
	{
		return view('reportdate/add');
	}
	public function edit($id)
	{
		$data=report_date::find($id);
		return view('reportdate/add',array('data'=>$data));
	}
	public function save(Request $request)
	{
		$input=$request->input();
		if ($request->input('record') != '') {
			$data_to_save = report_date::find($request->input('record'));
		
		
		} else {
			$data_to_save = new report_date;
		
		}
		$data_to_save->from_date = $request->input('from_date');
		$data_to_save->to_date = $request->input('to_date');
		$data_to_save->customer_id = $request->input('customer_id');
		$data_to_save->customer_id = $request->input('customer_id');
		
		
	}
}
