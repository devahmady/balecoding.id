<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('judul', 'balecoding.id')</title>
    <meta content="@yield('more' , 'Jelajahi dunia programming dengan informasi terbaru, tips koding, tutorial, software, web, dan mobile. Pelajari algoritma dan struktur data. Temukan teknologi, arsitektur software, debugging, framework, dan open source.')" name="description">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="bale coding">
    <meta property="og:image" content="{{ asset('assets') }}/img/icon.png">
    <meta property="og:description" content="@yield('more')" name="description">
    <meta property="og:url" content="@yield('slug')">
    <meta property="og:image:type" content="@yield('img')">
    <meta property="og:image:width" content="650">
    <meta property="og:image:height" content="366">
    <meta name="copyright" content="" itemprop="balecoding">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="googlebot-news" content="index, follow">
    <link rel="shortcut icon" href="{{ asset('assets') }}/img/icon.png" type="image/x-icon">



    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('frontend') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend') }}/css/style.css" rel="stylesheet">

    <!-- Stylesheet -->
    <script type="text/javascript"
        src="https://platform-api.sharethis.com/js/sharethis.js#property=63f2d027eb9eeb0012fa5fdb&product=inline-share-buttons&source=platform"
        async="async"></script>

</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center bg-dark px-lg-5">
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-n2">
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="#">{{ date('D, d M Y') }}</a>
                        </li>


                        @auth
                            <li class="nav-item">
                                <a class="nav-link text-body small" href="/dashboard/home/index">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link text-body small" href="/auth/login">Login</a>
                            </li>
                        @endauth
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 text-right d-none d-md-block">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-auto mr-n2">
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-twitter"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-facebook-f"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-linkedin-in"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-instagram"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small
                                    class="fab fa-google-plus-g"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-youtube"></small></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row align-items-center bg-white py-3 px-lg-5">
           
            <a href="/" class="navbar-brand p-0 d-none d-lg-block">
                <h1 class="m-0 display-5 text-primary">BALECODING.<span class="text-secondary font-weight-normal">ID</span></h1>
            </a>
        
            <div class="col-lg-8 text-center text-lg-right">
                <!-- Breaking News Start -->
                <div class="container-fluid bg-info ">
                    <div class="container">
                        <div class="row align-items-center bg-white ">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <div class="bg-info text-dark text-center font-weight-medium py-2"
                                        style="width: 170px;">Sekilas Info</div>
                                    <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                                        style="width: calc(100% - 170px); padding-right: 90px;">
                                            <div class="text-truncate">
                                                <a class="text-dark text-uppercase font-weight-semi-bold"
                                                    href="/blog">
                                                   lakukan apa yang bisa kamu lakukan
                                                </a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <button class="btn btn-info border-warning"> Member Online
                    [{{ $online }}]
                </button> --}}
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- ##### Header Area Start ##### -->
    @include('frontend.app.navbar')
    <!-- ##### Header Area End ##### -->



    <!-- ##### Vizew Post Area Start ##### -->
    <div class="container-fluid">
        @yield('content')
    </div>
    <!-- ##### Vizew Psot Area End ##### -->


    <!-- ##### Footer Area Start ##### -->
    @include('frontend.app.footer')
    <!-- ##### Footer Area End ##### -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('frontend') }}/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('frontend') }}/js/main.js"></script>
</body>

</html>
