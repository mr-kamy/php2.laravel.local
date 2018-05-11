<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function index()
    {
        $articles = Article::all();
        return view('admin.articles.articles', ['articles' => $articles]);
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function show(Article $article)
    {
        return view('admin.articles.show', ['article' => $article]);
    }

    public function store(Request $request)
    {

        request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);


        Article::create($request->all());

        return back()->with('message', 'Статья добавлена');

    }

    public function edit(Article $article)
    {
        $id = $article->id;
        $article = Article::find($id);
        return view('admin.articles.edit', ['article' => $article]);
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return back()->with('message', 'Статья удалена');
    }
}
