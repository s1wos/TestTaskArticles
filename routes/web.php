<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ArticleController::class, 'index'])->name('home');
Route::get('/articles', [ArticleController::class, 'indexCatalog'])->name('articles.index');
Route::get('/articles/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');

Route::post('/articles/{article:slug}/like', [ArticleController::class, 'like'])->name('articles.like');
Route::post('/articles/{article:slug}/view', [ArticleController::class, 'view'])->name('articles.view');
Route::post('/articles/{article:slug}/comment', [CommentController::class, 'store'])->name('articles.comment');
