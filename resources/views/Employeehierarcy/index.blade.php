@extends('layouts.app')
<?php $link='employee-hierarchy'?>

@section('content')
<div class="row wrapper border-bottom white-bg page-heading ng-scope">
  <div class="col-lg-10">
    <h2>Employee Hierarchy</h2>
  </div>
   <div class="col-lg-2">
        <div class="pull-right"><a href="{{url('employee-hierarchy/add')}}" class="btn btn-info">Add New Employee Hierarchy</a></div>
    
  </div>
</div>
<div class="wrapper wrapper-content animated fadeIn ng-scope" ng-init="init()">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Employee Hierarchy</h5>
        </div>
        <div class="ibox-content">
          <div class="row" ng-show="hasData" aria-hidden="false" style="">
            <div class="col-md-12">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  Employee Hierarchy
                </div>
                <div class="panel-body">
						              <table class="table table-bordered">
						                <tbody><tr>
						                  	<th style="width: 10px">#</th>
						                  	<th>Effective Date</th>
		                                    <th  style="width: 30%">Action</th>
						                </tr>
						               <?php $i=0;?>
						               @foreach($data as $arr)
						                <tr>
						                  <td>{{++$i}}</td>
						                  <td>{{$arr->effective_date}}</td>

						                  
						                                    <td>						
						                  					                  										
																					<a class="btn btn-xs btn-warning" href="{{url('employee-hierarchy/detail/'.$arr->id)}}">
																						<i class="ace-icon fa fa-desktop bigger-120"></i>
																					</a>
						                  					                  										
																					<a class="btn btn-xs btn-info" href="{{url('employee-hierarchy/edit/'.$arr->id)}}">
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
