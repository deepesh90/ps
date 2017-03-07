@extends('layouts.app')


<?php $link='role'?>

@section('content')
<div class="row wrapper border-bottom white-bg page-heading ng-scope">
  <div class="col-lg-10">
    <h2>Add Roles</h2>
  </div>
</div>


<div class="wrapper wrapper-content animated fadeIn ng-scope" ng-init="init()">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>New Role</h5>
        </div>
        <div class="ibox-content">
                     {{ Form::open(array('url' => 'roles/saveRole','method'=>'post')) }}
                 {{ Form::inputHidden('record','record',((isset($result->id))?$result->id:''),'',['placeholder'=>'Role Name']) }}
                
                 {{ Form::inputText('role_name','Role Name',((isset($result->role_name))?$result->role_name:''),'',['placeholder'=>'Role Name','data-validation'=>"alphanumeric" ]) }}
            					<div class="table-responsive">
					  <table class="table table-bordered">
					  	<tr>
					  		<th>Name</th>
					  		<th>Action</th>
					  	</tr>
					  	@php (($permission=array()))
						<?php if(isset($result->permission) && $result->permission!='')
						{
								$permission_arr=json_decode($result->permission,true);
								$permission=$permission_arr['permission'];
						}
	
							?>
					  	@if(isset($data['role_array']))
					  		@foreach($data['role_array'] as $r_id=>$r_arr)
					  										<tr>
													  			<th>	@if(isset($data['group_array'][$r_id])) 
													  						{{$data['group_array'][$r_id]}}
													  					@endif
													  					</th>
													  	
													  		</tr>	
					  								  		@foreach($r_arr as $role_key=>$role_val)
					  													
													  		<tr>
													  		<td width="20%">{{$role_val}}</td>
													  		<td>
													  				View: 	<select name="{{$role_key}}_view">
													  							<option value="" {{ isset($permission[$role_key.'_view']) && $permission[$role_key.'_view']=='' ? 'selected' : '' }}>None</option>
													  							<option value="99" {{ isset($permission[$role_key.'_view']) && $permission[$role_key.'_view']=='99' ? 'selected' : '' }}>Own Data</option>
													  							<option value="100" {{ isset($permission[$role_key.'_view']) && $permission[$role_key.'_view']=='100' ? 'selected' : '' }}>All Data</option>
													  						</select>
													  				Edit: 	<select name="{{$role_key}}_edit">
													  							<option value="" {{ isset($permission[$role_key.'_edit']) && $permission[$role_key.'_edit']=='' ? 'selected' : '' }}>None</option>
													  							<option value="99" {{ isset($permission[$role_key.'_edit']) && $permission[$role_key.'_edit']=='99' ? 'selected' : '' }}>Own Data</option>
													  							<option value="100" {{ isset($permission[$role_key.'_edit']) && $permission[$role_key.'_edit']=='100' ? 'selected' : '' }}>All Data</option>
													  						
													  						</select>
													  				Delete:  <select name="{{$role_key}}_delete">
													  							<option value="" {{ isset($permission[$role_key.'_delete']) && $permission[$role_key.'_delete']=='' ? 'selected' : '' }}>None</option>
													  							<option value="99" {{ isset($permission[$role_key.'_delete']) && $permission[$role_key.'_delete']=='99' ? 'selected' : '' }}>Own Data</option>
													  							<option value="100" {{ isset($permission[$role_key.'_delete']) && $permission[$role_key.'_delete']=='100' ? 'selected' : '' }}>All Data</option>
													  						</select>
													  				Detail: 	<select name="{{$role_key}}_detail">
													  							<option value="" {{ isset($permission[$role_key.'_detail']) && $permission[$role_key.'_detail']=='' ? 'selected' : '' }}>None</option>
													  							<option value="99" {{ isset($permission[$role_key.'_detail']) && $permission[$role_key.'_detail']=='99' ? 'selected' : '' }}>Own Data</option>
													  							<option value="100" {{ isset($permission[$role_key.'_detail']) && $permission[$role_key.'_detail']=='100' ? 'selected' : '' }}>All Data</option>
													  						</select>
													  			
													  				
													  			
													  		</td>
													  		</tr>
					  										@endforeach
					  				@endforeach
						@endif
					  </table>
					</div>
           		 <button type="submit" class="btn btn-primary">Submit</button>
            {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>


</div>
@endsection