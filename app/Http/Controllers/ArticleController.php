<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleCommentRequest;
use App\Models\Article;
use App\Services\ArticleService;

class ArticleController extends Controller
{
    protected ArticleService $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    // Отображение главной страницы с последними 6 статьями
    public function index()
    {
        $articles = $this->articleService->getRecentArticles();
        return view('home', compact('articles'));
    }

    // Отображение каталога статей с пейджинацией
    public function indexCatalog()
    {
        $articles = $this->articleService->getPaginatedArticles();
        return view('articles.index', compact('articles'));
    }

    // Отображение страницы конкретной статьи
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    // Инкрементирование лайков
    public function like(Article $article)
    {
        $newLikesCount = $this->articleService->incrementLikes($article);
        return response()->json(['likes' => $newLikesCount]);
    }

    // Инкрементирование просмотров
    public function view(Article $article)
    {
        $newViewsCount = $this->articleService->incrementViews($article);
        return response()->json(['views' => $newViewsCount]);
    }

    // Добавление комментария
    public function comment(ArticleCommentRequest $request, Article $article)
    {
        $this->articleService->addCommentAsync($article, $request->validated());

        return response()->json(['message' => 'Успешно добавлено'], 201);
    }
}
