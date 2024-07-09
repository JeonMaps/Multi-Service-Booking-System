<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MSABS</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Styles --}}
    {{-- template_css START --}}
    <!-- Favicons -->
    <link rel="icon" type="text/css" href="{{ asset('assets/img/skedclock_02.png') }}">
    <link rel="apple-touch-icon" type="text/css" href="{{ asset('assets/img/skedclock_02.png') }}">

    <!-- Google Fonts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/googlefont.css') }}">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/aos/aos.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
    

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom_style.css') }}" rel="stylesheet">
    

    <!-- =======================================================
    * Template Name: Bocor - v4.10.0
    * Template URL: https://bootstrapmade.com/bocor-bootstrap-template-nice-animation/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
    {{-- template_css END --}}
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light main-background-color-1 navbarShadow ">
            <div class="container">
                <a class="navbar-brand logo" href="{{ url('/') }}">
                    <b> MSABS </b>
                    <img src="{{ asset('assets/img/skedclock_02.png') }}" alt=""
                        class="img-fluid custom-height-40">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @guest
                            @if (Route::has('register'))
                                {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li> --}}
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="/home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('user.appointments', ['userId' => auth()->user()->id]) }}">Appointments</a>
                            </li>
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <button class="btn-custom"><i class="bi bi-bell"></i></button>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" id="userProfile" href="{{ route('user-edit-profile') }}">User Profile</a>
                                    <a class="dropdown-item" id="userLogout" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item">
                                <img src="{{ asset('assets/img/defaultProfile.png') }}" class="img-fluid custom-height-40">
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 main-background-color-2">
            
            @yield('content')
        </main>
    </div>

    <!-- ======= Footer ======= -->
    {{-- <footer id="footer">

        <div class="container footer-bottom clearfix align-center">
            <div class="credits">
                &copy; Copyright <strong><span>MSABS 2023</span></strong>. All Rights Reserved
            </div>

        </div>
    </footer> --}}
    <!-- End Footer -->

    <!-- ======= Back to Top Button ======= -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <!-- Back to Top Button End -->
    {{-- template_js START --}}
    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/aos/aos.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}" defer></script>

    <!-- Custom JS File -->
    <script src="{{ asset('assets/js/custom_script.js') }}" defer></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}" defer></script>
    {{-- template_js END --}}
</body>

</html>
