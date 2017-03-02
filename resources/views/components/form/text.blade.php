 <div class="form-group" id="{{$name}}_div">
 {{ Form::label($label, null,[]) }}
 {{ Form::text($name, $value, array_merge(['class' => 'form-control','id'=>$name], $attributes)) }}
 <span class="error" id="{{$name}}_error">{{$error}}</span>
</div>