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
    <h2>FTE Cost</h2>
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
          <h5>FTE Cost</h5>
        </div>
        <div class="ibox-content">
        @if(isset($form) && $form==true)
        
          <div class="row flex-element center-both mb-20">
            <div class="top-table">
              {{ Form::open(array('url' => 'fte_cost','method'=>'get','id'=>'fte_cost','onsubmit'=>'return check_form()')) }}
             	{{ Form::inputHidden('salary','Salary','true') }}
                 {{ Form::inputRadio('type','Entry Type',['Salary'=>'Salary'],'Salary','',['onclick'=>'checkRadioValue()']) }}
                           	 <div id="" class="form-group">
								 <label for="">Employee Name</label>
							 	<input type="text" value="" name="employee_name"  id="employee_name" class="form-control">
								<input type="hidden" value="" name="employee_id"  id="employee_id" class="form-control">
							 	
							</div>
                           	 <div id="" class="form-group">
								 <label for="">Expense Month</label>
							 		<select class="form-control" id="month" name="month">
			                      		<option value="">	--Select Month--	</option>
			                      		@if($start_date!=$end_date)
			                      				@if($start_date<$end_date)
				                      				@for($i=$start_date;$i<=$end_date;$i++)
				                  		        		<option value="{{$i}}">{{$dom['month_dom'][$i]}}</option>
				                      				@endfor
				                      			@else
				                      				@for($i=$start_date;$i<=12;$i++)
				                  		        		<option value="{{$i}}">{{$dom['month_dom'][$i]}}</option>
				                      				@endfor
				                      				@for($i=1;$i<=$end_date;$i++)
				                  		        		<option value="{{$i}}">{{$dom['month_dom'][$i]}}</option>
				                      				@endfor
			                      				@endif
			                      		
			                      		@else
			                      		<option value="{{$start_date}}">{{$dom['month_dom'][$start_date]}}</option>
			                      		
			                      		@endif
			                      	</select>
			                  
							 	
							</div>
           <div id="" class="form-group">
								 <label for="">Expense Year</label>
							 		
			                      	<select class="form-control" id="year" name="year">
			                      		<option value="">	--Select Year--	</option>
			                      		@if($start_date_year!=$end_date_year)
			                      				@if($start_date_year<$end_date_year)
				                      				@for($i=$start_date_year;$i<=$end_date_year;$i++)
				                  		        		<option value="{{$i}}">{{$i}}</option>
				                      				@endfor
				                      			@else
				                  		        		<option value="{{$start_date_year}}">{{$start_date_year}}</option>
				                      			
			                      				@endif
			                      		
			                      		@else
			                      		<option value="{{$start_date_year}}">{{$start_date_year}}</option>
			                      		
			                      		@endif
			                      	</select>
							 	
							</div>
          
                     <button class="btn btn-info" id="submit" type="submit">Submit</button>
                     <button class="btn btn-danger" id="clear" type="button" onclick="window.location.href='fte_cost'">Clear</button>
                   
      {{ Form::close() }}
           
            </div>
            </div>
            @endif
        @if(isset($show_salary))
        <div class="row">
				<div class="col-sm-8">
          {{ Form::open(array('url' => 'fte_cost/salary/save','method'=>'post')) }}
		  {{ Form::inputHidden('employee_id','employee_id',((isset($input['employee_id']))?$input['employee_id']:'')) }}
		   <div id="" class="form-group">
								 <label for="">Salary (Annual CTC) </label>
							 	<input type="text" value="" name="salary"  id="salary" class="form-control" required>
			</div>
			{{ Form::inputText('effective_date','effective_date',((isset($input['effective_date']))?$input['effective_date']:''),'',['class'=>'form-control datepicker','required'=>'required']) }}
				<button type="submit" class="btn btn-danger">Save</button>
			
		   {{ Form::close() }}
		        
		        </div>
		        <div class="col-sm-4">
					<h4>Last 5 Salary Update</h4>
					<table class="table table-bordered">
						<thead>
								<tr>
										<th>Salary</th>
										<th>Effective Date</th>
										<th>Created Date</th>
								
								</tr>
								
						</thead>
						<tbody>
								@foreach($emp_salary as $arr)
								<tr>
										<th>{{$arr->salary_ctc}}</th>
										<th>{{$arr->effective_date->format('d/m/Y')}}</th>
										<th>{{$arr->created_at->format('d/m/Y')}}</th>
								
								</tr>
								@endforeach
						</tbody>
					</table>
				</div> 
			</div>	    
        @endif    
		@if(isset($show_expense))
			<div class="row">
				<div class="col-sm-12">
				
				      {{ Form::open(array('url' => 'fte_cost/expense/save','method'=>'post','onsubmit'=>'return checkform()')) }}
		             {{ Form::inputHidden('month','Month',((isset($input['month']))?$input['month']:date('m'))) }}
		             {{ Form::inputHidden('year','Year',((isset($input['year']))?$input['year']:date('Y'))) }}
		            {{ Form::inputHidden('employee_id','employee_id',((isset($input['employee_id']))?$input['employee_id']:'')) }}
		             <div class="row" id="row_select">
		             	<div class="col-sm-3">
		             			 {{ Form::inputSelect('allocation_head_id','Major Head for Allocation',$allo_arr,'','',['required'=>true,'id'=>'allocation_head_id','onchange'=>'get_allocation_subhead()']) }}
		             	</div>
		             	<div class="col-sm-3" id="">
		             			 {{ Form::inputSelect('allocation_subhead_id','Sub Head',[],'','',['required'=>true,'id'=>'allocation_subhead_id','onchange'=>'get_allocation_pcrhead()']) }}
		             	</div>
		             	<div class="col-sm-3">
		             			 {{ Form::inputSelect('allocation_pcrhead_id','PCR Head',[],'','',['required'=>true,'id'=>'allocation_pcrhead_id','onchange'=>'get_allocationlist()']) }}
		             	</div>
		             	<div class="col-sm-3">
		             			 {{ Form::inputSelect('allocationlist_id','List of Income & expneses',[],'','',['required'=>true,'id'=>'allocationlist_id']) }}
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
										<th rowspan="2">
												List of Income & Expenses
										</th>
										<th colspan="3">
												Allocation Purpose
										</th>
										
										<th rowspan="2">
												Amount
										</th>
										
										<th rowspan="2">
												Adjustments
										</th>
										
										<th rowspan="2">
												Total
										</th>
										<th rowspan="2">
										</th>
									
									</tr>
									<tr>
											<th>
												Major Head for Allocation 
											</th>
											<th>
												Sub Head
											</th>
											<th>
												PCR Head
											</th>
									
									</tr>
								</thead>
								<tbody>
								
								@php(($i=0))
								@foreach($lists_data as $allocation_head_id=> $arr)
									
									@foreach($arr as $allocation_subhead_id=>$arr1)
										
										@foreach($arr1 as $allocation_pcrhead_id=>$arr3)
											@foreach($arr3 as $arr2)
											
												<tr id="{{$i}}_row">
												<td class="list_{{$arr2['id']}}">
													<input type="hidden" value="{{$i}}" name="item[]">
													<input type="hidden" value="{{$arr2['id']}}" class="allocationlist_ids" name="allocationlist_ids[{{$i}}]">
													{{$arr2['name'] or ''}}
												</td>
													
												<td class="head_{{$allocation_head_id}}">
													<input type="hidden" value="{{$allocation_head_id}}" name="allocation_head_ids[{{$i}}]">
													{{$allocation_head[$allocation_head_id] or ''}}
												</td>
												<td class="subhead_{{$allocation_subhead_id}}">
													<input type="hidden" value="{{$allocation_subhead_id}}" name="allocation_subhead_ids[{{$i}}]">
													{{$allocation_subhead[$allocation_subhead_id] or ''}}
												</td>
												<td class="pcrhead_{{$allocation_pcrhead_id}}">
													<input type="hidden" value="{{$allocation_pcrhead_id}}" name="allocation_pcrhead_ids[{{$i}}]">
																	{{$allocation_pcrhead[$allocation_subhead_id] or ''}}
												</td>
												<td>
													<input type="text" onblur="calculate_total({{$i}})" value="{{$arr2['total_amt']}}" name="total_amt[{{$i}}]" onkeydown="isNumberFloatOnly(event)">
												</td>
												<td>
													<input type="text" onblur="calculate_total({{$i}})" value="{{$arr2['adjustment']}}" name="adjustment[{{$i}}]" onkeydown="isNumberFloatOnly(event)">
												</td>
												<td>
													<span class="total">{{$arr2['final_amt']}}</span></td>
												<td><a href="$(this).closest('tr').remove()">Delete</a></td>
											</tr>
												@php(($i++))
											@endforeach
										@endforeach
														
														
									
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
@if(isset($form) && $form==true)
	checkRadioValue();
