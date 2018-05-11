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
        @foreach($articles as $article)
            <tr>
                <td>{{$article->id}}</td>
                <td>{{$article->title}}</td>
                <td>{{$article->body}}</td>
                <td><a href="{{action('ArticlesController@show', ['articles' => $article->id])}}">Показать</a></td>
                <td><a href="{{action('ArticlesController@edit', ['articles' => $article->id])}}">Изменить</a></td>
                <td><a href="{{action('ArticlesController@destroy', ['articles' => $article->id])}}">Удалить</a></td>
                <td>
                    <form method="POST" action="{{action('ArticlesController@destroy',['articles'=>$article->id])}}">
                        <input type="hidden" name="_method" value="delete"/>
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <button>Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection