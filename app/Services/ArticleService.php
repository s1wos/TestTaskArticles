<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Comment;

class ArticleService
{
    public function getRecentArticles($limit = 6)
    {
        return Article::latest()->take($limit)->get();
    }

    public function getPaginatedArticles($perPage = 10)
    {
        return Article::latest()->paginate($perPage);
    }

    public function incrementLikes(Article $article): int
    {
        $article->increment('likes');
        return $article->likes;
    }

    public function incrementViews(Article $article): int
    {
        $article->increment('views');
        return $article->views;
    }

    public function addCommentAsync(Article $article, array $data)
    {
        dispatch(function () use ($article, $data) {
            sleep(600);
            Comment::create([
                'article_id' => $article->id,
                'subject' => $data['subject'],
                'body' => $data['body'],
            ]);
        });
    }
}
