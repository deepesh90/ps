@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading ng-scope">
  <div class="col-lg-10">
    <h2>Project Actual Submission</h2>
  </div>
</div>
<?php 
$start_date=$rep_date->from_date->format('n');
$end_date=$rep_date->to_date->format('n');
$dom=dom_array();
?>
<div class="wrapper wrapper-content animated fadeIn ng-scope" >
  <div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Project Actual Submission</h5>
        </div>
        <div class="ibox-content">
          <div class="row flex-element center-both mb-20">
            <div class="top-table">
            {{ Form::open(array('url' => '','method'=>'post','onsubmit'=>'return false')) }}
            
              <table class="table table-bordered ">
                <tbody>

                  <tr>
                    <td>
                    	<input type="text"  class="form-control project_name" name="project_name" value=""  placeholder="Enter Project Name">
        				<input type="hidden" id="project_id" name="project_id" value="" placeholder="Enter Project Name">
        			</td>
                    <td width="">
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
                    </td>
                     <td>
                     <button class="btn btn-info" id="submit" type="button">Submit</button>
                     <button class="btn btn-danger" id="clear" type="button">Clear</button>
                     </td>
                    
                  </tr>
                </tbody>
              </table>
      {{ Form::close() }}
      
            </div>
            </div>

          <div id="ajax_div" ></div>
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
        $('#project_id').val(ui.item.id).trigger("change");
    }
  });
$('.datepicker').datepicker({
	format: 'mm/dd/yyyy',
    }); 

$("#submit").on('click',function(){
	$("#ajax_div").html('');
	var project_id=$("#project_id").val();
	if(project_id==''){
		alert('Please Select the Project from dropdown');
		return false;
	}
	var month=$("#month").val();
	if(month==''){
		alert('Please Select Month');
		return false;
	}
	this.disabled=true;
	$(".project_name").prop('disabled',true);

	$.post("ajax/getprojecttable_other",$(this.form).serialize(),function(data){
		$("#ajax_div").html(data);
		})
  });

$("#clear").on('click',function(){
	$(this.form).find('input,button,select').prop('disabled',false);

  });
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

 </script>
@endsection