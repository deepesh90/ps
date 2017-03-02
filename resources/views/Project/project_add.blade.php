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
                 {{ Form::open(array('url' => 'user-type/saveRole','method'=>'post')) }}
                   {{ Form::inputHidden('record','',isset($result['id']) ? $result['id'] :'')}}
                
                <div class="panel-body">
                  <div class="row">

                    <div class="col-md-6">
                       {{ Form::inputText('project_name','Project Name',isset($result['project_name']) ? $result['project_name'] :'','',['required'=>'true'])}}
                    
                    </div>
                    <div class="col-md-6">
                       {{ Form::inputSelect('customer_id','Customer',$select_data,[2,3]) }}
                    
                      
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Start Date</label>
                          <input type="date" name="start_date" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>End Date</label>
                          <input type="date"  name="end_date"  class="form-control">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>PM</label>
                        <select class="form-control" name="pm">
                          <option>-----------</option>
                        </select>
                      </div>
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
