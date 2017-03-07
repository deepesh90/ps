<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Currency;
use App\model\Currencyrate;
use DB;
class CurrencyController extends Controller
{
    //

	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
	{
		$data=Currency::paginate(20);
	
		return view('currency/index',array('data'=>$data));
	}
	public function add()
	{
		return view('currency/add');
	}

	public function add_currencyrate($id)
	{
		return view('currency/add_currencyrate',['currency_id'=>$id]);
	}
	public function edit($id)
	{
		$result=Currency::find($id);
		
		
		return view('currency/add',['result'=>$result]);
	}
	public function detail($id)
	{
		$currency_list=Currency::find($id);
		
		$currency_rate=Currencyrate::where('currency_id','=',$id)->orderBy('effective_date','desc')->get();
		
		return view('currency/detail',array('currency_list'=>$currency_list,'currency_rate'=>$currency_rate));
	}
	public function save(Request $request)
	{
		$post_array=$request->input();
		if ($request->input('record') != '') {
			$this->validate($request, [
					'currency_name' => 'required|max:255',
					'currency_symbol' => 'required|max:255',
					'is_default' => 'required',
					'status' => 'required',
					]);
		}
		else{
			$this->validate($request, [
					'currency_name' => 'required|max:255',
					'currency_code' => 'required|unique:currencys|max:255',
					'currency_symbol' => 'required|max:255',
					'is_default' => 'required',
					'status' => 'required',
					]);
		}
		
	
	
		if( $request->input('is_default')==1){
			$affected = DB::table('currencys')->update(array('is_default' => 0));
				
		}
		if ($request->input('record') != '') {
			$data_to_save = Currency::find($request->input('record'));
				
		} else {
			$data_to_save = new Currency;
		}
	
		$data_to_save->currency_name = $request->input('currency_name');
		$data_to_save->currency_symbol	 = $request->input('currency_symbol');
		$data_to_save->currency_code = $request->input('currency_code');
		$data_to_save->is_default = $request->input('is_default');
		$data_to_save->status = $request->input('status');
		
		$data_to_save->save();
		return redirect('currency');
	
	}
	public function save_rate(Request $request)
	{
		$post_array=$request->input();
			$data_to_save = new Currencyrate;
		$data_to_save->rate = $request->input('rate');
		$data_to_save->effective_date	 = date('Y-m-d',strtotime($request->input('effective_date')));
		$data_to_save->currency_id = $request->input('currency_id');
		
		$data_to_save->save();
		return redirect('currency/detail/'.$data_to_save->currency_id);
	
	}
	
	
	
}
