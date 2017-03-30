@extends('layouts.app')

<?php $link='employee'?>
@section('content')
<div class="row wrapper border-bottom white-bg page-heading ng-scope">
  <div class="col-lg-10">
    <h2>Employees Salary</h2>
  </div>
</div>


<div class="wrapper wrapper-content animated fadeIn ng-scope" ng-init="init()">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Employee Salary</h5>
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
                     {{ Form::inputHidden('emp_id','emp_id',((isset($result->emp_id))?$result->emp_id:''),'',['placeholder'=>'Role Name']) }}
                     {{ Form::inputHidden('record','record',((isset($result->id))?$result->id:''),'',['placeholder'=>'Role Name']) }}
                     {{ Form::inputText('salary_ctc','Annual CTC',((isset($result->salary_ctc))?$result->salary_ctc:''),'',['placeholder'=>'Annual CTC',"data-validation"=>"length","data-validation-length"=>"3-50"]) }} 
                  	 {{ Form::inputText('effective_date','Effective Date',((isset($result->effective_date))?$result->effective_date:''),'',['placeholder'=>'','class'=>'form-control datepicker',"data-validation"=>"date","data-validation-length"=>"3-50"]) }}
                  	 
                                                  				
           		 <button type="submit" class="btn btn-primary">Submit</button>
            {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>


</div>
@endsection