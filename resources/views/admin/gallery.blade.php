<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css"/>
    <title>Галерея</title>
    <style type="text/css">
        .form-upload {
            padding: 15px;
            background: #9fcdff;
        }

        .gallery {
            padding-top: 20px;
            background: #cce5ff;
        }
    </style>
</head>
<body>
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
            @endif
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
</body>
</html>