<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Designation;

class DesignationController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
	{
		$data=Designation::paginate(20);
	
		return view('designation/index',array('data'=>$data));
	}
	public function add()
	{
		return view('designation/add');
	}
	
	
	public function edit($id)
	{
		$result=Designation::find($id);
		return view('designation/add',['result'=>$result]);
	}
	public function save(Request $request)
	{
		$post_array=$request->input();
	
		
		if ($request->input('record') != '') {
			$data_to_save = Designation::find($request->input('record'));
	
		} else {
			$data_to_save = new Designation;
		}
	
		$data_to_save->designation_name = $request->input('designation_name');
		$data_to_save->status = $request->input('status');
		$data_to_save->save();
		return redirect('designation');
	
	}
}
