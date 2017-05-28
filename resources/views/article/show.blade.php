@extends('layouts.app')

@section('content')
    <h1>{{ $article->title }}</h1>
    <p>{{ $article->body }}</p>
    @can('make-action-this-post', $article)
        <p>
            <a href="{{ route('article.edit', ['article' => $article->slug]) }}">Редактировать</a>
        </p>
    @endcan
    @unless($article->tags->isEmpty())
        @foreach($article->tags as $tag)
            <span class="label label-info">{{ $tag->name }}</span>
        @endforeach
    @endunless
@endsection
