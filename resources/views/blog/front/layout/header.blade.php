<div class="header_section">
    <div class="container-fluid header_main">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="logo" href="index.html"><img src="images/logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Anasayfa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('front_about') }}">Hakkımda</a>
                    </li>
                 
                    <li class="nav-item dropdown">
                            <a class="nav-link" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                        Kategoriler
                                    </a>
                            <ul class="dropdown-menu" aria-labelledby="triggerId">
                               @foreach ( $cate as $item)
                               <li><a class="dropdown-item" href="{{ route('category.slug',$item) }}">{{ $item->title }}</a></li>  
                               @endforeach                            
                            </ul>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('front_post') }}">Yazılar</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('front_contact') }}">Bize Ulaşın</a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>

</div>
