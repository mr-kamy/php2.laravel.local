@extends('admin.main')
@section('content')
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (Session::get('message'))
        <div class="alert alert-success">
            <ul>
                <li>{{Session::get('message')}}</li>
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-10">
            <a href="{{url('admin/articles')}}"> <h2>Админ панель</h2></a>
        </div>
        <div class="col-md-2">
            <a class="btn btn-success" href="{{action('ArticlesController@create')}}">Добавить</a>
        </div>
    </div>
    <form method="post" action="{{action('ArticlesController@store')}}">
        @csrf
        Название статьи:<br>
        <input type="text" class="form-control" placeholder="Заголовок" name="title"><br>
        Текст статьи:<br>
        <textarea class="form-control" style="height: 150px" name="body"></textarea><br>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection