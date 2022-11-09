@extends('blog.front.layout.app')
@section('content')
    <div class="about_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    @foreach ($about as $about)
                        <div class="about_img"><img src="{{ asset('images/' . $about->image->url) }}"></div>
                        {{-- <div class="like_icon"><img src="images/like-icon.png"></div> --}}
                        <h2 class="most_text">{{ $about->title }} </h2>
                        <p class="lorem_text">{!! $about->desc !!}</p>
                        <div class="social_icon_main">
                    @endforeach

                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
