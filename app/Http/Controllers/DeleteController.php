<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DeleteController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function delete(Request $request)
	{
		$input=$request->input();
		if($input['module']=='' || $input['record']=='' ||  $input['redir']==''){
			return redirect('access-is-denied');
		}
		DB::table($input['module'])->where('id', '=', $input['record'])->delete();
		return redirect($input['redir']);
	}
}
