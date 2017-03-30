<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\employee;
use App\model\Department;
use App\model\Designation;
use App\model\report_date;
use App\model\allocation_head;
use App\monthlycost;
use App\model\allocationlist;
use App\model\allocation_subhead;
use App\model\allocation_pcrhead;
use App\model\Monthlycost_emp;
use Illuminate\Support\Facades\Auth;
use App\model\EmployeeSalary;
use DateTime;
use DB;
class EmployeeController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
	{ 
		$data=employee::
		leftJoin('departments', 'departments.id', '=', 'employee.department_id')
		->leftJoin('designation', 'designation.id', '=', 'employee.designation')
		->select('employee.*','department_name','designation_name')->paginate(20);
		
		return view('employee/index',array('data'=>$data));
	}
	public function add()
	{
		$department_arr['']='--select department--';
		$department=Department::all();
		foreach ($department as $dep)
			$department_arr[$dep->id]=$dep->department_name;
		$designation_arr['']='--select designation--';
		$designation=Designation::all();
		foreach ($designation as $dep)
			$designation_arr[$dep->id]=$dep->designation_name;
		
		return view('employee/add',['department_arr'=>$department_arr,'designation_arr'=>$designation_arr]);
	}
	public function edit($id)
	{
		$role_type_array=role_array();
		$result = employee::find($id);
		$department_arr['']='--select department--';
		$department=Department::all();
		foreach ($department as $dep)
			$department_arr[$dep->id]=$dep->department_name;
		$designation_arr['']='--select designation--';
		$designation=Designation::all();
		foreach ($designation as $dep)
			$designation_arr[$dep->id]=$dep->designation_name;
		
		return view('employee/add',array('department_arr'=>$department_arr,'result'=>$result,'designation_arr'=>$designation_arr));
	}
	public function detail($id)
	{
		$data=employee::
		leftJoin('departments', 'departments.id', '=', 'employee.department_id')
		->leftJoin('designation', 'designation.id', '=', 'employee.designation')
		->select('employee.*','department_name','designation_name')->where('employee.id','=',$id)->first();
		return view('employee/detail',array('data'=>$data));
	}
	
	
	public function save(Request $request)
	{
		if ($request->input('record') != '') {
			$this->validate($request, [
							'name' => 'required|max:255',
							]);				
		} else {
				$this->validate($request, [
							'name' => 'required|max:255',
							'emp_id' => 'required|unique:employee|max:255',
							]);	
		}
		$post_array=$request->input();
		if ($request->input('record') != '') {
			$data_to_save = employee::find($request->input('record'));
		} else {
			$data_to_save = new employee;
		}
		
		$data_to_save->name = $request->input('name');
		$data_to_save->emp_id = $request->input('emp_id');
		$data_to_save->department_id = $request->input('department_id');
		$data_to_save->designation = $request->input('designation');
		$data_to_save->status = $request->input('status');
		
		$data_to_save->save();
		return redirect('employee');
		
	}


	public function add_salary(Request $request,$emp_id){
	
		$input=$request->input();
		if($emp_id=='' ){
			return redirect('access-is-denied');
		}
		$validate=false;
		$check_emp=employee:: where('id','=',$emp_id)->get()->toArray();
		if(!is_admin() && count($check_emp)==0){
			return redirect('access-is-denied');
		}
	
		return view('employee/add_salary',array('emp_id'=>$emp_id,'validate'=>$validate));
	}
	
	public function add_expense(Request $request,$emp_id){
	
		$input=$request->input();
		if($emp_id=='' ){
			return redirect('access-is-denied');
		}
		$validate=false;
		$check_emp=employee:: where('id','=',$emp_id)->get()->toArray();
		if(!is_admin() && count($check_emp)==0){
			return redirect('access-is-denied');
		}

		return view('employee/add_expense',array('emp_id'=>$emp_id,'validate'=>$validate));
	}


	public function fte_cost(Request $request){
	
		$input=$request->input();
		$rep_date=report_date::where('status','=','Active')->first();
		if(is_null($rep_date)){
			echo 'No Report Date Set as Active';exit;
		}
		if(isset($input['type']) && $input['type']=='Salary'){
			$emp_salary=EmployeeSalary::where('employee_id','=',$input['employee_id'])->orderby('created_at','DESC')                ->limit(5)
		->get();
		
			return view('employee/fte_cost',array('rep_date'=>$rep_date,'input'=>$input,'show_salary'=>true,'emp_salary'=>$emp_salary));
				
		}

		if(isset($input['type']) && $input['type']=='Expenses'){
			$lists_data=[];
			$departments=[];
			$designation=[];
			$employees=[];
			$input=$request->input();
			$departments_arr=Department::orderby('department_name','ASC')->get();
				foreach ($departments_arr as $arr){
					$departments[$arr->id]=$arr->department_name;
				}	
			$designation_arr=Designation::orderby('designation_name','ASC')->get();
				foreach ($departments_arr as $arr){
					$designation_arr[$arr->id]=$arr->designation_name;
				}	

			$employees_arr=employee::orderby('name','ASC')->get();
				foreach ($employees_arr as $arr){
					$employees[$arr->id]=$arr;
				}
			return view('employee/fte_cost',array('show_expense'=>true,'rep_date'=>$rep_date,
					'lists_data'=>$lists_data,'input'=>$input,
					'designation_arr'=>$designation_arr,'departments_arr'=>$departments_arr,'employees_arr'=>$employees_arr));
		
		}
		return view('employee/fte_cost',array('form'=>true,'rep_date'=>$rep_date,'input'=>$request->input()));
	}
	public function fte_cost_save(Request $request){
		
			$input=$request->input();
				
			Monthlycost_emp::where('month','=',$input['month'])->where('year','=',$input['year'])->where('employee_id','=',$input['employee_id'])->delete();
			foreach($input['item'] as $arr){
				$data_to_save = new Monthlycost_emp;
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
				$data_to_save->employee_id=$input['employee_id'];
				$data_to_save->save();
				return redirect("fte_cost?msg=saved successfully");
			}
	}
	public function fte_cost_salary_save(Request $request){
		
			$input=$request->input();
				
				$data_to_save = new EmployeeSalary();
				$data_to_save->salary_ctc=$input['salary'];
				$data_to_save->salary_monthly=round($input['salary']/12,2);
				$data_to_save->user_id=Auth::user()->id;
				$data_to_save->employee_id=$input['employee_id'];
				 $data_to_save->effective_date=DateTime::createFromFormat('m/d/Y', $input['effective_date'])->format('Y-m-d');
				$data_to_save->save();
 				return redirect("fte_cost?msg=saved successfully");
	}
	public function fte_cost_other(Request $request){
		$input=$request->input();
		
		$rep_date=report_date::where('status','=','Active')->first();
		if(is_null($rep_date)){
			echo 'No Report Date Set as Active';exit;
		}

		if(isset($input['month'])){
			$month_arr=explode('-', $input['month']);
			$month=$month_arr[0];
			$year=$month_arr[1];
			
			$lists_data=[];
			$departments['']='--Select--';
			$designation['']='--Select--';
			$employees=[];
			$departments_arr=Department::orderby('department_name','ASC')->get();
			foreach ($departments_arr as $arr){
				$departments[$arr->id]=$arr->department_name;
			}
			$designation_arr=Designation::orderby('designation_name','ASC')->get();
			foreach ($designation_arr as $arr){
				$designation[$arr->id]=$arr->designation_name;
			}
			$result=array();
			$result_query=Monthlycost_emp::where('month','=',$month)->where('year','=',$year)->where('rep_id','=',$rep_date->id)->get();
			foreach ($result_query as $arr){
				$result[$arr->employee_id][$arr->project_id]['other_payout']=$arr->other_payout;
				$result[$arr->employee_id][$arr->project_id]['travel']=$arr->travel;
				$result[$arr->employee_id][$arr->project_id]['total']=$arr->travel+$arr->other_payout;
			}
				
			$employees_arr=
			DB::select(DB::raw("SELECT employee.*,department_name,designation_name,projects.id as project_id,projects.project_name as project_name FROM employee 
LEFT JOIN departments ON departments.id=employee.department_id
LEFT JOIN designation ON designation.id=employee.designation
LEFT JOIN projectftes ON projectftes.employee_id=employee.id AND projectftes.rep_id=$rep_date->id
LEFT JOIN projects ON projects.id=projectftes.project_id"));
						
			foreach ($employees_arr as $arr){
				$salary=DB::select(DB::raw("SELECT IFNULL(salary_monthly,0) as salary from employee_salary WHERE employee_id='$arr->id' AND effective_date <'".$rep_date->to_date->format('Y-m-d')."' ORDER BY effective_date DESC LIMIT 1"));

				
				$arr->salary=((isset($salary[0]->salary))?$salary[0]->salary:0);
				
				$employees[$arr->id][]=$arr;
			}
			
			return view('employee/add_expense_other',array('show_expense'=>true,'rep_date'=>$rep_date,
					'result'=>$result,'input'=>$input,
					'designation_arr'=>$designation,
					'departments_arr'=>$departments,
					'employees_arr'=>$employees));
		
		}
		return view('employee/add_expense_other',array('rep_date'=>$rep_date));
		
	}

	public function expenses_emp_save(Request $request){
		$input=$request->input();
		$rep_date=report_date::where('status','=','Active')->first();
		if(is_null($rep_date)){
			echo 'No Report Date Set as Active';exit;
		}
		$month_arr=explode('-', $input['month']);
		$month=$month_arr[0];
		$year=$month_arr[1];

		foreach($input['emp_ids'] as $arr){
			
			if(isset($input['project_ids'][$arr])){
				foreach ($input['project_ids'][$arr] as $arr1){
					if($input['other_payout'][$arr][$arr1]>0 || $input['travel'][$arr][$arr1]>0){
						Monthlycost_emp::where('month','=',$month)->where('year','=',$year)->where('rep_id','=',$rep_date->id)->where('employee_id','=',$input['employee_id'])->delete();

						$data_to_save = new Monthlycost_emp;
						$data_to_save->other_payout=(($input['other_payout'][$arr][$arr1]!='')?$input['other_payout'][$arr][$arr1]:0);
						$data_to_save->travel=(($input['travel'][$arr][$arr1]!='')?$input['travel'][$arr][$arr1]:0);
						$data_to_save->month=$month;
						$data_to_save->year=$year;
						$data_to_save->rep_id=$rep_date->id;
						$data_to_save->user_id=Auth::user()->id;
						$data_to_save->employee_id=$arr;
						$data_to_save->project_id=$arr1;
						$data_to_save->save();
							
					}
				}
			}
		}
		return redirect("fte_cost_other?month=".$input['month']."&msg=Saved successfully");
		
	}
	
	
}
