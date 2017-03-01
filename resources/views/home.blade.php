@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading ng-scope">
  <div class="col-lg-10">
    <h2>Dashboard</h2>
  </div>
</div>

<div class="wrapper wrapper-content animated fadeIn ng-scope" ng-init="init()">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Add district</h5>
        </div>
        <div class="ibox-content">
          <div class="row center-block">
            <div class="col-md-9">
            	<img src="img/d1.png" class="img-responsive">
            </div>
             <div class="col-md-3">
             <img src="img/d2.png" class="img-responsive">
             </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>
@endsection
