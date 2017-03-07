@extends('layouts.app')


@section('content')
<section class="content">
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Employees Detail</h3>

              
            </div>
            <!-- /.box-header -->
              <?php $permission=json_decode($detail->permission,true);
              		$per_arr=[''=>'None','99'=>'Own Data','100'=>'All Data']
              ?>	
            <div class="box-body">
					<div class="row">
						<div class="col-sm-12">
								@if($show_edit_button)
								<a href="{{url('roles/edit/'.$detail->id)}}" class="btn btn-info">Edit</a>
								@endif
								@if($show_delete_button)
								<a href="{{url('roles/delete/'.$detail->id)}}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-info">Delete</a>
								@endif
								<a href="{{url('roles/clone/'.$detail->id)}}" class="btn btn-info">Clone</a>
						</div>
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
					  		<th>Clone</th>
					  		<th>Send GSTN</th>
					  	</tr>
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
														  		<td>
														  			@if(isset($permission['permission'][$role_key.'_clone']))
														  				{{$per_arr[$permission['permission'][$role_key.'_clone']]}}
														  			@else
														  			@endif
														  		</td>
														  		<td>
														  			@if(isset($permission['permission'][$role_key.'_send_gstn']))
														  				{{$per_arr[$permission['permission'][$role_key.'_send_gstn']]}}
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

            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
</section>
@endsection