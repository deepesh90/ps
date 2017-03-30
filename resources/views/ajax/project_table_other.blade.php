{{ Form::open(array('url' => '','method'=>'post','onsubmit'=>'return false')) }}
{{ Form::inputHidden('year','year',$year,'',['placeholder'=>'Role Name']) }}
{{ Form::inputHidden('month','month',$month,'',['placeholder'=>'Role Name']) }}
{{ Form::inputHidden('project_id','project_id',$project_id,'',['placeholder'=>'Role Name']) }}
<button type="button" class="btn btn-info" onclick="save_form(this.form)">Save</button>
<div class="table-responsive">
<table id="cost_table" class="table table-bordered" border="1">
@php(($dom=dom_array()))
	<thead>
		<tr>
				<th colspan="2">ACTUAL:</th>
				<th>{{$dom['month_dom'][$month]}} {{$year}}</th>
				<td></td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th>Revenue
			</th>
			<th>Billed
			<input type="hidden" name="cost_type[]" value="revenue_billed" onkeydown="isNumberFloatOnly(event)"  >
			</th>
				<td ><input type="text" class="form-control" name="revenue_billed" onkeydown="isNumberFloatOnly(event)"  value="{{$data['revenue_billed'] or '0'}}" ></td>
		</tr>
		
		
		<tr>
			<th>FTE
			</th>
			<th>Subcontract
				<input type="hidden" name="cost_type[]" value="subcontract" onkeydown="isNumberFloatOnly(event)"  >
			</th>
				<td><input type="text" class="form-control" name="subcontract" onkeydown="isNumberFloatOnly(event)"   value="{{$data['subcontract'] or '0'}}" ></td>
		</tr>
		<tr>
			<th rowspan="5">DPR Cost</th>
			<th>Project Travel Cost
				<input type="hidden" name="cost_type[]" value="travelcost" onkeydown="isNumberFloatOnly(event)"  >
			</th>
				<td><input type="text" class="form-control" name="travelcost" onkeydown="isNumberFloatOnly(event)"   value="{{$data['travelcost'] or '0'}}" ></td>
		</tr>
		
		<tr>
			<th>SW Cost
					<input type="hidden" name="cost_type[]" value="swcost" onkeydown="isNumberFloatOnly(event)"  >
			</th>
				<td><input type="text" class="form-control" name="swcost" onkeydown="isNumberFloatOnly(event)"   value="{{$data['swcost'] or '0'}}" ></td>
		</tr>
		<tr>
			<th>Any Other: Training, Reward, etc.
				<input type="hidden" name="cost_type[]" value="other" onkeydown="isNumberFloatOnly(event)"  >
			</th>
				<td><input type="text" class="form-control" name="other" onkeydown="isNumberFloatOnly(event)"   value="{{$data['other'] or '0'}}" ></td>
		</tr>
		<tr>
			<th>Subcontracting cost
						<input type="hidden" name="cost_type[]" value="subcontracting_cost" onkeydown="isNumberFloatOnly(event)"  >
			</th>
				<td><input type="text" class="form-control" name="subcontracting_cost" onkeydown="isNumberFloatOnly(event)"   value="{{$data['subcontracting_cost'] or '0'}}" ></td>
		</tr>
		<tr>
			<th>Rental Machines
						<input type="hidden" name="cost_type[]" value="rental_machine" onkeydown="isNumberFloatOnly(event)"  >
			</th>
				<td><input type="text" class="form-control" name="rental_machine" onkeydown="isNumberFloatOnly(event)"   value="{{$data['rental_machine'] or '0'}}" ></td>
		</tr>
		<tr>
			<th rowspan="4">Additional Information
			</th>
			<th>KPI
						<input type="hidden" name="description[]" value="kpi" onkeydown="isNumberFloatOnly(event)"  >
			</th>
				<td><textarea name="kpi" class="form-control">{{$data['kpi'] or ''}}</textarea></td>
		</tr>
		<tr>
			<th>Risk
			
						<input type="hidden" name="description[]" value="risk"  >
			</th>
				<td><textarea  name="risk" class="form-control">{{$data['risk'] or ''}}</textarea></td>
		</tr>
		<tr>
			<th>Actions
			
						<input type="hidden" name="description[]" value="actions"  >
			</th>
				<td><textarea name="actions"  class="form-control">{{$data['actions'] or ''}}</textarea></td>
		</tr>
		<tr>
			<th>KPIComments
			
						<input type="hidden" name="description[]" value="travelcost"  >
			</th>
				<td><textarea name="kpicomments" class="form-control" >{{$data['kpicomments'] or ''}}</textarea></td>
		</tr>
		
	</tbody>
</table>
</div>
<button type="button" class="btn btn-info" onclick="save_form(this.form)">Save</button>
{{ Form::close() }}
<script>

function save_form(form){
	$("#ajaxStatusDiv").show();
	$.post('{{url("ajax/getprojecttable_other_save")}}',$(form).serialize(),function(data){
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