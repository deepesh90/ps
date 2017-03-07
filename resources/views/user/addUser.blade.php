@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading ng-scope">
  <div class="col-lg-10">
    <h2>User</h2>
  </div>
   <div class="col-lg-2">
        <div class="pull-right"><a href="{{url('customer/add')}}" class="btn btn-info">Add Customer</a></div>
    
  </div>
</div>

<div class="wrapper wrapper-content animated fadeIn ng-scope" ng-init="init()">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>New User</h5>
        </div>
        <div class="ibox-content">
                     <form class="form-horizontal" role="form" method="POST" action="{{ url('user/save') }}">
                        {{ csrf_field() }}
						<input type="hidden" value="{{$record or ''}}" name="record">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="">Name</label>

                                <input id="name" type="text" class="form-control" name="name" value="{{ $res->name or ''}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="">E-Mail Address</label>

                                <input id="email" type="email" class="form-control" name="email" value="{{ $res->email or ''}}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="">Password</label>

                                <input id="password" type="password" class="form-control" name="password" >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

          
                         {{ Form::inputSelect('userrole_id','User Role',$select_data,isset($res['userrole_id']) ? $res['userrole_id'] :'') }}
                        
                         {{ Form::inputSelect('status','Status',['Active'=>'Active','Inactive'=>'Inactive'],isset($res['status']) ? $res['status'] :'') }}
                        

                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                    </form>
        </div>
      </div>
    </div>
  </div>


</div>
@endsection
