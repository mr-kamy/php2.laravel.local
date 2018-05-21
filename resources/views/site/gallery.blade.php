@extends('site.main')

@section('pageTitle', 'Галлерея')

@section('content')

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

@endsection
