<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::factory()->count(20)->create()->each(function ($article) {
            $tags = Tag::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $article->tags()->attach($tags);
        });
    }
}
