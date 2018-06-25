@extends('layouts.master')
@section('header')
	@if(isset($bread))
		<a href="{{route('cats.index')}}">Back to the overview</a>
	@endif
<h2>
	All @if(isset($bread)){{$bread->name}} @endif Cats
	<a href="{{route('cats.create')}}" class="btm btn-primary pull-right">Add a new cat</a>
</h2>
@stop
@section('content')
	@foreach($cats as $cat)
	<div class="cat">
		<a href="{{route('cats.show',$cat['id'])}}">
			<strong>{{$cat['name']}}</strong>-{{$cat->breed->name}}
		</a>
	</div>
	@endforeach
@stop