@extends('admin.main')
@section('content')

    @if ($errors->any())
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif

    <form method="post" action="{{action('ArticlesController@store')}}">
        Название статьи:<br>
        <input type="text" name="title"><br>
        Текст статьи:<br>
        <textarea name="body"></textarea><br>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <button>Сохранить</button>
    </form>
@endsection