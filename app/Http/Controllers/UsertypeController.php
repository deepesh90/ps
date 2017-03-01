<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usertype;

class UsertypeController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$data=Usertype::all()->toArray();
		return view('usertype/list',array('data'=>$data));
	}
	public function addusertype()
	{
		$usertype_type_array=usertype_array();
		$res = Usertype::all()->get();
		return view('usertype/add',array('res'=>$res));
	}
	public function edit($id)
	{
		$usertype_type_array=usertype_array();
			$result = Usertype::find($id);
		
		return view('usertype/add',array('data'=>$usertype_type_array,'result'=>$result));
	}
	public function saveusertype(Request $request)
	{
		$post_array=$request->input();
	
		if ($request->input('record') != '') {
			$data_to_save = Userusertype::find($request->input('record'));
			if(is_null($data_to_save) || ($data_to_save->is_admin==1 && !is_admin()) || ($data_to_save->user_id!=Auth::user()->id && !is_admin()) ){
				return redirect('access-is-denied');
			}
				
		} else {
			$data_to_save = new Userusertype;
			if((Auth::user()->is_admin) && Auth::user()->is_admin==1){
	
				$data_to_save->user_id = '';
				$data_to_save->is_admin = 1;
			}
			else{
				$data_to_save->user_id = Auth::user()->id;
				$data_to_save->is_admin = 0;
			}
		}
	
		$data_to_save->usertype_name = $request->input('usertype_name');
		$permission=array();
		$permission['permission']=[];
		unset($post_array['record']);
		unset($post_array['_token']);
		unset($post_array['usertype_name']);
		$permission['permission']=$post_array;
		$data_to_save->permission = Json::encode($permission);
	
		$data_to_save->save();
		return redirect('usertypes/detail/'.$data_to_save->id);
	
	}
	
	public function clone_usertype($id)
	{
		$usertype_type_array=usertype_array();
		$result = Userusertype::find($id);
		unset($result->id);
		$result->usertype_name='';
	
		return view('usertype/add',array('data'=>$usertype_type_array,'result'=>$result));
	}
}
