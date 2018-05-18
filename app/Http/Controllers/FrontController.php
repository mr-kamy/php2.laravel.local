<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('site.index', ['articles' => $articles]);
    }
}
