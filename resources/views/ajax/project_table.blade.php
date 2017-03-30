{{ Form::open(array('url' => '','method'=>'post','onsubmit'=>'return false')) }}
{{ Form::inputHidden('year','year',$year,'',['placeholder'=>'Role Name']) }}
{{ Form::inputHidden('project_id','project_id',$project_id,'',['placeholder'=>'Role Name']) }}
<button type="button" class="btn btn-info" onclick="save_form(this.form)">Save</button>
<div class="table-responsive">
<table id="cost_table" class="table table-bordered">
@php(($dom=dom_array()))
	<thead>
		<tr>
				<th colspan="2">FORECAST:</th>
				@foreach($dom['month_dom'] as $arr)
				<th>{{$arr}} {{$year}}</th>
				@endforeach
				<td></td>
		</tr>
	</thead>
	<tbody>
	
		
		<tr>
			<th>Revenue
			<input type="hidden" name="cost_type[]" value="revenue" onkeydown="isNumberFloatOnly(event)" size="5" >
			</th>
			<td>&nbsp;</td>
			@foreach($dom['month_dom'] as $key=>$arr)
				<td ><input type="text" name="revenue[{{$key}}]" onkeydown="isNumberFloatOnly(event)" size="5" value="{{$data['revenue'][$key] or '0'}}" ></td>
			@endforeach
			<td class="total">0</td>
		</tr>
		<tr>
			<th>FTE
			<input type="hidden" name="cost_type[]" value="fte" onkeydown="isNumberFloatOnly(event)" size="5" >
			
			</th>
			<th>Onsite</th>
			@foreach($dom['month_dom'] as $key=>$arr)
				<td><input type="text" name="fte[{{$key}}]" onkeydown="isNumberFloatOnly(event)" size="5"  value="{{$data['revenue'][$key] or '0'}}" ></td>
			@endforeach
			<td class="total">0</td>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<th>Offshore
			<input type="hidden" name="cost_type[]" value="offshore" onkeydown="isNumberFloatOnly(event)" size="5" >
			
			</th>
			@foreach($dom['month_dom'] as $key=>$arr)
				<td><input type="text" name="offshore[{{$key}}]" onkeydown="isNumberFloatOnly(event)" size="5"  value="{{$data['offshore'][$key] or '0'}}" ></td>
			@endforeach
			<td class="total">0</td>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<th>Subcontract
			<input type="hidden" name="cost_type[]" value="subcontract" onkeydown="isNumberFloatOnly(event)" size="5" >
			</th>
			@foreach($dom['month_dom'] as $key=>$arr)
				<td><input type="text" name="subcontract[{{$key}}]" onkeydown="isNumberFloatOnly(event)" size="5"  value="{{$data['subcontract'][$key] or '0'}}" ></td>
			@endforeach
				<td class="total">0</td>
		</tr>
		<tr>
			<th>DPR Cost</th>
			<th>Project Travel Cost
						<input type="hidden" name="cost_type[]" value="travelcost" onkeydown="isNumberFloatOnly(event)" size="5" >
			</th>
			@foreach($dom['month_dom'] as $key=>$arr)
				<td><input type="text" name="travelcost[{{$key}}]" onkeydown="isNumberFloatOnly(event)" size="5"  value="{{$data['travelcost'][$key] or '0'}}" ></td>
			@endforeach
			<td class="total">0</td>
		</tr>
		
		<tr>
			<th>&nbsp;</th>
			<th>SW Cost
						<input type="hidden" name="cost_type[]" value="swcost" onkeydown="isNumberFloatOnly(event)" size="5" >
			</th>
			@foreach($dom['month_dom'] as $key=>$arr)
				<td><input type="text" name="swcost[{{$key}}]" onkeydown="isNumberFloatOnly(event)" size="5"  value="{{$data['swcost'][$key] or '0'}}" ></td>
			@endforeach
			<td class="total">0</td>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<th>Any Other: Training, Reward, etc.
				<input type="hidden" name="cost_type[]" value="other" onkeydown="isNumberFloatOnly(event)" size="5" >
			</th>
			@foreach($dom['month_dom'] as $key=>$arr)
				<td><input type="text" name="other[{{$key}}]" onkeydown="isNumberFloatOnly(event)" size="5"  value="{{$data['other'][$key] or '0'}}" ></td>
			@endforeach
			<td class="total">0</td>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<th>Subcontracting cost
						<input type="hidden" name="cost_type[]" value="subcontracting_cost" onkeydown="isNumberFloatOnly(event)" size="5" >
			</th>
			@foreach($dom['month_dom'] as $key=>$arr)
				<td><input type="text" name="subcontracting_cost[{{$key}}]" onkeydown="isNumberFloatOnly(event)" size="5"  value="{{$data['subcontracting_cost'][$key] or '0'}}" ></td>
			@endforeach
			<td class="total">0</td>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<th>Rental Machines
						<input type="hidden" name="cost_type[]" value="rental_machine" onkeydown="isNumberFloatOnly(event)" size="5" >
			</th>
			@foreach($dom['month_dom'] as $key=>$arr)
				<td><input type="text" name="rental_machine[{{$key}}]" onkeydown="isNumberFloatOnly(event)" size="5"  value="{{$data['rental_machine'][$key] or '0'}}" ></td>
			@endforeach
			<td  class="total"></td>
		</tr>
		<tr>
			<th colspan="14">Grand Total</th>
		
			<td  class="G_total">0</td>
		</tr>
	</tbody>
</table>
</div>
<button type="button" class="btn btn-info" onclick="save_form(this.form)">Save</button>
{{ Form::close() }}
<script>

function save_form(form){
	$("#ajaxStatusDiv").show();
	$.post('{{url("ajax/saveprojectyear")}}',$(form).serialize(),function(data){
		$("#ajaxStatusDiv").hide();
		alert('Saved...');
		
		}).fail(function(){
alert('Ajax failed...');
$("#ajaxStatusDiv").hide();
			});
}			
$(function(){
	$("#cost_table tr input").on('blur',function(){
		var total=0;
		$(this).closest('tr').find('input[type="text"]').each(function(){
			if(this.value!='')
				total+=parseFloat(this.value);
			});
		$(this).closest('tr').find('.total').html(total);
		var g_total=0;
		$('.total').each(function(){
				if(this.innerHTML!='')
					g_total+=parseFloat(this.innerHTML);
			});
		$(".G_total").html(g_total);
	});
})

</script>