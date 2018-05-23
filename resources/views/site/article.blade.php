@extends('site.main')

@section('pageTitle', $article->title)

@section('content')

        <h1>{{$article->title}}</h1>
        <p>{{$article->body}}</p>

@endsection
