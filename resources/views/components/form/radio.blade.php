<div class="form-group">
 {{ Form::label($label, null,[]) }}
@if(isset($values) && is_array($values))
	@foreach($values as $key=>$val)
	 <div class="radio">
                    <label>
                    <?php $selected_value=false;
                   
                    	if(isset($value) && $key==$value){
                    		$selected_value=true;
                    	}
                    ?>
                     {{Form::radio($name, $key,$selected_value)}}
                      {{$val}}
                    </label>
                  </div>
	
	@endforeach
@elseif(isset($values))	
 <div class="radio">
                    <label>
                    
                     {{Form::radio($name, $key,$value)}}
                      {{$val}}
                    </label>
                  </div>
@endif
</div>
