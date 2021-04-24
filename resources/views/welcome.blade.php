<!doctype html>
<html lang="en">

<head>
    <title>Food Map || Đặt vé nhanh nơi bạn sống</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('public/frontend/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('public/frontend/css/jquery.fancybox.min.css') }}">

    <link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap-datepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('public/frontend/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/fonts/flaticon-covid/font/flaticon.css') }}">

    <link rel="stylesheet" href="{{ asset('public/frontend/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('public/frontend/css/style.css') }}">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


    <div id="overlayer"></div>
    <div class="loader">
        <div class="text-primary" data-aos="flip-up" role="status">
            <img src="{{asset('public/frontend/images/Logo/logofood.png')}}" alt="">
        </div>
    </div>


    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>


        <header class="site-navbar light js-sticky-header site-navbar-target" role="banner">

            <div class="container">
                <div class="row align-items-center" >

                    <div class="col-6 col-xl-2" >
                        <div class="mb-0 site-logo" ><a href="{{URL::to('/')}}" class="mb-0"><img src="{{asset('public/frontend/images/Logo/logofood.png')}}" style="width:100%" alt=""></a></div>
                    </div>

                    <div class="col-12 col-md-10 d-none d-xl-block">
                        <nav class="site-navigation position-relative text-right" role="navigation">

                            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                                <li class="active"><a href="{{URL::to('/')}}" class="nav-link">Trang chủ</a></li>
                                
                                <li><a href="{{URL::to('/gmap')}}" class="nav-link">Bản đồ</a></li>
                                <li><a href="about.html" class="nav-link">About</a></li>


                                <li><a href="blog.html" class="nav-link">Blog</a></li>
                                <li><a href="contact.html" class="nav-link">Contact</a></li>
                                @if (Session::get('id_user') == null)
                                <li ><a href="{{URL::to('/login-user')}}" class="btn btn-primary" style="color: white !important;">Đăng nhập</a></li>
                                @else
                                <li class="has-children"><a href="#" class="btn btn-primary" style="color: white !important;">{{Session::get('tentk')}}</a>
                                    <ul class="dropdown">
                                        <li><a href="#" class="nav-link">Thông tin</a></li>
                                        <li><a href="{{URL::to('/logout')}}" class="nav-link">Đăng xuất</a></li>
                                        
                                      </ul>
                                </li>
                                @endif
                                
                            </ul>
                        </nav>
                    </div>


                    <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a
                            href="#" class="site-menu-toggle js-menu-toggle float-right"><span
                                class="icon-menu h3 text-black"></span></a></div>

                </div>
            </div>

        </header>


        @yield('content')

        <div class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <h2 class="footer-heading mb-4">About</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi cumque tenetur inventore
                            veniam, hic vel ipsa necessitatibus ducimus architecto fugiat!</p>
                        <div class="my-5">
                            <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                            <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                            <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                            <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-4">
                                <h2 class="footer-heading mb-4">Quick Links</h2>
                                <ul class="list-unstyled">
                                    <li><a href="#">Symptoms</a></li>
                                    <li><a href="#">Prevention</a></li>
                                    <li><a href="#">FAQs</a></li>
                                    <li><a href="#">About Coronavirus</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-4">
                                <h2 class="footer-heading mb-4">Helpful Link</h2>
                                <ul class="list-unstyled">
                                    <li><a href="#">Helathcare Professional</a></li>
                                    <li><a href="#">LGU Facilities</a></li>
                                    <li><a href="#">Protect Your Family</a></li>
                                    <li><a href="#">World Health</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-4">
                                <h2 class="footer-heading mb-4">Resources</h2>
                                <ul class="list-unstyled">
                                    <li><a href="#">WHO Website</a></li>
                                    <li><a href="#">CDC Website</a></li>
                                    <li><a href="#">Gov Website</a></li>
                                    <li><a href="#">DOH Website</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-12">
                        <div class="border-top pt-5">
                            <p class="copyright"><small>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;<script>
                                        document.write(new Date().getFullYear());

                                    </script> All rights reserved | This template is made with <i
                                        class="icon-heart text-danger" aria-hidden="true"></i> by <a
                                        href="https://colorlib.com" target="_blank">Colorlib</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </small></p>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    </div> <!-- .site-wrap -->

    <script src="{{ asset('public/frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('public/frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('public/frontend/js/aos.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('public/frontend/js/isotope.pkgd.min.js') }}"></script>
   
    <script src="{{ asset('public/frontend/js/googlemap.js') }}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap&libraries=places"
        async defer></script>
    
    <script src="{{ asset('public/frontend/js/main.js') }}"></script>


</body>

</html>
