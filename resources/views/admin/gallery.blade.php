@extends('admin.main')
@section('pageTitle', 'Галерея')
@section('content')
<div class="container">
    <form action="{{url('admin/gallery')}}" method="post" enctype="multipart/form-data" class="form-upload">
        {!! csrf_field() !!}

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
            <div class="col-md-5">
                <input type="text" class="form-control" name="title" placeholder="Введите название" required>
            </div>
            <div class="col-md-5">
                <div class="custom-file">
                    <input type="file" class="form-control" name="image">

                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-success">Отправить</button>
            </div>
        </div>
    </form>

    <div class="container gallery">
        <div class="row">
            @if($images->count())
                @foreach($images as $image)

                    <div class="col-lg-4 col-md-4 col-6">
                        <a data-fancybox="gallery" href="/images/{{$image->image}}">
                            <img class="img-fluid" src="/images/{{$image->image}}" alt="{{$image->title}}">
                            <div class="text-center">
                                <small class="text-muted">{{$image->title}}</small>
                            </div>
                        </a>
                        <form action="{{url('admin/gallery', $image->id)}}" method="post">
                            <input type="hidden" name="_method" value="delete"/>
                            @csrf
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </div>

                @endforeach
        </div>
        <div class="row">
            <div class="text-align">
                {{$images->links()}}
            </div>
        </div>
        @endif

    </div>
</div>
@endsection
