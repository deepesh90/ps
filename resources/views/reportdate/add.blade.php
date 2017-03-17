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
          <h5>Add FTE</h5>
        </div>
        <div class="ibox-content">
          <div class="row"  aria-hidden="false" style="">
            <div class="col-md-12">
              <div class="panel panel-primary">
                <div class="panel-heading">
                </div>

                
                <div class="panel-body">
                <div class="row">
                	<div class="col-md-12">
                	    {{ Form::open(array('url' => 'user-type/saveRole','method'=>'post',"onsubmit"=>"checkform(this)")) }}
                	    {{ Form::inputHidden('record','',isset($result['id']) ? $result['id'] :'')}}
                	   	{{ Form::inputText('from_date','From date',isset($result['from_date']) ? $result['from_date'] :'','',['required'=>'true','class'=>'form-control datepicker'])}}
                	    {{ Form::inputText('to_date','To date',isset($result['from_date']) ? $result['from_date'] :'','',['required'=>'true','class'=>'form-control datepicker'])}}
                	    {{ Form::inputSelect('status','Status',['Active'=>'Active','Inactive'=>'Inactive'],isset($result['parent_id']) ? $result['parent_id'] :'') }}
                	    
                	      <button type="submit" class="btn btn-danger">Save</button>         	
                	 
                	  {{ Form::close() }}
                </div>
                

                </div>
                
               
              </div>

            </div>
          </div>
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
 $( function() {

	 $("#employee_name").easyAutocomplete( {
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
		});
	 
  } );

 $("#employee_name").on('change',function(){
		if(this.value=='')
			$("#employee_id").val('');
	 })
 function validate_employee(form){
		$("#msg").html('');
		 var emp_id=$("#employee_id").val();
		 var emp_name=$("#employee_name").val();
	if(emp_name==''){
			$("#msg").html('Please Select Employee From drop Down');
			return false;
		}
	if(emp_id==''){
		$("#msg").html('Please Select Employee From drop Down');
		return false;
	}
	
	$.post("{{url('ajax/emp_detail')}}",$(form).serialize()).done(function(data){
		alert(data);
		});
 }
 </script>
@endsection
  
