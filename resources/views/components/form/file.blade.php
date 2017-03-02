 <div class="form-group" id="{{$name}}_div">
 {{ Form::label($label, null,[]) }}
 {{ Form::file($name, array_merge(['class' => '','id'=>$name], $attributes)) }}
 <span class="error" id="{{$name}}_error">{{$error}}</span>
</div>