function checkRadioValue(){
	if($("input[name='type']:checked").val()=='Expenses'){
		$("#month").closest('div').show();
		$("#year").closest('div').show();
				}
	else{
		$("#month").closest('div').hide();
		$("#year").closest('div').hide()
		
		}
}
function check_form(){
	if($("#employee_id").val()==''){
		alert('Please select employee');return false;
	}
	if($("input[name='type']:checked").val()=='Expenses'){
		if($("#month").val()==''){
				alert('Please select month');return false;
			}
		if($("#year").val()==''){
			alert('Please select year');return false;
		}
	}
	
	return true;
}
$( function() {

	 var options = {
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
				 
	 $("#employee_name").easyAutocomplete(options);

	 
} );
@endif

get_allocation_subhead();
get_allocation_pcrhead();
get_allocationlist();
function get_allocation_subhead(){
	 $("#allocation_subhead_id").html('');
	 $("#allocation_pcrhead_id").html('');
	 $("#allocationlist_id").html('');
	 $.post("ajax/getSelectData","module=allocation_subhead&allocation_head_id="+$("select[name='allocation_head_id']").val()+"&_token={{ csrf_token() }}",function(data){
		 $("select[name='allocation_subhead_id']").html(data);
		});
}
function get_allocation_pcrhead(){
	 $("#allocation_pcrhead_id").html('');
	 $("#allocationlist_id").html('');
	 $.post("ajax/getSelectData","module=allocation_pcrhead&allocation_subhead_id="+$("select[name='allocation_subhead_id']").val()+"&_token={{ csrf_token() }}",function(data){
		 $("select[name='allocation_pcrhead_id']").html(data);
		});
}


function get_allocationlist(){
	 $("#allocationlist_id").html('');
	 $.post("ajax/getSelectData","module=allocationlist&allocation_pcrhead_id="+$("select[name='allocation_pcrhead_id']").val()+"&_token={{ csrf_token() }}",function(data){
		 $("select[name='allocationlist_id']").html(data);
		});
}
function filter(){
	$("#item_table tbody tr").css('display','');
		if($("#allocationlist_id").val()!='' && $("#allocationlist_id").val()!='0' && $("#allocationlist_id").val()!=null){
			alert('1');
			
		$("#item_table tbody tr").not($(".list_"+$("#allocationlist_id").val()).closest('tr')).css('display','none');
		return false;
	}
	else if($("#allocation_pcrhead_id").val()!='' && $("#allocation_pcrhead_id").val()!='0' && $("#allocation_pcrhead_id").val()!=null){
		alert('2');
		
		$("#item_table tbody tr").not($(".pcrhead_"+$("#allocation_pcrhead_id").val()).closest('tr')).css('display','none');
	
	}
	else if($("#allocation_subhead_id").val()!='' && $("#allocation_subhead_id").val()!='0' && $("#allocation_subhead_id").val()!=null){
		alert('3');
		
		$("#item_table tbody tr").not($(".subhead_"+$("#allocation_subhead_id").val()).closest('tr')).css('display','none');
	
	}
	else if($("#allocation_head_id").val()!='' && $("#allocation_head_id").val()!='0' && $("#allocation_subhead_id").val()!=null){
		alert('4');
		
		$("#item_table tbody tr").not($(".head_"+$("#allocation_head_id").val()).closest('tr')).css('display','none');
	
	}
}
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

function calculate_total(k){
	var value1=parseFloat($("input[name='total_amt["+k+"]']").val());
	var value2=parseFloat($("input[name='adjustment["+k+"]']").val());
	$('#'+k+'_row .total').html(value1+value2);
}
function checkform(){
	if($("#item_table tbody tr").length==0){
	alert('Please Add Atleast one row');return false;
	}
	return true;
}
 </script>
@endsection