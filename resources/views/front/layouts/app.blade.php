<?php
$categories = \App\Models\Category::orderBy('created_at', 'desc')->take(10)->get();
$posts = \App\Models\Article::orderBy('created_at', 'desc')->take(4)->get()
?>
    <!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title') | Твоє авто</title>
    {{--    <meta content="Оновлення в автоіндустрії та власноручна майстерність на кожному кроці." name="description">--}}
    <meta content="@yield('description')" name="description">
    <meta content="Автомобільні новини,
     Поради вибору автомобіля,
     Технічні інновації в автоіндустрії,
     Ремонт та обслуговування автомобілів,
     Класичні автомобілі та їх історія,
     Світові тренди в автомобільній промисловості,
     Тюнінг та персоналізація авто, Автомобільна безпека та технології,
     Електричні та гібридні автомобілі,
     Подорожі на автомобілі: кращі маршрути та поради"
          name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/front/logoforblog.png') }}" rel="icon">
{{--    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">--}}

<!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">


    <!-- Template Main CSS Files -->
    <link href="{{ asset('assets/css/variables.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8175986939118814"
            crossorigin="anonymous"></script>
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="{{ route('home') }}" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1>Твоє авто</h1>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{ route('home') }}">Головна</a></li>
                {{--                <li><a href="single-post.html">Single Post</a></li>--}}
                <li class="dropdown"><a href="{{ route('categories.all') }}"><span>Категорії</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        @foreach($categories as $category)
                            <li><a href="{{ route('category.post', $category->id) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>

                {{--                <li><a href="about.html">Новини</a></li>--}}
                {{--                <li><a href="contact.html">Вибір авто</a></li>--}}
            </ul>
        </nav><!-- .navbar -->

        <div class="position-relative">
            {{--            <a href="#" class="mx-2"><span class="bi-facebook"></span></a>--}}
            {{--            <a href="#" class="mx-2"><span class="bi-twitter"></span></a>--}}
            {{--            <a href="#" class="mx-2"><span class="bi-instagram"></span></a>--}}

            <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
            @guest()
                @if (Route::has('login'))
{{--                    <a href="{{ route('login') }}" class="btn btn-sm btn-outline-dark ms-2">Логін</a>--}}
                    <button type="button" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Логін
                    </button>
                @endif
                @if (Route::has('register'))

                        <button type="button" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#register">
                            Реєстрація
                        </button>
{{--                    <a href="{{ route('register') }}" class="btn btn-sm btn-outline-dark">Реестрація</a>--}}
                @endif

            @endguest
            @auth()
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('writer'))
                <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-outline-dark">Admin Panel</a>
                @endif
                <a class="btn btn-sm btn-outline-dark ms-2" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();"
                >
                    Вийти
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endauth
            <i class="bi bi-list mobile-nav-toggle"></i>
            <!-- ======= Search Form ======= -->
            <div class="search-form-wrap js-search-form-wrap">
                <form action="search-result.html" class="search-form">
                    <span class="icon bi-search"></span>
                    <input type="text" placeholder="Нажаль пошук ще у розробці :(" class="form-control" readonly>
                    <button class="btn js-search-close"><span class="bi-x"></span></button>
                </form>
            </div>
            <!-- End Search Form -->

        </div>

    </div>

</header><!-- End Header -->

<main id="main">
    @yield('content')
    @include('auth.login-modal')
    @include('auth.register-modal')

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="footer-content">
        <div class="container">

            <div class="row g-5">
                <div class="col-lg-4">
                    <h3 class="footer-heading">Про нас</h3>
                    <p>
                        Ласкаво просимо на наш автоблог! Ми - команда ентузіастів, які захоплюються автомобільною
                        тематикою та намагаємося ділитися цікавою і корисною інформацією про світ автомобілів.
                    </p>
                    <p>Якщо у вас є питання або пропозиції, будь ласка, зв'яжіться з нами за допомогою
                        <a href="#" class="footer-link-more">форми зворотнього зв'язку</a>
                    </p>
                </div>
                <div class="col-6 col-lg-2">
                    <h3 class="footer-heading">Навігація</h3>
                    <ul class="footer-links list-unstyled">
                        <li><a href="{{ route('home') }}"><i class="bi bi-chevron-right"></i> Головна</a></li>
                        {{--                        <li><a href="index.html"><i class="bi bi-chevron-right"></i> Blog</a></li>--}}
                        <li><a href="{{ route('categories.all') }}"><i class="bi bi-chevron-right"></i> Категорії</a></li>
                        {{--                        <li><a href="single-post.html"><i class="bi bi-chevron-right"></i> Single Post</a></li>--}}
                        <li><a href="#"><i class="bi bi-chevron-right"></i> Про нас</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right"></i> Контакти</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2">
                    <h3 class="footer-heading">Категорії</h3>
                    <ul class="footer-links list-unstyled">
                        @foreach($categories as $category)
                            <li><a href="{{ route('category.post', $category->id) }}"><i
                                        class="bi bi-chevron-right"></i> {{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-4">
                    <h3 class="footer-heading">Останні публікації</h3>

                    <ul class="footer-links footer-blog-entry list-unstyled">
                        @foreach($posts as $post)
                            <li>
                                <a href="{{ route('show.article', $post->id) }}" class="d-flex align-items-center">
                                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="img-fluid me-3">
                                    <div>
                                        <div class="post-meta d-block">
                                            @foreach($post->categories as $category)
                                                @if($loop->first)
                                                    <span class="date">{{ $category->name }}</span>
                                                @endif
                                            @endforeach
                                            <span class="mx-1">&bullet;</span>
                                            <span>{{ \Carbon\Carbon::make($post->created_at)->translatedFormat('d F Y') }}</span>
                                        </div>
                                        <span>{{ $post->title }}</span>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <div class="footer-legal">
        <div class="container">

            <div class="row justify-content-between">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <div class="copyright">
                        © Copyright <strong><span>BSV develop</span></strong>. All Rights Reserved
                    </div>

                    {{--                    <div class="credits">--}}
                    {{--                        <!-- All the links in the footer should remain intact. -->--}}
                    {{--                        <!-- You can delete the links only if you purchased the pro version. -->--}}
                    {{--                        <!-- Licensing information: https://bootstrapmade.com/license/ -->--}}
                    {{--                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->--}}
                    {{--                        Designed by <a href="/">BSV develop</a>--}}
                    {{--                    </div>--}}

                </div>

                <div class="col-md-6">
                    <div class="social-links mb-3 mb-lg-0 text-center text-md-end">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>

                </div>

            </div>

        </div>
    </div>

</footer>

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
