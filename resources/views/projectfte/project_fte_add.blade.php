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
          <h5>Add FTE</h5>
        </div>
        <div class="ibox-content">
          <div class="row" ng-show="hasData" aria-hidden="false" style="">
            <div class="col-md-12">
              <div class="panel panel-primary">
                <div class="panel-heading">
                </div>
                 {{ Form::open(array('url' => 'user-type/saveRole','method'=>'post')) }}
                   {{ Form::inputHidden('record','',isset($result['id']) ? $result['id'] :'')}}
                
                <div class="panel-body">
                <div class="row">
                	<div class="col-md-12">
                	   {{ Form::inputText('project_name','Project Name',isset($result['project_name']) ? $result['project_name'] :'','',['required'=>'true'])}}
                	
                	</div>
                </div>
                  <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th width="150">ID</th>
                    <th width="150">Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>% </th>
                    <th width="150">Where</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>% </th>
                    <th width="150">Where</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><a href="#">EMP1234RT</a></td>
                    <td>Ram </td>
                    <td><input type="date" class="form-control date-field" value=""></td>
                    <td><input type="date" class="form-control date-field" value=""></td>
                    <td>50%</td>
                    <td>
                      <select class="form-control slecet-field">
                        <option>Offshore</option>
                        <option>Onsite-Biz</option>
                        <option>Onsite-WP</option>
                      </select>
                    </td>
                    <td><input type="date" class="form-control date-field" value=""></td>
                    <td><input type="date" class="form-control date-field" value=""></td>
                    <td>50%</td>
                    <td>
                      <select class="form-control slecet-field">
                        <option>Offshore</option>
                        <option>Onsite-Biz</option>
                        <option>Onsite-WP</option>
                      </select>
                    </td>
                  </tr>

                  <tr>
                    <td><a href="#">EMP1234RT</a></td>
                    <td>Ram </td>
                    <td><input type="date" class="form-control date-field" value=""></td>
                    <td><input type="date" class="form-control date-field" value=""></td>
                    <td>50%</td>
                    <td>
                      <select class="form-control slecet-field">
                        <option>Offshore</option>
                        <option>Onsite-Biz</option>
                        <option>Onsite-WP</option>
                      </select>
                    </td>
                    <td><input type="date" class="form-control date-field" value=""></td>
                    <td><input type="date" class="form-control date-field" value=""></td>
                    <td>50%</td>
                    <td>
                      <select class="form-control slecet-field">
                        <option>Offshore</option>
                        <option>Onsite-Biz</option>
                        <option>Onsite-WP</option>
                      </select>
                    </td>
                  </tr>

                  <tr>
                    <td><a href="#">EMP1234RT</a></td>
                    <td>Ram </td>
                    <td><input type="date" class="form-control date-field" value=""></td>
                    <td><input type="date" class="form-control date-field" value=""></td>
                    <td>50%</td>
                    <td>
                      <select class="form-control slecet-field">
                        <option>Offshore</option>
                        <option>Onsite-Biz</option>
                        <option>Onsite-WP</option>
                      </select>
                    </td>
                    <td><input type="date" class="form-control date-field" value=""></td>
                    <td><input type="date" class="form-control date-field" value=""></td>
                    <td>50%</td>
                    <td>
                      <select class="form-control slecet-field">
                        <option>Offshore</option>
                        <option>Onsite-Biz</option>
                        <option>Onsite-WP</option>
                      </select>
                    </td>
                  </tr>

                </tbody>
              </table>
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
