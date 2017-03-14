@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading ng-scope">
  <div class="col-lg-10">
    <h2>Customer List</h2>
  </div>
    <div class="col-lg-2">
        <div class="pull-right"><a href="{{url('employee')}}" class="btn btn-info">Add Project FTE</a></div>
    
  </div>
</div>

<div class="wrapper wrapper-content animated fadeIn ng-scope" ng-init="init()">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Project FTE</h5> 
        </div>
        <div class="ibox-content">
          <table class="table table-bordered">
                <tbody>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Project Name</th>
                  <th>Employee Name</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th style="width: 30%">Action</th>
                </tr>
                @php (($i=0))
               @foreach($data as $arr)
                               
                <tr>
                   <td>{{++$i}}</td>
                   <td>{{$arr->project_name	}}</td>
                   <td>{{$arr->emp_name}}</td>
                   <td>{{$arr->start_date->format('d/m/Y')	}}</td>
                     <td>{{$arr->end_date->format('d/m/Y')	}}</td>
                                     
                  <td>
                  								                  										
															<a class="btn btn-xs btn-info" href="{{url('customer/edit/'.$arr->id)}}">
																<i class="ace-icon fa fa-pencil bigger-120"></i>
															</a>

															<a class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to delete?')" href="{{url('user-type/delete/'.$arr->id.'/customer/customer')}}">
																<i class="ace-icon fa fa-trash bigger-120"></i>
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
