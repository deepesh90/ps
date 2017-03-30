@extends('layouts.app')
<?php $link='employee'?>

@section('content')
<div class="row wrapper border-bottom white-bg page-heading ng-scope">
  <div class="col-lg-10">
    <h2>Employee</h2>
  </div>
   <div class="col-lg-2">
        <div class="pull-right"><a href="{{url('employee/add')}}" class="btn btn-info">Add Employee</a></div>
    
  </div>
</div>
<div class="wrapper wrapper-content animated fadeIn ng-scope" ng-init="init()">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-content">
          <div class="row" ng-show="hasData" aria-hidden="false" style="">
            <div class="col-md-12">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  Employee Entry
                </div>
                <div class="panel-body">
						              <table class="table table-bordered">
						                <tbody><tr>
						                  <th style="width: 10px">#</th>
						                  <th>Employee Name</th>
		                                    <th>Employee Code</th>
		                                    <th>Department</th>
		                                    <th>Designation</th>
		                                    <th  style="width: 30%">Action</th>
						                </tr>
						               <?php $i=0;?>
						               @foreach($data as $arr)
						                <tr>
						                  <td>{{++$i}}</td>
						                  <td>{{$arr->name}}</td>
						                  <td>{{$arr->emp_id}}</td>
						                  <td>{{$arr->department_name}}</td>
						                  						                  <td>{{$arr->designation_name}}</td>
						                  						                  
						                                    <td>						
						
																					<button class="btn btn-xs btn-warning"  onclick="loadAssignFTEModel('{{$arr->id}}')">
																						<i class="ace-icon fa fa-desktop bigger-120"></i>
																					</button>               
																					<a class="btn btn-xs btn-warning"  href="{{url('employee/detail/'.$arr->id)}}">
																						<i class="ace-icon fa fa-info bigger-120"></i>
																					</a>       					                  										
																					<a class="btn btn-xs btn-info" href="{{url('employee/edit/'.$arr->id)}}">
																						<i class="ace-icon fa fa-pencil bigger-120"></i>
																					</a>
						
																					<button class="btn btn-xs btn-danger" onclick="if(confirm('Are you sure you want to delete?'))  $(this).closest('td').find('form').submit(); " >
																						<i class="ace-icon fa fa-trash-o bigger-120"></i>
																					</button>
																					 {{ Form::open(array('url' => 'delete','method'=>'delete')) }}
																					 {{ Form::inputHidden('record','record',((isset($arr->id))?$arr->id:''),'',['placeholder'=>'Role Name']) }}
																					 {{ Form::inputHidden('module','module','employee','',['placeholder'=>'Role Name']) }}
																					 {{ Form::inputHidden('redir','redir','employee','department',['placeholder'=>'Role Name']) }}
																					
																					 {{ Form::close() }}
						                  </td>
						                </tr>
						               @endforeach
						                
						               </tbody></table>
												

	

                </div>
                
            <div class="box-footer clearfix">
              {{ $data->links() }}
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
 <link rel="stylesheet" href="{{url('js/jquery-ui.css')}}"> 
@endsection
@section('boot_js')
  <script src="{{url('js/jquery-ui.js')}}"></script>


@endsection
@section('modals')

<!-- Modal -->
<div id="schedule_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
    	<img src="{{url('img/loader.gif')}}" />
     </div>

  </div>
</div>

@endsection
@section('js')
<script>
function loadAssignFTEModel(employee_id)
{
	$("#schedule_modal").modal();
	$.post("{{url('ajax/load_assign_fte')}}","employee_id="+employee_id+"&_token={{ csrf_token() }}").done(function(data){
		$("#schedule_modal .modal-content").html(data);
		
		});
}
</script>
@endsection