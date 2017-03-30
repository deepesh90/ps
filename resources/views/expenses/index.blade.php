@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading ng-scope">
  <div class="col-lg-10">
    <h2>Monthly Expenses</h2>
  </div>
</div>

<div class="wrapper wrapper-content animated fadeIn ng-scope" >
  <div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Monthly Expenses</h5>
        </div>
        <div class="ibox-content">
          <div class="row flex-element center-both mb-20">
            <div class="top-table">
            {{ Form::open(array('url' => 'expenses','method'=>'get')) }}
             {{ Form::inputHidden('expense','Expenses','true') }}
              <table class="table table-bordered ">
                <tbody>

                  <tr>
                    <td>
               				 {{ Form::inputSelect('month','Month',[
               				 	'1'=>'Jan',
               				 	'2'=>'Feb',
               				 	'3'=>'Mar',
               				 	'4'=>'Apr',
               				 	'5'=>'May',
               				 	'6'=>'Jun',
               				 	'7'=>'Jul',
               				 	'8'=>'Aug',
               				 	'9'=>'Sept',
               				 	'10'=>'Oct',
               				 	'11'=>'Nov',
               				 	'12'=>'Dec',
               				 ],((isset($input['month']))?$input['month']:date('m')),'',['required'=>true]) }}
                   
                    
        			</td>
                    <td width="">
                      	{{ Form::inputText('year','Year',((isset($input['year']))?$input['year']:date('Y')),'',['placeholder'=>'YYYY','required'=>'true']) }}
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
		@if(isset($input['expense']))
			<div class="row">
				<div class="col-sm-12">
				
				      {{ Form::open(array('url' => 'expenses/save','method'=>'post','onsubmit'=>'return checkform()')) }}
		             {{ Form::inputHidden('month','Month',((isset($input['month']))?$input['month']:date('m'))) }}
		             {{ Form::inputHidden('year','Year',((isset($input['year']))?$input['year']:date('Y'))) }}
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


@section('js')
 <script>
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