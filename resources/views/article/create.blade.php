@extends('layouts.app')

@section('content')
	@include('errors.errors')
	{{ Form::open(['files' => true]) }}
		@include('article._form')        
	{{ Form::close() }}
@endsection