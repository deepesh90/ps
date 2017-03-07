@extends('layouts.app')
<?php $link='currency'?>



@section('content')
<div class="row wrapper border-bottom white-bg page-heading ng-scope">
  <div class="col-lg-10">
    <h2>Add rate</h2>
  </div>
</div>


<div class="wrapper wrapper-content animated fadeIn ng-scope" ng-init="init()">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        
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
               {{ Form::open(array('url' => 'currency/save_rate','method'=>'post')) }}
                     {{ Form::inputHidden('currency_id','currency_id',$currency_id,'',['placeholder'=>'Role Name']) }}
                     {{ Form::inputText('rate','Rate (with respect to INR)',((isset($result->currency_name))?$result->currency_name:''),'',['placeholder'=>'0.00',"data-validation"=>"number", "data-validation-allowing"=>"float" ,"data-validation-decimal-separator" =>"."]) }} 
                     {{ Form::inputText('effective_date','Effective Date',((isset($result->currency_code))?$result->currency_code:''),'',['class'=>'datepicker form-control',"data-validation"=>"date","data-validation-format"=>"mm/dd/yyyy"]) }}
                     
           		 <button type="submit" class="btn btn-primary">Submit</button>
            {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>


</div>
@endsection