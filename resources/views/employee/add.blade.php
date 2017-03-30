@extends('layouts.app')

<?php $link='employee'?>
@section('content')
<div class="row wrapper border-bottom white-bg page-heading ng-scope">
  <div class="col-lg-10">
    <h2>Employees</h2>
  </div>
</div>


<div class="wrapper wrapper-content animated fadeIn ng-scope" ng-init="init()">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>New Employees</h5>
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

        
                     {{ Form::open(array('url' => 'employee/save','method'=>'post')) }}
                     {{ Form::inputHidden('record','record',((isset($result->id))?$result->id:''),'',['placeholder'=>'Role Name']) }}
                     {{ Form::inputText('name','Name',((isset($result->name))?$result->name:''),'',['placeholder'=>'Employee Name',"data-validation"=>"length","data-validation-length"=>"3-50"]) }} 
                     {{ Form::inputText('emp_id','Employee Code',((isset($result->name))?$result->name:''),'',['placeholder'=>'Employee Code',"data-validation"=>"length","data-validation-length"=>"3-50"]) }}
                  	 {{ Form::inputSelect('department_id','Department',$department_arr,((isset($result->department_id))?$result->department_id:''),'') }}
                     {{ Form::inputSelect('designation','Designation',$designation_arr,((isset($result->designation))?$result->designation:''),'') }}
                     {{ Form::inputText('date_of_joining','Date of Joinng',((isset($result->date_of_joining))?$result->date_of_joining:''),'',['placeholder'=>'','class'=>'form-control datepicker',"data-validation"=>"date","data-validation-length"=>"3-50"]) }}
                  	 {{ Form::inputText('date_of_leaving','Date of Leaving',((isset($result->date_of_leaving))?$result->date_of_leaving:''),'',['placeholder'=>'','class'=>'form-control datepicker',"data-validation"=>"date","data-validation-length"=>"3-50"]) }}
                  	 
                     {{ Form::inputSelect('status','Status',['Active'=>'Active','Inactive'=>'Inactive'],((isset($result->status))?$result->status:''),'') }}
                                                  				
           		 <button type="submit" class="btn btn-primary">Submit</button>
            {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>


</div>
@endsection