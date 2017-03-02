<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usertype;
use DB;
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
		$data=DB::table('usertypes AS  u1')
            ->leftJoin('usertypes AS  u2', 'u1.parent_id', '=', 'u2.id')
            ->select('u1.*',DB::raw('IFNULL( u2.name ,\'Top Level\' ) as user_parent_name'))
			->get();
		
		
		Usertype::all();
		return view('usertype/list',array('data'=>$data));
	}
	public function addusertype()
	{
		$res = Usertype::all();
		$select_data[]='Top Level';
		foreach ($res as $arr)
			$select_data[$arr->id]=$arr->name;
		return view('usertype/add',array('select_data'=>$select_data));
	}
	public function edit($id)
	{
		$result = Usertype::find($id);
		$res = Usertype::all()->where('id', '<>',$id);
		$select_data[]='Top Level';
		foreach ($res as $arr)
			$select_data[$arr->id]=$arr->name;
		return view('usertype/add',array('select_data'=>$select_data,'result'=>$result));
	}
	public function saveRole(Request $request)
	{
		$post_array=$request->input();
	
		if ($request->input('record') != '') {
			$data_to_save = Usertype::find($request->input('record'));
		
				
		} else {
			$data_to_save = new Usertype;
			
		}
	
		$data_to_save->name = $request->input('name');
		$data_to_save->parent_id =$request->input('parent_id');
	
		$data_to_save->save();
		return redirect('user-type');
	
	}
	
	public function clone_usertype($id)
	{
		$usertype_type_array=usertype_array();
		$result = Userusertype::find($id);
		unset($result->id);
		$result->usertype_name='';
	
		return view('usertype/add',array('data'=>$usertype_type_array,'result'=>$result));
	}

	public function delete($id, $table, $redirect_url) {
		$className = 'App\\' . ucfirst($table);
		$gstrone = new $className;
		$del = $gstrone->find($id);
		$del->delete();
		return redirect($redirect_url);
	}
	
}
