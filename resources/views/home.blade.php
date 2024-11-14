@extends('layout')
@section('title', 'Главная')

@section('content')
    <h1>Последние статьи</h1>
    <div class="row">
        @foreach($articles as $article)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Article Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ Str::limit($article->body, 100) }}</p>
                        <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-primary">Читать далее</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
