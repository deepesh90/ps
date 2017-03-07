<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

function is_admin(){
	$user = Auth::user();
	if(isset($user->is_admin) && $user->is_admin==1)
	{
		return true;
		
	}else{
		return false;
	}
	
	
}
function role_array(){
	$group_array['Project']='Project';
	$group_array['Reports']='Reports';
	$group_array['Finance']='Finance';
	$role_array['Project']['project']		='Project';
	$role_array['Project']['customer']		='Customer';
	$role_array['Project']['assign_project_fte']		='Assign project FTE';
	$role_array['Project']['fixed_cost_management']	='Fixed Cost management';
	
	
	$role_array['Reports']['monthly_pm_report']		='Monthly PM report';
	$role_array['Reports']['bench_employee']		='Bench Employee';
	$role_array['Reports']['department_plan_vs_forecast']		='Department: Plan vs Forecast';
	$role_array['Reports']['department_pfo_plan_vs_forecast']	='Department - PFO Plan vs forecast';
	$role_array['Reports']['project_plan_vs_forecast']		='Project- Plan vs forecast';
	$role_array['Reports']['project_pfo_vs_fore_cast']	='Project - PFO vs fore cast';
	
	$role_array['Finance']['conversion_rate']		='Conversion rate';
	$role_array['Finance']['department_setup']		='Department setup';
	$role_array['Finance']['set_report_date']		='Set report Date';
	$role_array['Finance']['employee_setup']		='Employee setup';

	
	
	return array('role_array'=>$role_array,'group_array'=>$group_array);
}
