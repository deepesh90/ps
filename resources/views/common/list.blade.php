@extends('layouts.blank')

@section('content')
<?php $vis_arr=[];
if($visible_field!='')
$vis_arr=explode(',', $visible_field);$i=0; ?>
{{ Form::open(array('url' => '','method'=>'get')) }}

@foreach($vis_arr as $val)
{{ Form::inputText("filter[$val]",$val,isset($filter[$val]) ? $filter[$val] :'','',[])}}
@php (($i++))	
@endforeach	
@foreach($filter as $key=>$val)
@if(!in_array($key,$vis_arr))
{{ Form::inputHidden("filter[$key]",$key,isset($filter[$key]) ? $filter[$key] :'','',[])}}
@endif
@endforeach	
@if($i>0)
<button class="btn  btn-primary" type="submit" ng-click="onSubmit();">
Search
</button>
@endif
{{ Form::close() }}
{{ $result->links() }}
<div class="table-responsve">
	<table class="table table-bordered">
	
	<thead>
		<tr>
				<td>#</td>
				@foreach($select as $arr)
				<td>@lang('ajax.'.$arr)
				</td>
				@endforeach
				
		</tr>
	</thead>
	<tbody>
		@foreach($result as $res)
			<tr>
				<td></td>
				@php (($i=0))
				@foreach($select as $arr)
				<td>
					@if($i==0)
					<a href="javascript:send_back('{{$res->id}}','{{$res->$arr}}')">{{$res->$arr}}</a>
					@else
					{{$res->$arr}}
					@endif
				   
				</td>
				@endforeach
			</tr>
		@endforeach
	
	</tbody>
	
	</table>
	
</div>
{{ $result->links() }}
@endsection
@section('js')
<script>
	function send_back($id,$name){
		var test=window.opener.document.getElementById('editview');	
		test.{{$map}}_id.value=$id;
		test.{{$map}}_name.value=$name;
		window.close();
	}
</script>
@endsection
