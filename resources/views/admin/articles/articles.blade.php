@extends('admin.main')
@section('content')
    @if (Session::get('message'))
        <div class="alert alert-success">
            <ul>
                <li>{{Session::get('message')}}</li>
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-10">
            <h2>Админ панель</h2>
        </div>
        <div class="col-md-2">
            <a class="btn btn-success" href="{{action('ArticlesController@create')}}">Добавить</a>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <td>id</td>
            <td>Название</td>
            <td>Текст</td>
            <td width="300px">Действие</td>
        </tr>
        @foreach($articles as $article)
            <tr>
                <td>{{$article->id}}</td>
                <td>{{$article->title}}</td>
                <td>{{$article->body}}</td>
                <td>
                    <a class="btn btn-info" href="{{action('ArticlesController@show', ['articles' => $article->id])}}">Показать</a>
                    <a class="btn btn-primary"
                       href="{{action('ArticlesController@edit', ['articles' => $article->id])}}">Изменить</a>
                    <form method="POST" action="{{action('ArticlesController@destroy',['articles'=>$article->id])}}">
                        <input type="hidden" name="_method" value="delete"/>
                        @csrf
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection