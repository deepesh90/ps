@extends('layouts.app')
<?php 
$start_date=$rep_date->from_date->format('n');
$end_date=$rep_date->to_date->format('n');

$start_date_year=$rep_date->from_date->format('Y');
$end_date_year=$rep_date->to_date->format('Y');
$dom=dom_array();

?>
@section('content')
<div class="row wrapper border-bottom white-bg page-heading ng-scope">
  <div class="col-lg-10">
    <h2>Monthly Expenses</h2>
  </div>
</div>

<div class="wrapper wrapper-content animated fadeIn ng-scope" >
  <div class="row">
   @if(isset($input['msg']))
  <div class="alert alert-success">
  <strong>Success!</strong> {{$input['msg']}}
</div>
@endif
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Monthly Employee Expenses</h5>
        </div>
        <div class="ibox-content">
          <div class="row flex-element center-both mb-20">
            <div class="top-table">
            {{ Form::open(array('url' => 'fte_cost_other','method'=>'get')) }}
              <table class="table table-bordered ">
                <tbody>

                  <tr>
                    <td>
               				 
               				  <div id="" class="form-group">
								 <label for="">Expense Month</label>
							 		<select class="form-control" id="month" name="month">
			                      		<option value="">	--Select Month--	</option>
			                      		@if($start_date!=$end_date)
			                      				@if($start_date<$end_date)
				                      				@for($i=$start_date;$i<=$end_date;$i++)
				                  		        		<option value="{{$i}}-{{$start_date_year}}">{{$dom['month_dom'][$i]}}-{{$start_date_year}}</option>
				                      				@endfor
				                      			@else
				                      				@for($i=$start_date;$i<=12;$i++)
				                  		        		<option value="{{$i}}-{{$start_date_year}}">{{$dom['month_dom'][$i]}}-{{$start_date_year}}</option>
				                      				@endfor
				                      				@for($i=1;$i<=$end_date;$i++)
				                  		        		<option value="{{$i}}-{{$end_date_year}}">{{$dom['month_dom'][$i]}}-{{$end_date_year}}</option>
				                      				@endfor
			                      				@endif
			                      		
			                      		@else
			                      		<option value="{{$start_date}}-{{$start_date_year}}">{{$dom['month_dom'][$start_date]}}-{{$start_date_year}}</option>
			                      		@endif
			                      	</select>
			                  
							 	
							</div>
                    
        			</td>
                   
                     <td>
                     <button class="btn btn-info" id="submit" type="submit">Submit</button>
                     <button class="btn btn-danger" id="clear" type="button" onclick="window.location.href='expenses'">Clear</button>
                     </td>
                    
                  </tr>
                </tbody>
              </table>
      {{ Form::close() }}
      
            </div>
            </div>
		@if(isset($show_expense))
			<div class="row">
				<div class="col-sm-12">
				
				      {{ Form::open(array('url' => 'expenses_emp/save','method'=>'post')) }}
		             {{ Form::inputHidden('month','Month',((isset($input['month']))?$input['month']:date('m'))) }}
		             {{ Form::inputHidden('year','Year',((isset($input['year']))?$input['year']:date('Y'))) }}
		             <div class="row" id="row_select">
		             	<div class="col-sm-3">
		             			 {{ Form::inputSelect('designation','Designation',$designation_arr,'','',['id'=>'designation']) }}
		             	</div>
		             	<div class="col-sm-3" id="">
		             			 {{ Form::inputSelect('department','Department',$departments_arr,'','',['id'=>'department']) }}
		             	</div>
		             	
		             	<div class="col-sm-3">
		             			   {{ Form::inputText('employee_name','Emp name','','',['class'=>'form-control emp_name clear','data-type'=>'employee']) }}
		             			   {{ Form::inputHidden('employee_id','Project Name','','',['required'=>true]) }}
		             	
		             	</div>
		             	
		             	<div class="col-sm-3">
		             			 	 {{ Form::inputText('project_name','Project Name','','',['class'=>'form-control project_name clear','data-type'=>'project']) }}
		             			      {{ Form::inputHidden('project_id','Project Name','','',['required'=>true]) }}
		             			             	
		             	</div>
		             	<div class="col-sm-3">
		             			 {{ Form::inputSelect('other_cost_check','Whether other cost',[''=>'--Select--','1'=>'Greater than Zero','0'=>'Equal to Zero'],'','',['id'=>'other_cost_check']) }}
		             			             	</div>
		             	<div class="col-sm-3">
		             			 {{ Form::inputSelect('travel_cost_check','Whether travel cost',[''=>'--Select--','1'=>'Greater than Zero','0'=>'Equal to Zero'],'','',['id'=>'travel_cost_check']) }}
		             			             			             	</div>
		             	
		             	
		             	<div class="col-sm-2">
		             			 <button type="button" onclick="filter()" class="btn btn-info btn-md">Filter</button>
		             			 <div class="error" id="more_error" style="color: red"></div>
		             	</div>
		             </div>
						<div class="table-responsive">
							<table class="table table-bordered" id="item_table">
								<thead>
									<tr>
										<th>Emp ID</th>
										<th>Name</th>
										<th>Department Name</th>
										<th>Designation</th>
										<th>Salary Cost</th>
										<th>Project</th>
										
										<th>Other Payout</th>
										<th>Travel</th>
										<th>Total</th>
									
									</tr>
									
								</thead>
								<tbody>
								
								@foreach($employees_arr as $emp_id=> $arr)
									@php(($i=0))
									
									@foreach($arr as  $arr1)
								
									<tr> 
										@if($i==0)
										<th rowspan="{{count($arr)}}" class="department_{{$arr1->department_id}}">{{$arr1->emp_id}}</th>
										<th rowspan="{{count($arr)}}" class="employee_{{$arr1->id}}">{{$arr1->name}}</th>
										<th rowspan="{{count($arr)}}"  class="department_{{$arr1->department_id}}">{{$arr1->department_name}}</th>
										<th rowspan="{{count($arr)}}" class="designation_{{$arr1->designation}}">{{$arr1->designation_name}}</th>
										<th rowspan="{{count($arr)}}">{{$arr1->salary}}</th>
										
										@endif
										
										<th class="project_id_{{$arr1->project_id}}">
										@if($arr1->project_id!=0 && $arr1->project_id!='')
										<input type="hidden" name="emp_ids[]" value="{{$arr1->id}}">
										<input type="hidden" name="project_ids[{{$arr1->id}}][]" value="{{$arr1->project_id}}">
										@endif
										{{$arr1->project_name}}
										
										</th>
										<th><input type="text" value="{{$result[$arr1->id][$arr1->project_id]['other_payout'] or '0'}}" onkeydown="isNumberFloatOnly(event)" class="form-control other_payout" size="5" {{(($arr1->project_id=='')?'disabled="disabled"':'')}} name="other_payout[{{$emp_id}}][{{$arr1->project_id}}]" onblur="calculate_total({{$arr1->id}},{{$arr1->project_id}})"></th>
										<th><input type="text"  value="{{$result[$arr1->id][$arr1->project_id]['travel'] or '0'}}" onkeydown="isNumberFloatOnly(event)" class="form-control travel" size="5" {{(($arr1->project_id=='')?'disabled="disabled"':'')}}  name="travel[{{$emp_id}}][{{$arr1->project_id}}]" onblur="calculate_total({{$arr1->id}},{{$arr1->project_id}})"></th>
										<th class="total_{{$arr1->id}}_{{$arr1->project_id}}">{{$result[$arr1->id][$arr1->project_id]['total'] or '0'}}</th>
									
									</tr>
										@php(($i++))				
										@endforeach
									
												
																			
								@endforeach
								
								</tbody>
							</table>
						
						</div>
						<button type="submit" class="btn btn-danger">Save</button>
				      {{ Form::close() }}
				
				</div>
			
			</div>
		
		@endif
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('boot_css')
  <link rel="stylesheet" href="{{url('js/easy/easy-autocomplete.min.css')}}"> 
  
@endsection
@section('boot_js')
<script src="{{url('js/easy/jquery.easy-autocomplete.min.js')}}"></script> 

@endsection

@section('js')
 <script>
@if(isset($show_expense))


	var options = {
			url: function(phrase) {
				return "{{url('ajax/search_project')}}?term=" + phrase + "&format=json";
			},
			list: {

				onSelectItemEvent: function() {
					var value = $("#project_name").getSelectedItemData().id;
					$("#project_id").val(value).trigger("change");
				}
			},
			getValue: "label"
		};
			 
	$("#project_name").easyAutocomplete(options);

	var options1 = {
			url: function(phrase) {
				return "{{url('ajax/employee')}}?term=" + phrase + "&format=json";
			},
			list: {
				onSelectItemEvent: function() {
					var value = $("#employee_name").getSelectedItemData().id;
					$("#employee_id").val(value).trigger("change");
				}
			},
			getValue: "label"
		};
			 
	$("#employee_name").easyAutocomplete(options1);
function filter(){
	$("#item_table tbody tr").css('display','');
		if($("#designation").val()!='' && $("#designation").val()!='0' && $("#designation").val()!=null){
			
		$("#item_table tbody tr").not($(".designation_"+$("#designation").val()).closest('tr')).css('display','none');
		return false;
	}
	else if($("#department").val()!='' && $("#department").val()!='0' && $("#department").val()!=null){
		
		$("#item_table tbody tr").not($(".department_"+$("#department").val()).closest('tr')).css('display','none');
	
	}
	else if($("#employee_id").val()!='' && $("#employee_id").val()!='0' && $("#employee_id").val()!=null){
		
		$("#item_table tbody tr").not($(".employee_"+$("#employee_id").val()).closest('tr')).css('display','none');
	
	}
	else if($("#project_id").val()!='' && $("#project_id").val()!='0' && $("#project_id").val()!=null){
		
		$("#item_table tbody tr").not($(".project_id_"+$("#project_id").val()).closest('tr')).css('display','none');
	
	}
	else if($("#other_cost_check").val()!='' && $("#other_cost_check").val()!=null){
		if($("#other_cost_check").val()>0)
		$("#item_table tbody tr").not($('#item_table :input.other_payout').filter(function(){if(this.value>0)return true}).closest('tr')).css('display','none');
		else
			$("#item_table tbody tr").not($('#item_table :input.other_payout').filter(function(){if(this.value==0)return true}).closest('tr')).css('display','none');
			
	}
	else if($("#travel_cost_check").val()!='' && $("#travel_cost_check").val()!=null){
		if($("#travel_cost_check").val()>0)
		$("#item_table tbody tr").not($('#item_table :input.travel').filter(function(){if(this.value>0)return true}).closest('tr')).css('display','none');
		else
			$("#item_table tbody tr").not($('#item_table :input.travel').filter(function(){if(this.value==0)return true}).closest('tr')).css('display','none');
			
	}
}
@endif
function isNumberFloatOnly(e){

    if (e.ctrlKey || e.altKey) { // if shift, ctrl or alt keys held down

        e.preventDefault();         // Prevent character input

    } else {

        var n = e.keyCode;

        if (!((n == 8)              // backspace

        || (n == 9)					// tab

        || (n == 46)				// delete

        || (n == 110) 

        || (n == 190) 

        || (n >= 35 && n <= 40)     // arrow keys/home/end

        || (n >= 48 && n <= 57)     // numbers on keyboard

        || (n >= 96 && n <= 105)

        || (e.shiftKey))   // number on keypad

        ) {

            e.preventDefault();     // Prevent character input

        }

    }

}

$(".clear").blur(function(){
	var data_type=$(this).attr('data-type');
	$("#"+data_type+'_id').val('');
})
function calculate_total(k,l){
	var value1=parseFloat($("input[name='other_payout["+k+"]["+l+"]']").val());
	var value2=parseFloat($("input[name='travel["+k+"]["+l+"]']").val());
	$('.total_'+k+'_'+l).html(value1+value2);
}
function checkform(){
	if($("#item_table :input")){
	alert('Please Add Atleast one row');return false;
	}
	return true;
}
 </script>
@endsection