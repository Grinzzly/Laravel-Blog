@extends('layouts.app')

@section('content')
	@include('errors.errors')
	{{ Form::model($article, ["method" => "put", "route" => ['article.update', 'article' => $article->slug]]) }}
		@include('article._form', ['btnText' => 'Обновить'])
	{{ Form::close() }}
@endsection