<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\allocation_head;
use App\monthlycost;
use Illuminate\Support\Facades\Auth;
use App\model\allocationlist;
use App\model\allocation_pcrhead;
use App\model\allocation_subhead;

class ExpensesController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function monthly_expenses(Request $request)
	{			$data=[];
                $lists_data=[];
                $allocation_head=[];
                $allocation_subhead=[];
                $allocation_pcrhead=[];
		$input=$request->input();
		$allo=allocation_head::all();
		$allo_arr[]='--Select Value --';
		foreach ($allo as $arr)
			$allo_arr[$arr->id]=$arr->allocation_name;
		if(isset($input['expense'])){
			$data=monthlycost::where([['month','=',$input['month']],['year','=',$input['year']]])->get();
			$result=array();
			foreach ($data as $arr){
				$result[$arr->allocation_head_id][$arr->allocation_subhead_id][$arr->allocation_pcrhead_id]['total_amt']=$arr->total_amt;
				$result[$arr->allocation_head_id][$arr->allocation_subhead_id][$arr->allocation_pcrhead_id]['adjustment']=$arr->adjustment;
				$result[$arr->allocation_head_id][$arr->allocation_subhead_id][$arr->allocation_pcrhead_id]['final_amt']=$arr->final_amt;
			}
			
			if(count($result)>0){
				$data_from_previous=false;
			}
			else{
				$data_from_previous=true;
				if($input['month']==1)
				{
					$input['month']=12;
					$input['year']=$input['year']-1;
				}
				$data=monthlycost::where([['month','=',$input['month']],['year','=',$input['year']]])->get();
				$result=array();
				foreach ($data as $arr){
					$result[$arr->allocation_head_id][$arr->allocation_subhead_id][$arr->allocation_pcrhead_id]['total_amt']=$arr->total_amt;
					$result[$arr->allocation_head_id][$arr->allocation_subhead_id][$arr->allocation_pcrhead_id]['adjustment']=$arr->adjustment;
					$result[$arr->allocation_head_id][$arr->allocation_subhead_id][$arr->allocation_pcrhead_id]['final_amt']=$arr->final_amt;
				}
			}
			$lists=allocationlist::all();
			$lists_data=array();
			  foreach ($lists as $arr){
			  		$lists_data[$arr->allocation_head_id][$arr->allocation_subhead_id][$arr->allocation_pcrhead_id][$arr->id]['id']=$arr->id;
			  		$lists_data[$arr->allocation_head_id][$arr->allocation_subhead_id][$arr->allocation_pcrhead_id][$arr->id]['name']=$arr->name;
			  		$lists_data[$arr->allocation_head_id][$arr->allocation_subhead_id][$arr->allocation_pcrhead_id][$arr->id]['total_amt']=((isset($result[$arr->allocation_head_id][$arr->allocation_subhead_id][$arr->allocation_pcrhead_id]['total_amt']))?$result[$arr->allocation_head_id][$arr->allocation_subhead_id][$arr->allocation_pcrhead_id]['total_amt']:0);
			  		$lists_data[$arr->allocation_head_id][$arr->allocation_subhead_id][$arr->allocation_pcrhead_id][$arr->id]['adjustment']=((isset($result[$arr->allocation_head_id][$arr->allocation_subhead_id][$arr->allocation_pcrhead_id]['adjustment']))?$result[$arr->allocation_head_id][$arr->allocation_subhead_id][$arr->allocation_pcrhead_id]['adjustment']:0);
			  		$lists_data[$arr->allocation_head_id][$arr->allocation_subhead_id][$arr->allocation_pcrhead_id][$arr->id]['final_amt']=((isset($result[$arr->allocation_head_id][$arr->allocation_subhead_id][$arr->allocation_pcrhead_id]['final_amt']))?$result[$arr->allocation_head_id][$arr->allocation_subhead_id][$arr->allocation_pcrhead_id]['final_amt']:0);
			  }
			  $allocation_pcrhead=array();
			$allocation_pcrhead_arr=allocation_pcrhead::orderby('allocation_pcr_name','ASC')->get();
			  foreach ($allocation_pcrhead_arr as $arr){
			  	$allocation_pcrhead[$arr->id]=$arr->allocation_pcr_name;
			  }
			  $allocation_subhead=array();
			$allocation_subheadarr=allocation_subhead::orderby('allocation_subhead_name','ASC')->get();
			foreach ($allocation_subheadarr as $arr){
				$allocation_subhead[$arr->id]=$arr->allocation_subhead_name;
			}
			$allocation_head=array();
			foreach ($allo as $arr){
				$allocation_head[$arr->id]=$arr->allocation_name;
			}
			
		}		
		return view('expenses/index',array('lists_data'=>$lists_data,'input'=>$input,'allo_arr'=>$allo_arr,'allocation_head'=>$allocation_head,'allocation_subhead'=>$allocation_subhead,'allocation_pcrhead'=>$allocation_pcrhead));
		
	}
	public function save(Request $request)
	{
		$input=$request->input();
		monthlycost::where('month','=',$input['month'])->where('year','=',$input['year'])->delete();
		foreach($input['item'] as $arr){
			$data_to_save = new monthlycost;
			$data_to_save->allocation_head_id=$input['allocation_head_ids'][$arr];
			$data_to_save->allocation_subhead_id=$input['allocation_subhead_ids'][$arr];
			$data_to_save->allocation_pcrhead_id=$input['allocation_pcrhead_ids'][$arr];
			$data_to_save->allocationlist_id=$input['allocationlist_ids'][$arr];
			$data_to_save->total_amt=$input['total_amt'][$arr];
			$data_to_save->adjustment=$input['adjustment'][$arr];
			$data_to_save->adjustment_type=' ';
			$data_to_save->final_amt=floatval($data_to_save->total_amt)+floatval($data_to_save->adjustment);
			$data_to_save->month=$input['month'];
			$data_to_save->year=$input['year'];
			$data_to_save->user_id=Auth::user()->id;
			$data_to_save->description=Auth::user()->name;
			$data_to_save->save();
				return redirect("expenses?expense=true&month=".$input['month']."&year=".$input['year']);
		}
	}
}
