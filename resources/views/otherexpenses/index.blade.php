@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading ng-scope">
  <div class="col-lg-10">
    <h2>User Type</h2>
  </div>
</div>

<div class="wrapper wrapper-content animated fadeIn ng-scope" >
  <div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Project Monthly Submission</h5>
        </div>
        <div class="ibox-content">
          <div class="row flex-element center-both mb-20">
            <div class="top-table">
              <table class="table table-bordered ">
                <tbody>

                  <tr>
                    <td>
                    	<input type="text"  class="form-control project_name" name="project_name" value=""  placeholder="Enter Project Name">
        				<input type="hidden" id="project_id" name="project_id" value="" placeholder="Enter Project Name">
        			</td>
                    <td><select>
                    		<option>--Select Currency--</option>
                    		@foreach($currencys as $currency)
                    		<option value="{{$currency->id}}">{{$currency->currency_name}}</option>
                    		
                    		@endforeach
                    </select></td>
                    <td width="100">
                      	<input type="text" name="assign_date" value="<?php echo date('m/d/Y')?>" class="datepicker">
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            </div>

          <div class="row" ng-show="hasData" aria-hidden="false" style="">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th width="150"></th>
                    <th></th>
                    <th width="100"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td rowspan="2">Revenue</td>
                    <td>Billed</td>
                    <td><input type="text" name="name" class="form-control input-sm"></td>
                  </tr>

                  <tr>
                    <td>Unbilled</td>
                    <td><input type="text" name="name" class="form-control input-sm"></td>
                  </tr>
                  <tr>
                    <td>DPR</td>
                    <td>Travel</td>
                    <td><input type="text" name="name" class="form-control input-sm"></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>Software</td>
                    <td><input type="text" name="name" class="form-control input-sm"></td>

                  </tr>
                  <tr>
                    <td></td>
                    <td>Rewards, etc.</td>
                    <td><input type="text" name="name" class="form-control input-sm"></td>

                  </tr>

                  <tr>
                    <td></td>
                    <td>Subcontracting</td>
                    <td><input type="text" name="name" class="form-control input-sm"></td>

                  </tr>
                  <tr>
                    <td></td>
                    <td>Rental Machines</td>
                    <td><input type="text" name="name" class="form-control input-sm"></td>

                  </tr>
                  <tr>
                    <td></td>
                    <td>Hardware</td>
                    <td><input type="text" name="name" class="form-control input-sm"></td>

                  </tr>
                  <tr>
                    <td>KPI</td>
                    <td><input type="text" name="name" class="form-control input-sm"></td>
                    <td><input type="text" name="name" class="form-control input-sm"></td>

                  </tr>
                  <tr>
                    <td>Risks</td>
                    <td><input type="text" name="name" class="form-control input-sm"></td>
                    <td><input type="text" name="name" class="form-control input-sm"></td>

                  </tr>
                </tbody>
              </table>
            </div>
            <div class="well well-sm text-right">
              <button type="button" class="btn btn-primary" onclick="alert('Saved Successfully');location.reload()">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('boot_css')
 <link rel="stylesheet" href="{{url('js/jquery-ui.css')}}"> 
@endsection
@section('boot_js')
  <script src="{{url('js/jquery-ui.js')}}"></script>


@endsection
@section('js')
 <script>
 var i=1;
$( ".project_name" ).autocomplete({
    source: "{{url('ajax/search_project')}}",
    minLength: 2,
    select: function( event, ui ) {
        $(this).closest('tr').find('.project_id').val(ui.item.id).trigger("change");
    }
  });
$('.datepicker').datepicker({
	format: 'mm/dd/yyyy',
    }); 
  


 </script>
@endsection