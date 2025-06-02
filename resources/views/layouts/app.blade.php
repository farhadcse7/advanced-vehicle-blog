<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- meta -->
    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index,follow">
    <meta name="author" content="rony">
    <meta name="csrf-token" content="">
    <meta property="og:image" content="{{ asset('assets/images/' . getSiteSettings()->fav_icon) }}">
    <meta property="og:site_name" content="Blog">
    <meta property="og:title" content="top business news - Blog">
    <meta property="og:url" content="https://blog.com">
    <meta property="og:type" content="article">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/' . getSiteSettings()->fav_icon) }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <!-- Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lightgallery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/intlTelInput.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select2-bootstrap-5-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    {{-- admin settings css  --}}
    <style>
        {{ getSiteSettings()->headcss }}
    </style>
</head>

<body>

    @include('layouts.partials.header')

    <!-- ======================= slider section  ============================ -->
    <div class="slider_section bg-white overflow-hidden pt-4 pb-4">
        <div class="container">
            <div class="row g-4">
                <!-- Left side large banner -->
                <div class="col-lg-8">
                    <a href="your-link-here" class="banner">
                        <div class="banner-left">
                            <img src="https://blog.bikroy.com/en/wp-content/uploads/2024/09/Blog-Size-Biraat-Haat-Winner-780x470.jpg"
                                class="img-fluid w-100" alt="Main Banner">
                            <div class="banner-content">
                                <h2>Birat Haat 2024 Contest Winners Announced by Bikroy and Minister</h2>
                                <p>Bikroy, a leading online platform for livestock trading in Bangladesh, hosted the
                                    winners' announcement ceremony...</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Right side small banners -->
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <a href="your-link-here" class="banner">
                                <div class="banner-small">
                                    <img src="https://blog.bikroy.com/en/wp-content/uploads/2024/08/Ad-Boost-Blog-780x470-1.png"
                                        class="img-fluid w-100" alt="Small Banner 1">
                                    <div class="banner-content">
                                        <h3>Boost Your Ads for Better Results with Bikroy's Latest Feature</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12">
                            <a href="your-link-here" class="banner">
                                <div class="banner-small">
                                    <img src="https://blog.bikroy.com/en/wp-content/uploads/2024/08/Ad-Boost-Blog-780x470-1.png"
                                        class="img-fluid w-100" alt="Small Banner 2">
                                    <div class="banner-content">
                                        <h3>Introducing the Amazing "Saved Search" Feature on Bikroy</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- ======================= slider End  ============================ -->
    <!-- banner advertisement start -->
    <div class="blog_section bg-white overflow-hidden pt-4 pb-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 mt-0">
                    <a href="#">
                        <div class="ad-banner">
                            <img src="{{ asset('/') }}assets/images/banner.png" alt="Advertisement"
                                class="ad-image">
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- banner advertisement end -->
        <!-- ======================= Section content Start  ============================ -->
        @yield('content')
        <!-- ======================= Section content End  ============================ -->

        @include('layouts.partials.footer')

        <!-- scroll to top -->
        <div class="scrollToTop">
            <i class="fa fa-angle-up"></i>
        </div>

        <!-- Js -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/lightgallery.min.js') }}"></script>
        <script src="{{ asset('assets/js/owlcarousel.min.js') }}"></script>
        <script src="{{ asset('assets/js/flatpickr.min.js') }}"></script>
        <script src="{{ asset('assets/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/js/intlTelInput.js') }}"></script>
        <script src="{{ asset('assets/js/intlTelInput-jquery.js') }}"></script>
        <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
        @stack('scripts')
        {{-- admin settings script  --}}
        <script>
            {{ getSiteSettings()->footerscript }}
        </script>

</body>

</html>
