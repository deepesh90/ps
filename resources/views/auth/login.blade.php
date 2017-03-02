@extends('layouts.login')

@section('content')

<div class="login-main ng-scope" ng-init="init();">
    <div class="col-md-6 col-sm-6 hidden-xs image-block ">
            <div class="bgimage-caption text-center">
                  <h2 class="font-bold ng-binding"></h2>
                  <h3>If you do not have a login,</h3>
                  <p>please contact your system administrator who will help you create an account.</p>
                  <hr>
                  <p class="text-muted text-center">
                    <button class="btn btn-default btn-sm">Contact Mr. Administrator to get started!</button>
                  </p>
              </div>
          </div>

    <div class="col-md-6 col-sm-6">
      <div class="form-block">
        <div class="form-block-inner">
         <form class="m-t ng-valid-email ng-dirty ng-valid-parse ng-valid ng-valid-required" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
        
            <div class="login-block">
              <a href="index.html"><img height="60"  src="img/logo.svg" alt="P3" title="P3"></a>
              <h2 class="margin-bottom-30">Login To Your Account</h2>
                            
              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="input-group">
                  <span class="input-group-addon rounded-left"><i class="fa fa-user" aria-hidden="true"></i></span>
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                  
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                </div>
              </div>
              
              <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="input-group">
                  <span class="input-group-addon rounded-left"><i class="fa fa-lock" aria-hidden="true"></i></span>
               <input id="password" placeholder="Password" type="password" class="form-control" name="password" required>
        
                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
              	</div>
              </div>
              			<div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

               <button type="submit" class="btn btn-primary btn-block btn-lg m-b">
                                    Login
                                </button>
                      

                                <a class="" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>

              <p class="text-muted text-center">
                <small>Do not have an account?</small>
              </p>
              <div class="copyright-block text-center">
                        	<p>© Copyright 2016-2017 <a href="#">CustVantage</a>. All Rights Reserved.</p>
                        </div>
            </div>

          </form>
        </div>
      </div>
    </div>
</div>
@endsection
