@extends('blog.front.layout.app')
@section('content')
    <div class="about_section layout_padding">

        <div class="container">
        <h1 class="most_text">Kategoriler</h1>

            <div class="row">
                @foreach ($category  as $item)
                    <div class="col-lg-6 col-sm-8">
                        <h2 class="">{{ $item->title }}</h2>

                        <div class="like_icon"><img style=" height: 170px;
                            width: 50%;"
                                src="{{ asset('images/' . $item->image->url) }}"></div>

                    </div>

                @endforeach

            </div>
        </div>
    </div>
@endsection
