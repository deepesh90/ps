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
          <h5>User Type List</h5>
        </div>
        <div class="ibox-content">
          <table class="table table-bordered">
                <tbody>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Role Name</th>
                  <th style="width: 30%">Action</th>
                </tr>
                @php (($i=0))
               @foreach($data as $arr)
                               
                <tr>
                  <td>{{++$i}}</td>
                  <td>{{$arr->name}}</td>
                  <t
                  								                  										
															<a class="btn btn-xs btn-info" href="{{url('user-type/edit'.$arr->id)}}">
																<i class="ace-icon fa fa-pencil bigger-120"></i>
															</a>

															<a class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to delete?')" href="{{url('user-type/delete'.$arr->id)}}">
																<i class="ace-icon fa fa-trash-o bigger-120"></i>
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
