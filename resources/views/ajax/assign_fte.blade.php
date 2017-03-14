{{ Form::open(array('url' => '','method'=>'post','onsubmit'=>'return checkform(this)')) }}
{{ Form::inputHidden('employee_id','employee_id',((isset($employee->id))?$employee->id:''),'',['placeholder'=>'Role Name']) }}
{{ Form::inputHidden('rep_id','rep_id',((isset($rep_date->id))?$rep_date->id:''),'',['placeholder'=>'Role Name']) }}

<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Assign Employee</h4>
      </div>
      <div class="modal-body">
        	<div class="table-responsive">
        			<table class="table table-bordered">
        				<thead>
        						<tr>
        								<td>Name</td>
        								<td>Employee Code</td>
        								<td>Department</td>
        								<td>Assign From Date</td>
        								<td>Assign To Date</td>
        						</tr>
        				</thead>
        				<tbody>
        						<tr>
        								<td>{{$employee->name}}</td>
        						        <td>{{$employee->emp_id}}</td>
        						        <td>{{$employee->department_name}}</td>
        						        <td>{{$rep_date->from_date->format('d/m/Y')}}</td>
        						        <td>{{$rep_date->to_date->format('d/m/Y')}}</td>
        						</tr>
        				</tbody>
        			
        			</table>
        	</div>
        	<div class="table-responsive">
        		<table class="table table-bordered" id="emp_table">
        				<thead>
        						<tr>
        								<td>Project Name</td>
        								<td>Project Location</td>
        								<td>Start date</td>
        								<td>End date</td>
        								<td>Action</td>
        						</tr>
        				</thead>
        				<tbody>
        						<tr>
        								<td>
        								<input type="hidden" name="projects[]" class="form-control projects" value="0" placeholder="Enter Project Name">
        									<input type="text"  class="form-control project_name" name="project_name[0]" value="" placeholder="Enter Project Name">
        							    	<input type="hidden" class="project_id" name="project_id[0]" value="" placeholder="Enter Project Name">
        							    </td>
        							    <td>
        							    	<select class="form-control slecet-field" name="project_location[0]">
						                        <option>Offshore</option>
						                        <option>Onsite-Biz</option>
						                        <option>Onsite-WP</option>
						                      </select>
        							    </td>
        							    <td>
        							    <input type="text" name="start_date[0]" class="form-control datepicker" value="">
        							    </td>
        							    <td>
        							    <input type="text" name="end_date[0]" class="form-control datepicker" value="">
        							    </td>
        							    <td></td>
        						</tr>
        				</tbody>
        		</table>
        	</div>
        	<div class="pull-right"><a href="javascript:addrow()">Add Row</a></div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" >Submit</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
 {{ Form::close() }}
 <script>
 var i=1;
function addrow(){
$("table#emp_table tbody").append(''+
		'<tr>'+
		'<td>'+
		'<input type="hidden" name="projects[]" class="form-control projects" value="'+i+'" placeholder="Enter Project Name">'+
			'<input type="text" name="project_name['+i+']" class="form-control project_name" value="" placeholder="Enter Project Name">'+
	    	'<input type="hidden" name="project_id['+i+']" class="project_id" value="" placeholder="Enter Project Name">'+
	    '</td>'+
	    '<td>'+
	    	'<select class="form-control slecet-field" name="project_location['+i+']">'+
                '<option>Offshore</option>'+
                '<option>Onsite-Biz</option>'+
                '<option>Onsite-WP</option>'+
              '</select>'+
	    '</td>'+
	    '<td>'+
	    '<input type="text" name="start_date['+i+']" class="form-control datepicker" value="">'+
	    '</td>'+
	    '<td>'+
	    '<input type="text" name="end_date['+i+']" class="form-control datepicker" value="">'+
	    '</td>'+
	    '<td><button type="button" onclick="javascript:$(this).closest(\'tr\').remove()">Delete</button></td>'+
'</tr>');
$( ".project_name" ).autocomplete({
    source: "{{url('ajax/search_project')}}",
    minLength: 2,
    select: function( event, ui ) {
        $(this).closest('tr').find('.project_id').val(ui.item.id).trigger("change");
    }
  });
$('.datepicker').datepicker({
	format: 'mm/dd/yyyy',
    });
i++;

}
$( ".project_name" ).autocomplete({
    source: "{{url('ajax/search_project')}}",
    minLength: 2,
    select: function( event, ui ) {
        $(this).closest('tr').find('.project_id').val(ui.item.id).trigger("change");
    }
  });
$('.datepicker').datepicker({
	format: 'mm/dd/yyyy',
    }); 
  
function checkform(form){
	var error=0;
	$(".error").remove();
	$("input").css('background','');
	$('.projects').each(function() { 
		var val=this.value;
		if($('input[name="project_id['+val+']"]').val()==''){
			$('input[name="project_name['+val+']"]').css('background','red');
			$('input[name="project_name['+val+']"]').after("<span class='error'>Project Name need to be selected from dropdown</span>");
						error++;
			}
		if($('input[name="start_date['+val+']"]').val()==''){
			$('input[name="start_date['+val+']"]').css('background','red');
			$('input[name="start_date['+val+']"]').after("<span class='error'>Start Date cannot Empty</span>");
						error++;
			}
		else if(new Date($('input[name="start_date['+val+']"]').val())< new Date('{{$rep_date->from_date->format("m/d/Y")}}')){
			$('input[name="start_date['+val+']"]').css('background','red');
			$('input[name="start_date['+val+']"]').after("<span class='error'>Start Date cannot be less than {{$rep_date->from_date->format("m/d/Y")}}</span>");
						error++;
			}
		else if(new Date($('input[name="start_date['+val+']"]').val())> new Date('{{$rep_date->to_date->format("m/d/Y")}}')){
			$('input[name="start_date['+val+']"]').css('background','red');
			$('input[name="start_date['+val+']"]').after("<span class='error'>Start Date cannot be less than {{$rep_date->to_date->format("m/d/Y")}}</span>");
						error++;
			}
		if($('input[name="end_date['+val+']"]').val()==''){
			$('input[name="end_date['+val+']"]').css('background','red');
			$('input[name="end_date['+val+']"]').after("<span class='error'>End Date cannot Empty</span>");
						error++;
			}

		else if(new Date($('input[name="end_date['+val+']"]').val())> new Date('{{$rep_date->to_date->format("m/d/Y")}}')){
			$('input[name="end_date['+val+']"]').css('background','red');
			$('input[name="end_date['+val+']"]').after("<span class='error'>End Date cannot be greater than {{$rep_date->to_date->format("m/d/Y")}}</span>");
						error++;
			}
		 
	 })
	 if(error==0){
		$.post("ajax/save_fte",$(form).serialize()).done(function(data){
				if(data==1){
						$("#schedule_modal").modal('hide');		
					}
				else{
						alert('error during operation');
					}
			})
	}
	return false
}

 </script>