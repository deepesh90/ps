@extends('layouts.app')


@section('content')
<section class="content">
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Employees hierarchy</h3>

              
            </div>
            <!-- /.box-header -->
           
            <div class="box-body">
					<div class="row">
						<div class="col-sm-12">
								<a href="{{url('employee-hierarchy/edit/'.$detail->id)}}" class="btn btn-info">Edit</a>
								<a href="{{url('employee-hierarchy/clone/'.$detail->id)}}" class="btn btn-info">Clone</a>
						</div>
					</div>
                             
                             
                    <dl class="dl-horizontal">
               			 <dt>Role Name</dt>
                			<dd>{{$detail->effective_date->format('d/m/Y H:i:s') }}</dd>
                
              		</dl>         
           							      <div id="orgChart"></div>
           			
			
                
            </div>

            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
</section>
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
                    @foreach($data as $arr)
                 {id: {{$arr->employee_id}}, name: '{{$arr->emp_name."(".$arr->department_name." )"}}', parent:{{$arr->parent_employee_id}}},
                    
                    @endforeach
                    
                ]; 
    
    $(function(){
        org_chart = $('#orgChart').orgChart({
            data: testData,
            showControls: false,
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
