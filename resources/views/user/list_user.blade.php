@extends('layouts.app')
<?php $link='user'?>

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
          <h5>User Type List</h5>
        </div>
        <div class="ibox-content">
          <table class="table table-bordered">
                <tbody>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>User Role</th>
                  <th>Status</th>
                  <th style="width: 30%">Action</th>
                </tr>
                @php (($i=0))
               @foreach($data as $arr)
                               
                <tr>
                   <td>{{++$i}}</td>
                   <td>{{$arr->name}}</td>
                   <td>{{$arr->email}}</td>
                   <td>{{$arr->role_name}}</td>
                                      <td>{{$arr->status}}</td>
                                     
                  <td>
                  								                  										
															<a class="btn btn-xs btn-info" href="{{url('user/edit/'.$arr->id)}}">
																<i class="ace-icon fa fa-pencil bigger-120"></i>
															</a>

															

															
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
