@extends('blog.front.layout.app')
@section('content')
    <div class="contact_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <h2 class="most_text">{{ $post->title }}</h2>

                    <div href="{{ $post->slug }}">
                        <div class="about_img">
                            <img src=" {{ asset('images/' . $post->image->url) }}">
                        </div>
                        <strong>
                            <p class="post_text">{!! $post->content !!}</p>
                        </strong>
                    </div>
                    <div>
                        <label for="comment">Mesajınız</label>
                        <textarea name="coomment" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
