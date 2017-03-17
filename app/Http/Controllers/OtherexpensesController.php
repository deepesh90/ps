<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Currency;

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
		$currencys=Currency::all();
		return view('otherexpenses/index',array('data'=>$data,'currencys'=>$currencys));
	}
}
