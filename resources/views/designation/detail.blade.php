@extends('layouts.app')

<?php $link='currency'?>

@section('content')
<div class="row wrapper border-bottom white-bg page-heading ng-scope">
  <div class="col-lg-10">
    <h2>Currency Detail</h2>
  </div>
</div>
<div class="wrapper wrapper-content animated fadeIn ng-scope" ng-init="init()">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        
        <div class="ibox-content">
          <div class="row" ng-show="hasData" aria-hidden="false" style="">
            <div class="col-md-12">
              <div class="panel panel-primary">
              
                <div class="panel-heading">
                  Currency Entry
                </div>
                <div class="panel-body">
                <div class="row">
						<div class="col-sm-12">
								<a href="{{url('currency/edit/'.$currency_list->id)}}" class="btn btn-info">Edit</a>
								<button onclick="if (confirm('Are you sure you want to delete?'))  $(this).closest('div').find('form').submit();" class="btn btn-info">Delete</button>
								{{ Form::open(array('url' => 'delete','method'=>'delete')) }}
																					 {{ Form::inputHidden('record','record',((isset($currency_list->id))?$currency_list->id:''),'',['placeholder'=>'Role Name']) }}
																					 {{ Form::inputHidden('module','module','currencys','',['placeholder'=>'Role Name']) }}
																					 {{ Form::inputHidden('redir','redir','currency','currency',['placeholder'=>'Role Name']) }}
																					
																					 {{ Form::close() }}
						</div>
					</div>
							<table class="table table-bordered">
                       					<tr>
                       						<th>Currency name</th>
                       						<td>{{$currency_list->currency_name}}</td>
                       					</tr>
                       					<tr>
                       						<th>Currency Symbol</th>
                       						<td>{{$currency_list->currency_symbol}}</td>
                       					</tr>
                       					<tr>
                       						<th>Currency Code</th>
                       						<td>{{$currency_list->currency_code}}</td>
                       					</tr>
                       					<tr>
                       						<th>Is Default</th>
                       						<td>{{(($currency_list->is_default==1)?'Yes':'No')}}</td>
                       					</tr>
                       					<tr>
                       						<th>Status</th>
                       						<td>{{$currency_list->status}}</td>
                       					</tr>
                       					
                       			</table>
												

	

                </div>
                
            
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>
@endsection