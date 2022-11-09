@extends('blog.front.layout.app')
@section('content')
    <div class="about_section layout_padding">
        <div class="container">
            <h1 class="most_text">Yazılar</h1>
            <div class="row">
                @foreach ($post as $item)
                    <div class="col-md-6" style="padding:20px;">
                        <h2 style="padding:20px;">{{ $item->title }}</h2>

                        <div style="padding:20px;" class="like_icon"><img style=" height: 150px;
                            width: 50%;"
                                src="{{ asset('images/' . $item->image->url) }}"></div><br>
                        <strong class=" text-center">{!! $item->content !!}</strong>

                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
