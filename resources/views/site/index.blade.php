@extends('site.main')

@section('pageTitle', 'Главная')

@section('content')
    @foreach($articles as $article)

        <h1>{{$article->title}}</h1>
        <p>{{$article->body}}</p>

    @endforeach

    {{$articles->links()}}
@endsection
