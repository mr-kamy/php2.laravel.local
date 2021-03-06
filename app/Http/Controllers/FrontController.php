<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(5);
        return view('site.index', ['articles' => $articles]);
    }

    public function show(Article $article)
    {
        return view('site.article', ['article' => $article]);
    }
}
