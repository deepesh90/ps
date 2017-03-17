@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading ng-scope">
  <div class="col-lg-10">
    <h2>Customer List</h2>
  </div>
    <div class="col-lg-2">
        <div class="pull-right"><a href="{{url('project_fte/add')}}" class="btn btn-info">Add Project FTE</a></div>
    
  </div>
</div>

<div class="wrapper wrapper-content animated fadeIn ng-scope" ng-init="init()">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Project FTE</h5> 
        </div>
        <div class="ibox-content">
        <table class="table table-bordered">
             <td>
        								<input type="hidden" name="projects[]" class="form-control projects" value="0" placeholder="Enter Project Name">
        									<input type="text"  class="form-control project_name project_names" name="project_name[0]" value="" onblur="$('.projects').val($('#project_ids').val());$('.project_name').val(this.value)" placeholder="Enter Project Name">
        							    	<input type="hidden" id="project_ids" name="project_id[0]" value="" placeholder="Enter Project Name">
        							    </td>
        							    <td>
        							    	<select class="form-control slecet-field" name="project_location[0]" onblur="$('.project_location').val(this.value)" id="project_locations">
						                        <option>Offshore</option>
						                        <option>Onsite-Biz</option>
						                        <option>Onsite-WP</option>
						                      </select>
        							    </td>
        							    <td>
        							    <input type="text" id="start_dates" name="start_date[0]" class="form-control datepicker" onblur="$('.start_date').val(this.value)" value="">
        							    </td>
        							    <td>
        							    <input type="text" id="start_dates" name="end_date[0]" class="form-control datepicker" onblur="$('.end_date').val(this.value)" value="">
        							    </td>
        				
                        
        </table>
          <table class="table table-bordered">
                <tbody>
                <tr>
                  <th style="width: 10px">#</th>
                 	<th>Name</th>
	        		<th>Employee Code</th>
	        		<th>Project Name</th>
	        		<th>Project Location</th>
	        		<th>Start date</th>
	        		<th>End date</th>
        								

                </tr>
                @php (($i=0))
               @foreach($data as $arr)
                               
                <tr>
                   <td><input type="checkbox" name="select_check[]" value=""></td>
                   <td>{{$arr->name}}</td>
                   <td>{{$arr->emp_id	}}</td>
                 <td>
        								<input type="hidden" name="projects[]" class="form-control projects" value="0" placeholder="Enter Project Name">
        									<input type="text"  class="form-control project_name" name="project_name[0]" value="" placeholder="Enter Project Name">
        							    	<input type="hidden" class="project_id" name="project_id[0]" value="" placeholder="Enter Project Name">
        							    </td>
        							    <td>
        							    	<select class="form-control slecet-field project_location" name="project_location[0]">
						                        <option>Offshore</option>
						                        <option>Onsite-Biz</option>
						                        <option>Onsite-WP</option>
						                      </select>
        							    </td>
        							    <td>
        							    <input type="text"  name="start_date[0]" class="form-control datepicker start_date" value="">
        							    </td>
        							    <td>
        							    <input type="text" name="end_date[0]" class="form-control datepicker end_date" value="">
        							    </td>
        				
                                     
    </tr>
                            @endforeach
                                            
               </tbody></table>
        </div>
      </div>
    </div>
  </div>


</div>
@endsection
@section('boot_css')
 <link rel="stylesheet" href="{{url('js/jquery-ui.css')}}"> 
@endsection
@section('boot_js')
  <script src="{{url('js/jquery-ui.js')}}"></script>


@endsection
@section('js')
 <script>
 var i=1;
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
@endsection