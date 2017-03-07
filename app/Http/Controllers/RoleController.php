<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Userrole;
use Illuminate\Support\Facades\Auth;
use Psy\Util\Json;
use Hamcrest\Type\IsObject;

class RoleController extends Controller
{
    //

	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
	{ 
		$data=Userrole::paginate(20);
		
		return view('role/index',array('data'=>$data));
	}
	public function addRole($user_id='')
	{
		
		$role_type_array=role_array();	
		
		return view('role/add',array('data'=>$role_type_array,'user_id'=>$user_id));
	}
	public function detail($id)
	{
		$role_type_array=role_array();
		$result = Userrole::find($id);
		

		return view('role/detail',array('data'=>$role_type_array,'detail'=>$result));
	}
	public function edit($id)
	{
		$role_type_array=role_array();
		$result = Userrole::find($id);
			if(is_null($result)  ){
							return redirect('access-is-denied');
			}

		return view('role/add',array('data'=>$role_type_array,'result'=>$result));
	}
	public function saveRole(Request $request)
	{
		$post_array=$request->input();
		
		if ($request->input('record') != '') {
			$data_to_save = Userrole::find($request->input('record'));
			
		} else {
			$data_to_save = new Userrole;
				$data_to_save->user_id = Auth::user()->id;
				if($request->input('user_id')=='')
				$data_to_save->is_admin = 1;
				else
				$data_to_save->is_admin = 0;
						
		}
		
		$data_to_save->role_name = $request->input('role_name');
		$permission=array();
		$permission['permission']=[];
		unset($post_array['record']);
		unset($post_array['_token']);
		unset($post_array['role_name']);
		$permission['permission']=$post_array;
		$data_to_save->permission = Json::encode($permission);
		
		$data_to_save->save();
		
		return redirect('roles/detail/'.$data_to_save->id);
		
	}

	public function clone_role($id,$user_id='')
	{
		
		$role_type_array=role_array();
		$result = Userrole::find($id);
		unset($result->id);
		$result->role_name='';
	
		return view('role/add',array('data'=>$role_type_array,'result'=>$result,'user_id'=>$user_id));
	}
}
