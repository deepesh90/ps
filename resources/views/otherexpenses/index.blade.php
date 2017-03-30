@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading ng-scope">
  <div class="col-lg-10">
    <h2>User Type</h2>
  </div>
</div>

<div class="wrapper wrapper-content animated fadeIn ng-scope" >
  <div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Project Monthly Submission</h5>
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
                      	<select class="form-control" id="year" name="year">
                      		<option value="">--Select Year--	</option>
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
$(".project_name").on('blur',function(){
	var project_id=$("#project_id").val();
	if(project_id!='')
	$.get('{{url("ajax/getprojectyear")}}','project_id='+project_id,function(data){
		$("#year").html(data);
		})
  });
$("#submit").on('click',function(){
	$("#ajax_div").html('');
	var project_id=$("#project_id").val();
	if(project_id==''){
		alert('Please Select the Project from dropdown');
		return false;
	}
	var year=$("#year").val();
	if(year==''){
		alert('Please Select Year');
		return false;
	}
	this.disabled=true;
	$(".project_name").prop('disabled',true);
	$("#year").prop('disabled',true);
	$.post("ajax/getprojecttable",$(this.form).serialize()+"&year="+year,function(data){
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