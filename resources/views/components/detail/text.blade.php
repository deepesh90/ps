<table class="table table-bordered ">
                    <tbody>
                    
                    @foreach($data as $key => $arr)
                    	<tr>
	                        <td class=" gray_bg">
	                        {{__($alias.'.'.$key)}}
	                        </td>
	                        <td class="">
	                        {{$arr}}
	                        </td>
                     	 </tr>
                    	@endforeach 	 
</tbody></table>