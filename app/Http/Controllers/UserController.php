<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usertype;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\User;
use App\model\Userrole;
class UserController extends Controller
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
		
		$data=DB::table('users AS  u1')
            ->leftJoin('userrole AS  u2', 'u1.userrole_id', '=', 'u2.id')
            ->select('u1.*','u2.role_name')
			->get();
		
		
		return view('user/list_user',array('data'=>$data));
	}
	public function addUser()
	{
		$res = Userrole::all();
		foreach ($res as $arr)
			$select_data[$arr->id]=$arr->role_name;
		return view('user/addUser',array('select_data'=>$select_data));
	}
	public function editUser($id)
	{
		$res = Userrole::all();
		foreach ($res as $arr)
			$select_data[$arr->id]=$arr->role_name;
		$user=User::find($id);

		return view('user/addUser',['res'=>$user,'select_data'=>$select_data,'record'=>$id]);
	}
	protected function save(Request $request)
	{
		$data=$request->input();
		if ($request->input('record') != '') {
			$data_to_save = User::find($request->input('record'));
			if($data['password']!='')
				$data_to_save->password=bcrypt($data['password']);
		}
		else{
		 $data_to_save = new User;
		 $data_to_save->password=bcrypt($data['password']);
		}
		 $data_to_save->name=$data['name'];
		 $data_to_save->email=$data['email'];
		 $data_to_save->userrole_id=$data['userrole_id'];
		 $data_to_save->status=$data['status'];
		 $data_to_save->save();
		 	return redirect('user');
	}
	
	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	
	
}
