<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class ArticlesController extends Controller
{

    public function index()
    {
        $articles = Article::paginate(5);
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

    public function update(Request $request, Article $article)
    {
        request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        $article->update($request->all());
        return back()->with('message', 'Успешно');

    }

    public function destroy(Article $article)
    {
        $article->delete();
        return back()->with('message', 'Статья удалена');
    }
}
