<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>LaraComp @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        {{-- stylesheets --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
        <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('css/hamburgers.css') }}">

        {{-- Icons --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        {{-- script --}}
        <script src="{{ asset('js/jquery-3.4.1.js') }}"></script>

    </head>
    <body>
        {{-- Navigation --}}
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-logo" href="{{ route('home') }}">LARA<b>COMP</b></a>
                </div>
                <button class="navbar-toggler hamburger hamburger--squeeze" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#about">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#service">Layanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Harga</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Team</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('blog') }}">Blog</a>
                        </li>
                        
                        <li class="nav-item item-button2">
                            <a class="btn btn-career" href="#">Career</a>
                        </li>
                        <li class="nav-item item-button2">
                            <a class="btn btn-contact" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        {{-- END Navigation --}}

        {{-- Jumbotron --}}
        @yield('jumbotron')
        {{-- END Jumbotron --}}

        {{-- content --}}
        <div class="content-wrapper">
            @yield('content')
        </div>
        {{-- END content --}}
        
        {{-- footer --}}
        <footer class="main-footer">
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-6 column-company-info">
                        <h1 class="text-white">LARACOMP</h1>
                        <p style="text-align: justify; width: 30rem;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p>
                    </div>
                    <div class="col-md-6 column-company-links">
                        <div class="row">
                            <div class="col-md-4">
                                <h2>Profil</h2>
                                <ul>
                                    <li>
                                        <a class="nav-link" href="#about">Tentang</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#service">Layanan</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#">Produk</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#">Harga</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#">Team</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-4">
                                <h2>Kegiatan Umum</h2>
                                <ul>
                                    <li>
                                        <a class="nav-link" href="{{ route('blog') }}">Blog</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-4">
                                <h2>Ekstra</h2>
                                <ul>
                                    <li>
                                        <a class="nav-link" href="#">Testimonial</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#">Karir</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="copyright mt-5">
                    <p class="text-center text-white">&copy; <a href="#">LARACOMP</a> 2019</p>
                </div>
            </div>
        </footer>

        {{-- script --}}
        @stack('script')
        <script src="{{ asset('js/script.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/scrollreveal.min.js') }}"></script>
        <script src="{{ asset('js/hamburger.js') }}"></script>
        <script src="{{ asset('js/scrollAnimate.js') }}"></script>
        <script src="{{ asset('js/smoothScroll.js') }}"></script>
        <script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
    </body>
</html>
