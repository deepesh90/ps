<div class="form-group">
 {{ Form::label($label, null,[]) }}
@if(isset($values) && is_array($values))
	@foreach($values as $key=>$val)
	 <div class="checkbox">
                    <label>
                    <?php $selected_value=false;
                   
                    	if(isset($value) && in_array($key,$value)){
                    		$selected_value=true;
                    	}
                    ?>
                     {{Form::checkbox($name.'[]', $key,$selected_value)}}
                      {{$val}}
                    </label>
                  </div>
	
	@endforeach
@elseif(isset($values))	
 <div class="radio">
                    <label>
                    
                     {{Form::checkbox($name, $key,$value)}}
                      {{$val}}
                    </label>
                  </div>
@endif
</div>
