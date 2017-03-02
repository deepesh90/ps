@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading ng-scope">
  <div class="col-lg-10">
    <h2>User Type</h2>
  </div>
</div>

<div class="wrapper wrapper-content animated fadeIn ng-scope" ng-init="init()">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Project</h5>
        </div>
        <div class="ibox-content">
          <div class="row" ng-show="hasData" aria-hidden="false" style="">
            <div class="col-md-12">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  Project Entry
                </div>
                 {{ Form::open(array('url' => 'customer/save','method'=>'post')) }}
                   {{ Form::inputHidden('record','',isset($result['id']) ? $result['id'] :'')}}
                
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-4">
                          {{ Form::inputText('customer_id','Customer ID',isset($result['customer_id']) ? $result['customer_id'] :'')}}
                      
                       
                    </div>
                    <div class="col-md-4">
                         {{ Form::inputText('customer_name','Customer Name',isset($result['customer_name']) ? $result['customer_name'] :'')}}
                      
                    </div>
                    <div class="col-md-4">
                         {{ Form::inputText('website','Website Name',isset($result['website']) ? $result['website'] :'')}}
                    
                      
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                        {{ Form::inputText('phone_no','Phone No.',isset($result['phone_no']) ? $result['phone_no'] :'')}}
                    
                      
                    </div>
                    <div class="col-md-4">
                       {{ Form::inputText('address_line_1','Address(Line 1).',isset($result['address_line_1']) ? $result['address_line_1'] :'')}}
                    
                     
                    </div>
                    <div class="col-md-4">
                         {{ Form::inputText('address_line_2','Address(Line 2).',isset($result['address_line_2']) ? $result['address_line_2'] :'')}}
                    
                     
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                    	  {{ Form::inputSelect('state_id','State',[''=>'--select--','1'=>'1','2'=>'2','3'=>'3'],[]) }}
                    
                      
                    </div>
                    <div class="col-md-4">
                           {{ Form::inputSelect('country','Country',[''=>'--select--','1'=>'1','2'=>'2','3'=>'3'],[]) }}
                    
                    
                    </div>
                    <div class="col-md-4">
                          {{ Form::inputText('zip_code','Zip Code',isset($result['zip_code']) ? $result['zip_code'] :'')}}
                    
                      
                    </div>
                  </div>

                  <div class="row">

                    <div class="col-md-4">
                            {{ Form::inputSelect('p3_contact_person','P3 Contact person',[''=>'--select--','1'=>'1','2'=>'2','3'=>'3'],[]) }}
                    
                      
                    </div>

                  </div>


                </div>
                <div class="panel-footer">
                  <div class="flex-element  align-bw">
                    <div class="footer-text">
                      <h5>Please review your changes before you save them. Changes once saved cannot be
                reverted.</h5>
                    </div>
                    <div class="save-btn">
                      <button class="btn  btn-primary" type="submit" ng-click="onSubmit();">
                          Save Changes
                      </button>
                    </div>
                  </div>
                </div>
                {{ Form::close() }}
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>





@endsection
