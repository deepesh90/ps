@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading ng-scope">
  <div class="col-lg-10">
    <h2>Expenses</h2>
  </div>
</div>

<div class="wrapper wrapper-content animated fadeIn ng-scope" ng-init="init()">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Expenses</h5>
        </div>
        <div class="ibox-content">
          <div class="row"  aria-hidden="false" style="">
            <div class="col-md-12">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  Import
                </div>
                 {{ Form::open(array('url' => 'import/save','method'=>'post','id'=>'editview',"enctype"=> "multipart/form-data")) }}
                   {{ Form::inputHidden('module','','Expenses')}}
                
                <div class="panel-body">
					<input type="file" name="import_file">

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
  