@extends('layouts.app')

<?php $link='employee'?>
@section('content')
<div class="row wrapper border-bottom white-bg page-heading ng-scope">
  <div class="col-lg-10">
    <h2>Employees</h2>
  </div>
</div>


<div class="wrapper wrapper-content animated fadeIn ng-scope" ng-init="init()">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>New Employees</h5>
        </div>
        <div class="ibox-content">
  @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        
                     {{ Form::open(array('url' => 'employee-hierarchy/save','method'=>'post')) }}
                     {{ Form::inputHidden('record','record',((isset($result->id))?$result->id:''),'',['placeholder'=>'Role Name']) }}
                     {{ Form::inputText('effective_date','Effective Date',((isset($result->effective_date))?$result->effective_date->format('d/m/Y h:i a'):''),'',['class'=>'form-control datetimepicker']) }}
		            <div id="orgChartContainer">
				      <div id="orgChart"></div>
				    </div>                             	                           				
           		 <button type="submit" class="btn btn-primary">Submit</button>
            {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>


</div>
<!-- Modal -->
<div id="add_employee" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
                    {{ Form::open(array('url' => '','method'=>'post','id'=>'editview','onsubmit'=>'return false')) }}
   
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Employee</h4>
      </div>
      <div class="modal-body">
                       <div id="" class="form-group">
						 <label for="">Employee Name</label>
						 <input type="text" value="" name="employee_name"  id="employee_name" class="form-control">
						 <input type="hidden" value="" name="employee_id"  id="employee_id" class="form-control">
						 <input type="hidden" value="" name="parent_id"  id="parent_id" class="form-control">
						 						 						 
						</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="if(validateModel()){ closeModel()}" >Submit</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
    </div>
                {{ Form::close() }}
    
  </div>
</div>
@endsection
@section('boot_css')
    <link rel="stylesheet" href="{{url('css/jquery.orgchart.css')}}">
    <link rel="stylesheet" href="{{url('css/bootstrap-datetimepicker.css')}}">
      <link rel="stylesheet" href="{{url('js/easy/easy-autocomplete.min.css')}}"> 
    
@endsection
@section('css')
<style type="text/css">
#orgChart{
    width: auto;
    height: auto;
}

#orgChartContainer{
    width: 1000px;
    height: 500px;
    overflow: auto;
    background: #eeeeee;
}
.easy-autocomplete {
    width: auto !important;
}
 </style>
@endsection
@section('js')
    <script src="{{url('js/bootstrap-datetimepicker.js')}}"></script>
        <script type="text/javascript" src="{{url('js/jquery.orgchart.js')}}"></script>
    <script src="{{url('js/easy/jquery.easy-autocomplete.min.js')}}"></script> 
    
    <script type="text/javascript">
    $('.datetimepicker').datetimepicker();

</script>
     <script type="text/javascript">
    /* var testData = [
        {id: 1, name: 'My Organization', parent: 0},
        {id: 2, name: 'CEO Office', parent: 1},
        {id: 3, name: 'Division 1', parent: 1},
        {id: 4, name: 'Division 2', parent: 1},
        {id: 6, name: 'Division 3', parent: 1},
        {id: 7, name: 'Division 4', parent: 1},
        {id: 8, name: 'Division 5', parent: 1},
        {id: 5, name: 'Sub Division', parent: 3},
        
    ]; */
    var testData = [
                    @if(count($data1) >0)
                    @foreach($data1 as $arr)
                    {id: {{$arr->employee_id}}, name: '{{$arr->emp_name."(".$arr->department_name." )"}}', parent:{{$arr->parent_employee_id}}},
                       @endforeach  
                    @else
                    {id: 0, name: 'P3 Organisation', parent: 0},
                    
                    @endif   
                ]; 
    $(function(){
        org_chart = $('#orgChart').orgChart({
            data: testData,
            showControls: true,
            allowEdit: false,
            onAddNode: function(node){ 
            	openModel(node.data.id);
            },
            onDeleteNode: function(node){
                log('Deleted node '+node.data.id);
                org_chart.deleteNode(node.data.id); 
            },
            onClickNode: function(node){
                log('Clicked node '+node.data.id);
            }

        });
    });

    // just for example purpose
    function log(text){
    }
    function openModel(parent_id)
    {
    	$("#parent_id").val(parent_id);
    	$("#add_employee").modal();
        
    }
    function validateModel(){
		  if($("#employee_id").val()==''){
	 			alert('Please Select Employee From list');
	 			return false;
	            }
          return true;
          }
    function closeModel()
    {
      
        org_chart.addNode({id: $("#employee_id").val(), name: $("#employee_name").val(), parent:  $("#parent_id").val()})
        $("#employee_name").val('');
        $("#employee_id").val('');
    	$("#add_employee").modal('hide');
        
    }
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
	 
    </script>
@endsection
