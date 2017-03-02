<div class="form-group">
 {{ Form::label($label, null,[]) }}
 {{ Form::select($name, $values,$selected_value, array_merge(['class' => 'form-control'], $attributes)) }}
  <span class="error" id="{{$name}}_error">{{$error}}</span>
</div>