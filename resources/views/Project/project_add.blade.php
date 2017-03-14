@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading ng-scope">
  <div class="col-lg-10">
    <h2>User Type</h2>
  </div>
</div>

<div class="wrapper wrapper-content animated fadeIn ng-scope" ng-init="init()">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Project</h5>
        </div>
        <div class="ibox-content">
          <div class="row"  aria-hidden="false" style="">
            <div class="col-md-12">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  Project Entry
                </div>
                 {{ Form::open(array('url' => 'project/save','method'=>'post','id'=>'editview')) }}
                   {{ Form::inputHidden('record','',isset($result['id']) ? $result['id'] :'')}}
                
                <div class="panel-body">
                  <div class="row">

                    <div class="col-md-6">
                       {{ Form::inputText('project_name','Project Name',isset($result['project_name']) ? $result['project_name'] :'','',['required'=>'true'])}}
                    
                    </div>
                    <div class="col-md-6">
                    <div id="" class="form-group">
					 <label for="">Customer Name</label>
					 <input type="text" value="" name="customer_name"  id="customer_name" class="form-control">
				<!-- 	  <button class="btn  btn-primary" type="button" onclick='window.open("{{url('ajax/list')}}?module_name=customers&filter[customer_name]=s&select[]=customer_name&map=customer", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400")'>
		                          Select
		                      </button> -->
		                       <button class="btn  btn-primary" type="button" onclick='window.open("{{url('ajax/list')}}?module_name=customers&select[]=customer_name&select[]=website&select[]=phone_no&map=customer", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400")'>
		                          Select
		                      </button>
                    		 <button class="btn  btn-primary" type="button" onclick="$('#customer_name').val('');$('#customer_id').val('')">
		                          Clear
		                      </button>
					</div>
                       {{ Form::inputHidden('customer_id','Customer','','') }}
                                        
                      
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Start Date</label>
                          <input type="text" name="start_date" class="form-control datepicker">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>End Date</label>
                          <input type="text"  name="end_date"  class="form-control datepicker">
                      </div>
                    </div>
                    <div class="col-md-4">
                      
                       <div id="" class="form-group">
						 <label for="">Project Manager</label>
						 <input type="text" value="" name="project_manager_name"  id="project_manager_name" class="form-control">
						 
						</div>
                       {{ Form::inputHidden('project_manager_id','Customer','','') }}
                                   
                    </div>

                  </div>


                </div>
                <div class="panel-footer">
                  <div class="flex-element  align-bw">
                    <div class="footer-text">
                      <h5>Please review your changes before you save them. Changes once saved cannot be
                reverted.</h5>
                    </div>
                    <div class="save-btn">
                      <button class="btn  btn-primary" type="submit" ng-click="onSubmit();">
                          Save Changes
                      </button>
                    </div>
                  </div>
                </div>
                {{ Form::close() }}
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

	 var options = {
				url: function(phrase) {
					return "{{url('ajax/search_customer')}}?term=" + phrase + "&format=json";
				},
				list: {

					onSelectItemEvent: function() {
						var value = $("#customer_name").getSelectedItemData().id;
						$("#customer_id").val(value).trigger("change");
					}
				},
				getValue: "label"
			};
				 
	 $("#customer_name").easyAutocomplete(options);
	 $("#project_manager_name").easyAutocomplete( {
			url: function(phrase) {
				return "{{url('ajax/search_manager')}}?term=" + phrase + "&format=json";
			},
			list: {

				onSelectItemEvent: function() {
					var value = $("#project_manager_name").getSelectedItemData().id;
					$("#project_manager_id").val(value).trigger("change");
				}
			},
			getValue: "label"
		});
	 
  } );
 </script>
@endsection
  