@extends('layouts.app')

@section('content')
    <h1>Новости</h1>
    <hr>
    @if(Auth::check())
        <a class="btn btn-info" href="{{ route('article.create') }}">Создать</a>
    @endif

    @forelse($articles as $article)
        <section>
            <h2>
                <a href="{{ route('article.show', ['article' => $article->slug]) }}">
                    {{ $article->title }}
                </a>
            </h2>
            <p>{{ $article->created_at }}</p>
            <p>{{ $article->short_description }}</p>
            <div>
                @foreach($article->tags as $tag)
                    <span class="label label-{{ collect(['danger', 'info', 'warning', 'primary', 'default'])->random() }}">{{ $tag->name }}</span>
                @endforeach
            </div>
        </section>
    @empty
        <p>Увы</p>
    @endforelse
    {{ $articles->render() }}
@endsection
