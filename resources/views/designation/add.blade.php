@extends('layouts.app')
<?php $link='designation'?>



@section('content')
<div class="row wrapper border-bottom white-bg page-heading ng-scope">
  <div class="col-lg-10">
    <h2>Designation</h2>
  </div>
</div>


<div class="wrapper wrapper-content animated fadeIn ng-scope" ng-init="init()">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>New Designation</h5>
        </div>
        <div class="ibox-content">
  @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
               {{ Form::open(array('url' => 'designation/save','method'=>'post')) }}
                     {{ Form::inputHidden('record','record',((isset($result->id))?$result->id:''),'',[]) }}
                     {{ Form::inputText('designation_name','Designation Name',((isset($result->designation_name))?$result->designation_name:''),'',['placeholder'=>'Designation name',"data-validation"=>"length","data-validation-length"=>"3-50"]) }} 
                     {{ Form::inputSelect('status','Status',['Active'=>'Active','Inactive'=>'Inactive'],((isset($result->status))?$result->status:''),'') }}
                     
           		 <button type="submit" class="btn btn-primary">Submit</button>
            {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>


</div>
@endsection