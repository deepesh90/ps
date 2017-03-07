@extends('layouts.app')
<?php $link='role'?>

@section('content')
<div class="row wrapper border-bottom white-bg page-heading ng-scope">
  <div class="col-lg-10">
    <h2>User Role</h2>
  </div>
   <div class="col-lg-2">
        <div class="pull-right"><a href="{{url('roles/add')}}" class="btn btn-info">Add Role</a></div>
    
  </div>
</div>

<div class="wrapper wrapper-content animated fadeIn ng-scope" ng-init="init()">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Role List</h5>
        </div>
        <div class="ibox-content">
          <div class="row" ng-show="hasData" aria-hidden="false" style="">
            <div class="col-md-12">
            {{ $data->links() }}
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Role Name</th>
                  <th  style="width: 30%">Action</th>
                </tr>
               <?php $i=0;?>
               @foreach($data as $arr)
                <tr>
                  <td>{{++$i}}</td>
                  <td><a href="{{url('roles/detail/'.$arr->id)}}">{{$arr->role_name}}</a></td>
                  <td>										<a class="btn btn-xs btn-success" href="{{url('roles/detail/'.$arr->id)}}">
																<i class="ace-icon fa fa-desktop bigger-120"></i>
															</a>
                  
                  										
															<a class="btn btn-xs btn-info" href="{{url('roles/edit/'.$arr->id)}}">
																<i class="ace-icon fa fa-pencil bigger-120"></i>
															</a>

	
															<a class="btn btn-xs btn-warning" href="{{url('roles/clone/'.$arr->id)}}">
																<i class="ace-icon fa fa-copy bigger-120"></i>
															</a>	
                  </td>
                </tr>
               @endforeach
                
               </tbody></table>
{{ $data->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>

@endsection