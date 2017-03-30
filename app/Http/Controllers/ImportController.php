<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use DB;
class ImportController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function expenses()
	{
		return view('import/expenses');
	}
	public function save(Request $request)
	{
		$input=$request->input();
		switch($input['module']){
			case 'Expenses':
				if($request->hasFile('import_file')) {
					$path = $request->import_file->path();
					$data = Excel::load($path, function($reader) {
					})->get();
					if(!empty($data) && $data->count()){
						foreach ($data as $data1)
						
						foreach ($data1 as $key => $value){
							if(isset($value->list_of_income_expneses) && $value->list_of_income_expneses!='')
							{
								$insert=array();
								$insert1=array();
								$insert2=array();
								$query=DB::table('allocation_head')->where('allocation_name','LIKE',"$value->allocation_purpose")->first();
								if(!isset($query->allocation_name) || $query->allocation_name==''){
									$insert[] = ['allocation_name' => $value->allocation_purpose, 'allocation_status' => 'Active'];
									DB::table('allocation_head')->insert($insert);
										
									$query=DB::table('allocation_head')->where('allocation_name','LIKE',"$value->allocation_purpose")->first();
										
								}
								 $allocation_head=$query->id;
								
								 $query=DB::table('allocation_subhead')
								 ->where('allocation_subhead_name','LIKE',"$value->sub_head")
								 ->where('allocation_head_id','=',$allocation_head)
								 ->first();
								 if(!isset($query->allocation_subhead_name) || $query->allocation_subhead_name==''){
								 	$insert1[] = ['allocation_subhead_name' => $value->sub_head,
									'allocation_head_id'=>$allocation_head,
								 	'allocation_subhead_status' => 'Active'];
								 	DB::table('allocation_subhead')->insert($insert1);
								 
								 	$query=DB::table('allocation_subhead')
								 	->where('allocation_subhead_name','LIKE',"$value->sub_head")
								 	->where('allocation_head_id','=',$allocation_head)
								 	
								 	->first();
								 
								 }
								 $allocation_subhead=$query->id;
								 
								 

								 $query=DB::table('allocation_pcrhead')
								 ->where('allocation_pcr_name','LIKE',"$value->pcr_head")
								 ->where('allocation_subhead_id','=',$allocation_subhead)
								 ->first();
								 if(!isset($query->allocation_pcr_name) || $query->allocation_pcr_name==''){
								 	$insert2[] = ['allocation_pcr_name' => $value->pcr_head,
								 	'allocation_subhead_id'=>$allocation_subhead,
								 	'allocation_pcr_status' => 'Active'];
								 	DB::table('allocation_pcrhead')->insert($insert2);
								 		
								 	$query=DB::table('allocation_pcrhead')
								 	->where('allocation_pcr_name','LIKE',"$value->pcr_head")
								 	->where('allocation_subhead_id','=',$allocation_subhead)
								 
								 	->first();
								 		
								 }
								 $allocation_pcrhead=$query->id;
								 
								 $query=DB::table('allocationlist')
								 ->where('name','LIKE',"$value->list_of_income_expneses")
								 ->where('allocation_pcrhead_id','=',$allocation_pcrhead)
								 ->where('allocation_subhead_id','=',$allocation_subhead)
								 ->where('allocation_head_id','=',$allocation_head)
								 ->first();
								 if(!isset($query->allocation_pcr_name) || $query->allocation_pcr_name==''){
								 	$insert4=array();
								 	$insert4[] = ['name' => $value->list_of_income_expneses,
								 	'allocation_pcrhead_id'=>$allocation_pcrhead,
								 	'allocation_subhead_id'=>$allocation_subhead,
								 	'allocation_head_id'=>$allocation_head,
								 	];
								 	DB::table('allocationlist')->insert($insert4);
								 		
								 	 $query=DB::table('allocationlist')
								 ->where('name','LIKE',"$value->list_of_income_expneses")
								 ->where('allocation_pcrhead_id','=',$allocation_pcrhead)
								 ->where('allocation_subhead_id','=',$allocation_subhead)
								 ->where('allocation_head_id','=',$allocation_head)->first();
								 		
								 }
								 
							}
						}
							//$insert[] = ['title' => $value->title, 'description' => $value->description];
						
						if(!empty($insert)){
							DB::table('items')->insert($insert);
							dd('Insert Record successfully.');
						}
					}
				}
				return back();
				break;
			default:return back();	
		}
	}
}
