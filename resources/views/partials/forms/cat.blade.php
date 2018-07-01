<div class="form-group">
	<!-- {!! Form::label('name', 'Name') !!} -->
	<div class="form-controls">
		<input type="text" class="form-control" name="name" value="{{old('name',isset($cat)? $cat->name:'value default')}}">
	</div>
</div>
<div class="form-group">
	{!! Form::label('date_of_birth', 'Date of Birth') !!}
	<div class="form-controls">
		{!! Form::text('date_of_birth', null, ['class' => 'form-controls datepicker']) !!}
	</div>
</div>
<div class="form-group">
	{!! Form::label('breed_id', 'Breed') !!}
	<div class="form-controls">
		<select name="breed_id" class="form-control">
		    @foreach($breeds as $breed_id => $breed_name)
		        <option value="{{$breed_id}}"
		        @if(old('breed_id', isset($cat) ? $cat->breed_id : '') == $breed_id)
		            selected="selected"
		        @endif
		        >{{$breed_name}}
		    	</option>
	        @endforeach
    </select>
		<!-- {!! Form::select('breed_id', $breeds, isset($cat)?$cat->breed_id:null, ['class' => 'form-control ']) !!} -->
	</div>
</div>
{!! Form::submit('Save Cat', ['class' => 'btn btn-primary']) !!}