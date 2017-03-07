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
<div class="wrapper wrapper-content animated fadeIn ng-scope">
<div class="row">
<div class="col-md-12">
<div class="ibox float-e-margins">
<div class="ibox-content">
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Rates</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
 					<a href="{{url('currency/add-rate/'.$currency_list->id)}}" class="btn btn-danger">Add Rates</a>
                 </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             	<table class="table datatable">
             			<thead>
             					<tr>
             						<th>Rate</th>
             						<th>Effective Date</th>
             						<th>Action</th>
             					</tr>
             			</thead>
             			<tbody>
             					@foreach($currency_rate as $arr)
             					<tr>
             						<td>{{$arr->rate}}</td>
             						<td>{{$arr->effective_date}}</td>
             						 <td>						
						                  					     
						
							<button class="btn btn-xs btn-danger" onclick="if(confirm('Are you sure you want to delete?'))  $(this).closest('td').find('form').submit(); " >
								<i class="ace-icon fa fa-trash-o bigger-120"></i>
							</button>
							{{ Form::open(array('url' => 'delete','method'=>'delete')) }}
							 {{ Form::inputHidden('record','record',((isset($arr->id))?$arr->id:''),'',['placeholder'=>'Role Name']) }}
							 {{ Form::inputHidden('module','module','currencyrates','',['placeholder'=>'Role Name']) }}
							 {{ Form::inputHidden('redir','redir','currency/detail/'.$currency_list->id,'',['placeholder'=>'Role Name']) }}
							 {{ Form::close() }}
						                  </td>
             					</tr>
             					@endforeach
             			
             			</tbody>
             	</table>
            </div>
            <!-- /.box-body -->
          </div>
</div></div></div></div>
</div>

@endsection