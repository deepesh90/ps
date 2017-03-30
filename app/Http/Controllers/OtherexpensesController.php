<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Currency;
use App\model\report_date;

class OtherexpensesController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
	{
		$data=[];
		return view('otherexpenses/index',array('data'=>$data));
	}
	public function fixed_cost_other()
	{
		$data=[];
		$rep_date=report_date::where('status','=','Active')->first();
		if(is_null($rep_date)){
			echo 'No Report Date Set as Active';exit;
		}
		return view('otherexpenses/fixed_cost_other',array('data'=>$data,'rep_date'=>$rep_date));
	}
	
}

