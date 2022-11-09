@extends('blog.front.layout.app')
@section('content')


    {{-- kategori --}}
    <div class="about_section layout_padding">
        <div class="container">
        <h1 class="most_text">Kategoriler</h1>

            <div class="row">
                @foreach ($category as $item)
                    <div class="col-lg-6 col-sm-8">
                        <a  href="{{ route('front_category',$item->id) }}" class="most_text">{{ $item->title }}</a>

                        <div class="like_icon"><img style=" height: 170px;
                            width: 50%;"
                                src="{{ asset('images/' . $item->image->url) }}"></div>

                    </div>
                @endforeach
                <div class="col-lg-4 col-sm-12">
                    
                </div>
            </div>
        </div>
    </div>
    {{-- kategori --}}

    {{-- Post --}}
    <div class="about_section layout_padding">
        <div class="container">
            <h1 class="most_text">Yazılar</h1>
            <div class="row">
                @foreach ($post as $item)
                    <div class="col-md-6" style="padding:20px;">
                        <a  href="{{ route('front_post',$item->id) }}" class="most_text">{{ $item->title }}</a>

                        {{-- <h2 style="padding:20px;">{{ $item->title }}</h2> --}}

                        <div style="padding:20px;" class="like_icon"><img style=" height: 150px;
                            width: 50%;"
                                src="{{ asset('images/' . $item->image->url) }}"></div><br>
                        <strong class=" text-center">{!! $item->content !!}</strong>

                    </div>
                @endforeach

            </div>
        </div>
    </div>
    {{-- Post --}}

    {{-- contact --}}
    <div class="contact_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <form action="{{ route('sendMail') }}" method="POST">
                        @csrf
                        <div class="contact-form">
                            <h1 class="contact_taital">Bize Ulaşın</h1>
                            <div class="mb-3">
                                <label for="" class="form-label">Ad</label>
                                <input type="text" class="form-control" placeholder="Ad Giriniz..." name="name">
                                <span class="text-danger error-text name_error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Soyad</label>
                                <input type="text" class="form-control" placeholder="Soyad Giriniz..." name="last_name">
                                <span class="text-danger error-text email_error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Ülke</label>
                                <input type="text" class="form-control" placeholder="Ülke Giriniz..." name="country">
                                <span class="text-danger error-text email_error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Yaş</label>
                                <input type="text" class="form-control" placeholder="Yaş Giriniz..." name="age">
                                <span class="text-danger error-text email_error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">İçerik</label>
                                <textarea class="form-control" rows="3"  name="desc"></textarea>
                                <span class="text-danger error-text message_error"></span>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary bg-website">Gönder</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- contact --}}
@endsection
