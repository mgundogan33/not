@extends('blog.front.layout.app')
@section('content')
    <div class="contact_section layout_padding">
        <div class="container">
            <div class="row">
                @foreach ($category->post as $item)
                    <div class="col-lg-4 col-sm-12">
                        <a href="{{ route('post_detay', $item) }}">
                            <div class="about_img">
                                <img src=" {{ asset('images/' . $item->image->url) }}">
                            </div>
                            <p class="post_text"></p>

                            <h2 class="most_text">{{ $item->title }}</h2>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
