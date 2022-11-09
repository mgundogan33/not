@extends('blog.front.layout.app')
@section('content')
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
                                <textarea class="form-control" rows="3" name="desc"></textarea>
                                <span class="text-danger error-text message_error"></span>
                            </div>
                            <div class="mb-3">
                                {{-- recaptcha baslangıc --}}
                                <form action="{{ route('sendMail') }}" method="POST">
                                    @csrf
                                    <div class="g-recaptcha" data-sitekey="6LcrW9YiAAAAAA-kV7mVktSqJV5K9xMbOKGp9Tah"></div>
                                    <br />
                                </form>
                                {{-- recaptcha bitiş --}}
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
@endsection
