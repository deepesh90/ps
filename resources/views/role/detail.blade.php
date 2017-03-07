@extends('layouts.app')

<?php $link='role'?>
@section('content')
<div class="row wrapper border-bottom white-bg page-heading ng-scope">
  <div class="col-lg-10">
    <h2>Roles Detail</h2>
  </div>
   
</div>
<div class="wrapper wrapper-content animated fadeIn ng-scope" ng-init="init()">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        
        <div class="ibox-content">
          <div class="row" ng-show="hasData" aria-hidden="false" style="">
            <div class="col-sm-12">
								<a href="{{url('roles/edit/'.$detail->id)}}" class="btn btn-info">Edit</a>
								<a href="{{url('roles/clone/'.$detail->id)}}" class="btn btn-info">Clone</a>
						</div>
						<dl class="dl-horizontal">
               			 <dt>Role Name</dt>
                			<dd>{{$detail->role_name}}</dd>
              			</dl> 
              			<div class="table-responsive">
					  <table class="table table-bordered">
					  	<tr>
					  		<th rowspan="2" width="20%">Name</th>
					  		<th colspan="6">Action</th>
					  	</tr>
					  	<tr>
					  		<th>View</th>
					  		<th>Edit</th>
					  		<th>Delete</th>
					  		<th>Detail</th>

					  	</tr>
					  					    <?php $permission=json_decode($detail->permission,true);
              		$per_arr=[''=>'None','99'=>'Own Data','100'=>'All Data']
              ?>	
					  	@if(isset($data['role_array']))
					  		@foreach($data['role_array'] as $r_id=>$r_arr)
					  		
					  										<tr>
													  			<th colspan="7">	@if(isset($data['group_array'][$r_id])) 
													  						{{$data['group_array'][$r_id]}}
													  					@endif
													  					</th>
													  	
													  		</tr>	
					  								  		@foreach($r_arr as $role_key=>$role_val)
													  		<tr>
														  		<td >{{$role_val}}</td>
														  		<td>
														  			@if(isset($permission['permission'][$role_key.'_view']))
														  				{{$per_arr[$permission['permission'][$role_key.'_view']]}}
														  			@else
														  			@endif
														  		</td>
														  		<td>
														  			@if(isset($permission['permission'][$role_key.'_edit']))
														  				{{$per_arr[$permission['permission'][$role_key.'_edit']]}}
														  			@else
														  			@endif
														  		</td>
														  		<td>
														  			@if(isset($permission['permission'][$role_key.'_delete']))
														  				{{$per_arr[$permission['permission'][$role_key.'_delete']]}}
														  			@else
														  			@endif
														  		</td>
														  		<td>
														  			@if(isset($permission['permission'][$role_key.'_detail']))
														  				{{$per_arr[$permission['permission'][$role_key.'_detail']]}}
														  			@else
														  			@endif
														  		</td>
														  		
													  		</tr>
					  										@endforeach
					  				@endforeach
						@endif
					  </table>
					</div>
			
          </div>
        </div>
      </div>
    </div>
  </div>


</div>
@endsection