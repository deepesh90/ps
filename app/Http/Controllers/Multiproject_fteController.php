<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\employee;
use App\model\report_date;

class Multiproject_fteController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
	{
		$data=employee::all();
		$rep_date=report_date::where('status','=','Active')->first();
		
		return view('multiproject/index',array('data'=>$data,'rep_date'=>$rep_date));
	}
}
