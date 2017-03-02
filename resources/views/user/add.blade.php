@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading ng-scope">
  <div class="col-lg-10">
    <h2>User Type</h2>
  </div>
    <div class="col-lg-2">
        <div class="pull-right"><a href="{{url('user-type/add')}}" class="btn btn-info">Add Customer</a></div>
    
  </div>
</div>

<div class="wrapper wrapper-content animated fadeIn ng-scope" ng-init="init()">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>New User Type</h5>
        </div>
        <div class="ibox-content">
                     {{ Form::open(array('url' => 'user-type/saveRole','method'=>'post')) }}
                                 {{ Form::inputHidden('record','',isset($result['id']) ? $result['id'] :'')}}
            				     {{ Form::inputText('name','User Type Name',isset($result['name']) ? $result['name'] :'','',['required'=>'true'])}}
                                 {{ Form::inputSelect('parent_id','Parent Role',$select_data,isset($result['parent_id']) ? $result['parent_id'] :'') }}
                                  <button type="submit" class="btn btn-primary">
                                    Save
                                </button>       
           			{{ Form::close() }}
        </div>
      </div>
    </div>
  </div>


</div>
@endsection
