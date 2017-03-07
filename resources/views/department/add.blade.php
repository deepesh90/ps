@extends('layouts.app')
<?php $link='department'?>



@section('content')
<div class="row wrapper border-bottom white-bg page-heading ng-scope">
  <div class="col-lg-10">
    <h2>Department</h2>
  </div>
</div>


<div class="wrapper wrapper-content animated fadeIn ng-scope" ng-init="init()">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>New Department</h5>
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
               {{ Form::open(array('url' => 'department/save','method'=>'post')) }}
                     {{ Form::inputHidden('record','record',((isset($result->id))?$result->id:''),'',[]) }}
                     {{ Form::inputText('department_name','Department Name',((isset($result->department_name))?$result->department_name:''),'',['placeholder'=>'Department name',"data-validation"=>"length","data-validation-length"=>"3-50"]) }} 
                     {{ Form::inputSelect('status','Status',['Active'=>'Active','Inactive'=>'Inactive'],((isset($result->status))?$result->status:''),'') }}
                     
           		 <button type="submit" class="btn btn-primary">Submit</button>
            {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>


</div>
@endsection