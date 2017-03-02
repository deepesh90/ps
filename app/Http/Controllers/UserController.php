<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usertype;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\User;
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
            ->leftJoin('usertypes AS  u2', 'u1.usertype_id', '=', 'u2.id')
            ->select('u1.*','u2.name AS user_permission')
			->get();
		
		
		return view('user/list_user',array('data'=>$data));
	}
	public function addUser()
	{
		$res = Usertype::all();
		foreach ($res as $arr)
			$select_data[$arr->id]=$arr->name;
		return view('user/addUser',array('select_data'=>$select_data));
	}
	protected function save(Request $request)
	{
		$data=$request->input();
		 Validator::make($data, [
				'name' => 'required|max:255',
				'email' => 'required|email|max:255|unique:users',
				'password' => 'required|min:6|confirmed',
				]);
		 $data_to_save = new User;
		 $data_to_save->name=$data['name'];
		 $data_to_save->email=$data['email'];
		 $data_to_save->password=$data['password'];
		 $data_to_save->usertype_id=$data['usertype_id'];
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
