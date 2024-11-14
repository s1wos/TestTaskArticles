@extends('layout')

@section('title', $article->title)

@section('content')
    <div class="container mt-4" data-article-slug="{{ $article->slug }}">
        <h1>{{ $article->title }}</h1>
        <p>Теги:
            @foreach($article->tags as $tag)
                <span class="badge bg-secondary">{{ $tag->name }}</span>
            @endforeach
        </p>
        <img src="https://via.placeholder.com/600x200" alt="Article Image" class="img-fluid mb-4">
        <p>{{ $article->body }}</p>

        <!-- Блок с лайками и просмотрами -->
        <div class="d-flex align-items-center mt-4">
            <button type="button" id="like-button" class="btn btn-primary d-flex align-items-center">
                <i class="bi bi-heart-fill me-2"></i>
                <span id="likes-count">{{ $article->likes }}</span>
            </button>
            <p class="mb-0">Просмотры: <span id="views-count">{{ $article->views }}</span></p>
        </div>
    </div>

    <!-- Форма для отправки комментария -->
    <div class="mt-5">
        <h4>Добавить комментарий</h4>
        <form id="comment-form" method="POST" action="{{ route('articles.comment', $article->slug) }}">
            @csrf
            <div class="mb-3">
                <label for="subject" class="form-label">Тема сообщения</label>
                <input type="text" class="form-control" id="subject" name="subject" required>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Текст сообщения</label>
                <textarea class="form-control" id="body" name="body" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Отправить</button>
        </form>
        <p id="comment-success" class="text-success mt-3" style="display: none;">Ваше сообщение успешно отправлено.</p>
    </div>


    <!-- Передача slug статьи в JavaScript -->
    <script>
        let articleId = {{ $article->id }};
    </script>
@endsection
