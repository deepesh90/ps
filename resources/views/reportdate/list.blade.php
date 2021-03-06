@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading ng-scope">
  <div class="col-lg-10">
    <h2>Report Date List</h2>
  </div>
    <div class="col-lg-2">
        <div class="pull-right"><a href="{{url('report_date/add')}}" class="btn btn-info">Add Report Date</a></div>
    
  </div>
</div>

<div class="wrapper wrapper-content animated fadeIn ng-scope" ng-init="init()">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Report Date</h5> 
        </div>
        <div class="ibox-content">
          <table class="table table-bordered">
                <tbody>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                                    <th>Status</th>
                                    <th style="width: 30%">Action</th>
                </tr>
                @php (($i=0))
               @foreach($data as $arr)
                               
                <tr>
                   <td>{{++$i}}</td>
                   <td>{{$arr->from_date->format('d/m/Y')	}}</td>
                     <td>{{$arr->to_date->format('d/m/Y')	}}</td>
                      <td>{{$arr->status	}}</td>
                                                        
                  <td>
                  								                  										
															<a class="btn btn-xs btn-info" href="{{url('report_date/edit/'.$arr->id)}}">
																<i class="ace-icon fa fa-pencil bigger-120"></i>
															</a>

															<a class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to delete?')" href="{{url('report_date/delete/'.$arr->id.'/customer/customer')}}">
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
