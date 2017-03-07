@extends('layouts.app')
<?php $link='currency'?>



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
          <h5>New Currency</h5>
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
               {{ Form::open(array('url' => 'currency/save','method'=>'post')) }}
                     {{ Form::inputHidden('record','record',((isset($result->id))?$result->id:''),'',['placeholder'=>'Role Name']) }}
                     {{ Form::inputText('currency_name','Currency Name',((isset($result->currency_name))?$result->currency_name:''),'',['placeholder'=>'Currency name',"data-validation"=>"length","data-validation-length"=>"3-50"]) }} 
                     {{ Form::inputText('currency_code','Currency Code',((isset($result->currency_code))?$result->currency_code:''),'',['placeholder'=>'Currency Code',"data-validation"=>"length","data-validation-length"=>"3"]) }}
                     {{ Form::inputText('currency_symbol','Currency Symbol',((isset($result->currency_symbol))?$result->currency_symbol:''),'',['placeholder'=>'Currency Symbol',"data-validation"=>"length","data-validation-length"=>"1-3"]) }}
                     {{ Form::inputSelect('is_default','is Default?',['0'=>'No','1'=>'Yes'],((isset($result->is_default))?$result->is_default:''),'') }}
                     {{ Form::inputSelect('status','Status',['Active'=>'Active','Inactive'=>'Inactive'],((isset($result->status))?$result->status:''),'') }}
                     
           		 <button type="submit" class="btn btn-primary">Submit</button>
            {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>


</div>
@endsection