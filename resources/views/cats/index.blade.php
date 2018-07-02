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
	@include('partials.cat')
@stop