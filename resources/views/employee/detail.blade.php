@extends('layouts.app')


@section('content')

<div class="row wrapper border-bottom white-bg page-heading ng-scope">
  <div class="col-lg-10">
    <h2>Employee</h2>
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
                  Employee Detail
                </div>
                <div class="panel-body">
						              	            <div class="row">
	            		<div class="col-md-12">
	            		      {{ Form::labelText([
	            		      		'emp_name'=>$data->name,
	            		      		'emp_code'=>$data->emp_id,
	            		      		'department'=>$data->department_name,
	            		      		'designation'=>$data->designation_name,
	            		      		'date_of_joining'=>$data->date_of_joining,
	            		      		'date_of_leaving'=>$data->date_of_leaving,
	            		      ],'employee')}}
	            		
	            		</div>
	            		
	            		
	            	</div>

	

                </div>
                
           
              </div>

            </div>
          </div>
        </div>
      </div>
      
       <!-- /.box -->
             <div class="ibox float-e-margins">
        <div class="ibox-content">
            <div class="box-header">
              <h3 class="box-title">Expenses</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
 					<a href="{{url('/emp_expense/add/'.$data->id)}}" class="btn btn-danger">Add Expenses</a>
                 </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover datatable">
              	<thead>
              		<tr>
              			<th>Salary</th>
              			<th>Effective Date</th>
              			<th></th>
              		</tr>
              		</thead>
              		<tbody>
              		@if(isset($emp_salary))
              		@foreach($emp_salary as $user)
              			<tr>
              				<td>{{$emp_salary->salary}}</td>
              				<td>{{$user->effective_date}}</td>
              				<td>
              						 @if($company_role->role_name=='Owner')                  										
					            	 <a class="btn btn-xs btn-info" href="http://localhost/asp_new/public/roles/edit/1">
																<i class="ace-icon fa fa-pencil bigger-120"></i>
															</a>
															<a class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to delete?')" href="http://localhost/asp_new/public/roles/delete/1">
																<i class="ace-icon fa fa-trash-o bigger-120"></i>
															</a>
					            	   @endif
					 
              				</td>
              			</tr>
              		@endforeach
              		@endif
              		</tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      </div>  
      
          <div class="ibox float-e-margins">
        <div class="ibox-content">
            <div class="box-header">
              <h3 class="box-title">Salary</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
 					<a href="{{url('/salary/add/'.$data->id)}}" class="btn btn-danger">Add Salary</a>
                 </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover datatable">
              	<thead>
              		<tr>
              			<th>Salary</th>
              			<th>Effective date</th>
              			<th></th>
              		</tr>
              		</thead>
              		<tbody>
              		@if(isset($all_user))
              		@foreach($all_user as $user)
              			<tr>
              				<td>{{$user->name}}</td>
              				<td>{{$user->email}}</td>
              				<td>{{$user->role_name}}</td>
              				<td>
              						 @if($company_role->role_name=='Owner')                  										
					            	 <a class="btn btn-xs btn-info" href="http://localhost/asp_new/public/roles/edit/1">
																<i class="ace-icon fa fa-pencil bigger-120"></i>
															</a>
															<a class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to delete?')" href="http://localhost/asp_new/public/roles/delete/1">
																<i class="ace-icon fa fa-trash-o bigger-120"></i>
															</a>
					            	   @endif
					 
              				</td>
              			</tr>
              		@endforeach
              		@endif
              		</tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      </div>    
      
      
    </div>
  </div>


</div>





@endsection



@section('boot_css')
<link rel="stylesheet" href="{{url('js/plugins/DataTables/datatables.min.css')}}">
@endsection
@section('boot_js')
    <script src="{{url('js/plugins/DataTables/datatables.min.js')}}"></script>

@endsection
@section('js')
<script>
$.noConflict();
$(".datatable").DataTable();
</script>
 @endsection