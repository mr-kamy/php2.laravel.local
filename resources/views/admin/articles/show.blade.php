@extends('admin.main')
@section('content')
    <table>
        <tr>
            <td>id</td>
            <td>Название</td>
            <td>Текст</td>
            <td>Действие</td>
            <td>Действие</td>
        </tr>
            <tr>
                <td>{{$article->id}}</td>
                <td>{{$article->title}}</td>
                <td>{{$article->body}}</td>
                <td><a href="{{action('ArticlesController@edit', ['articles' => $article->id])}}">Изменить</a></td>
                <td><a href="{{action('ArticlesController@edit', ['articles' => $article->id])}}">Изменить</a></td>
            </tr>
    </table>
@endsection