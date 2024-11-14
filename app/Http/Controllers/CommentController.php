<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleCommentRequest;
use App\Models\Article;
use App\Services\ArticleService;

class CommentController extends Controller
{
    protected $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function store(ArticleCommentRequest $request, Article $article)
    {
        $this->articleService->addCommentAsync($article, $request->validated());

        return response()->json(['success' => true, 'message' => 'Комментарий добавлен'], 201);
    }
}
