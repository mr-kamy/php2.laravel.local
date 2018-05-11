@extends('admin.main')
@section('content')
    <form method="post" action="{{action('ArticlesController@update', ['article' => $article->id])}}">
        Название статьи:<br>
        <input type="text" name="title" value="{{$article->title}}"><br>
        Текст статьи:<br>
        <textarea name="body">{{$article->body}}</textarea><br>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <button>Сохранить</button>
    </form>
@endsection