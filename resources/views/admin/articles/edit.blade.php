@extends('admin.main')
@section('content')
    <form method="post" action="{{action('ArticlesController@update', $article->id)}}">
        @csrf
        @method('PUT')
        Название статьи:<br>
        <input type="text" name="title" value="{{$article->title}}"><br>
        Текст статьи:<br>
        <textarea name="body">{{$article->body}}</textarea><br>
        <button>Сохранить</button>
    </form>
@endsection