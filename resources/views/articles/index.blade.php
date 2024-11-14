@extends('layout')

@section('title', 'Каталог статей')

@section('content')
    <h1>Каталог статей</h1>
    <div class="container mt-4">
        <div class="row">
            @foreach($articles as $article)
                <div class="col-md-12 mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/700x300" class="card-img-top" alt="Article Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ Str::limit($article->body, 100) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-primary">Читать далее</a>
                                <div class="d-flex align-items-center">
                                    <!-- Счетчик просмотров -->
                                    <span class="text-muted">
                                        <i class="bi bi-eye-fill"></i> {{ $article->views }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Пагинация -->
        <div class="d-flex justify-content-center mt-4">
            {{ $articles->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
