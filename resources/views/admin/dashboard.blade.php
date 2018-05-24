@extends('admin.main')
@section('content')
    <h1>Админ-панель</h1>
    <h2>Статьи</h2>
    <ul>
        <li><a href="/admin/articles">Все статьи</a></li>
        <li><a href="/admin/articles/create">Добавить статью</a></li>
    </ul>
    <h2>Изображения</h2>
    <ul>
        <li><a href="/admin/gallery">Все изображения</a></li>
    </ul>
@endsection