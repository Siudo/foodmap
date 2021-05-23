<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Food Map | Restaurant</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/frontend/assets/img/favicon.ico') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/style.css') }}">
    
</head>

<body>
    <!--? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('public/frontend/assets/img/logo/logo.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!--? Header Start -->
        <div class="header-area header-transparent">
            <div class="main-header  header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-1">
                            <div class="logo">
                                <a href="{{ URL::to('/') }}"><img
                                        src="{{ asset('public/frontend/assets/img/logo/logo.png') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <div class="menu-main d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="{{ URL::to('/') }}">Trang chủ</a></li>
                                            <li><a href="{{ URL::to('/gmap') }}">Bản đồ</a></li>
                                            <li><a href="about.html">About</a></li>
                                            <li><a href="menu.html">Menu</a></li>
                                            <li><a href="blog.html">Blog</a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="blog_details.html">Blog Details</a></li>
                                                    <li><a href="elements.html">Element</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                @if (Session::get('id_user') == null)
                                    <div class="header-right-btn f-right d-none d-lg-block ml-20">
                                        <a href="{{ URL::to('/login-user') }}" class="border-btn header-btn">Đăng
                                            Nhập</a>
                                    </div>
                                @else
                                    <div class="header-right-btn f-right d-none d-lg-block ml-20">
                                        <a href="{{ URL::to('/logout') }}"
                                            class="border-btn header-btn">{{ Session::get('tentk') }}</a>
                                        {{-- <ul class="dropdown">
                                            <li><a href="#" class="nav-link">Thông tin</a></li>
                                            <li><a href="{{ URL::to('/logout') }}" class="nav-link">Đăng xuất</a></li>

                                        </ul> --}}
                                    </div>
                                @endif


                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <!--? Footer Start-->
        <div class="footer-area section-bg" data-background="public/frontend/assets/img/gallery/section_bg02.png">
            <div class="container">
                <div class="footer-top footer-padding">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-4 col-lg-4 col-md-5 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="index.html"><img
                                            src="{{ asset('public/frontend/assets/img/logo/logo2_footer.png') }}"
                                            alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-5 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Navigation</h4>
                                    <ul>
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">Events</a></li>
                                        <li><a href="#">Testimonial</a></li>
                                        <li><a href="#">Categories</a></li>
                                        <li><a href="#">Contacts</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-5 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Useful Links</h4>
                                    <ul>
                                        <li><a href="#">Registration</a></li>
                                        <li><a href="#">Login</a></li>
                                        <li><a href="#">Policy</a></li>
                                        <li><a href="#">Terms & Conditions</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Instagram -->
                        <div class="col-xl-4 col-lg-4 col-md-5 col-sm-7">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Instagram Feed</h4>
                                </div>
                                <div class="instagram-gellay">
                                    <ul class="insta-feed">
                                        <li><a href="#"><img
                                                    src="{{ asset('public/frontend/assets/img/gallery/instagram1.png') }}"
                                                    alt=""></a></li>
                                        <li><a href="#"><img
                                                    src="{{ asset('public/frontend/assets/img/gallery/instagram2.png') }}"
                                                    alt=""></a></li>
                                        <li><a href="#"><img
                                                    src="{{ asset('public/frontend/assets/img/gallery/instagram3.png') }}"
                                                    alt=""></a></li>
                                        <li><a href="#"><img
                                                    src="{{ asset('public/frontend/assets/img/gallery/instagram4.png') }}"
                                                    alt=""></a></li>
                                        <li><a href="#"><img
                                                    src="{{ asset('public/frontend/assets/img/gallery/instagram5.png') }}"
                                                    alt=""></a></li>
                                        <li><a href="#"><img
                                                    src="{{ asset('public/frontend/assets/img/gallery/instagram6.png') }}"
                                                    alt=""></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-xl-9 col-lg-8">
                            <div class="footer-copy-right">
                                <p>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;<script>
                                        document.write(new Date().getFullYear());

                                    </script> All rights reserved | This template is made with <i class="fa fa-heart"
                                        aria-hidden="true"></i> by <a href="https://colorlib.com"
                                        target="_blank">Colorlib</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <!-- Footer Social -->
                            <div class="footer-social f-right">
                                <span>Follow Us</span>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!-- Scroll Up -->
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->

    <script src="{{ asset('public/frontend/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('public/frontend/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('public/frontend/assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('public/frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/slick.min.js') }}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('public/frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/animated.headline.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/jquery.magnific-popup.js') }}"></script>

    <!-- Date Picker -->
    <script src="{{ asset('public/frontend/assets/js/gijgo.min.js') }}"></script>
    <!-- Nice-select, sticky -->
    <script src="{{ asset('public/frontend/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/jquery.sticky.js') }}"></script>

    <!-- contact js -->
    <script src="{{ asset('public/frontend/assets/js/contact.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/jquery.form.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/mail-script.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/jquery.ajaxchimp.min.js') }}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('public/frontend/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/main.js') }}"></script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap&libraries=&v=weekly"
        async defer></script>

</body>

</html>
