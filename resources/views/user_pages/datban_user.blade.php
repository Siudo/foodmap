@extends('welcome')
@section('content')
    <main>
        <!--? Hero Start -->
        <div class="slider-area">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2">
                                <h2>ĐẶT BÀN VỚI CHÚNG TÔI</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
        <!--? About-2 Area Start -->
        @foreach ($data_quan as $key => $values)


            <div class="about-area2 section-padding30">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12">
                            <!-- about-img -->
                            <div class="about-img ">
                                {{-- Hình quán ăn --}}
                                <img src="{{ asset('public/upload/res_img/' . $values->hinhdd) }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="about-caption mb-50">
                                <!-- Section Tittle -->
                                <div class="section-tittle mb-35">
                                    <span>Thời gian mở cửa: {{ $values->tgianmocua }}</span>
                                    <h2>{{ $values->tenquan }}</h2>
                                </div>
                                <p class="pera-top">{{ $values->tgianmocua }}</p>

                                <p class="mb-65 pera-bottom">{!! nl2br($values->mota) !!}</p>
                                <a href="#datb" class="border-btn">Đặt ngay !</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--? Booking Room Start-->
            <div class="booking-area section-bg pt-120 pb-130" id="datb"
                data-background="{{ asset('public/frontend/assets/img/gallery/section_bg04.png') }}">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="cl-xl-7 col-lg-8 col-md-10">
                            <!-- Section Tittle -->
                            <div class="section-tittle text-center mb-40">
                                <span>{{ $values->tenquan }}</span>
                                <h2>ĐẶT BÀN</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <form action="{{ URL::to('/save-datban/' . $values->id_quan) }}" method="POST">
                                {{ csrf_field() }};
                                <div class="booking-wrap d-flex justify-content-between align-items-center">
                                    <!-- Single Select Box -->
                                    <div class="single-select-box mb-30">
                                        <div class="boking-datepicker">
                                            <input type="text" name="songuoi_book" placeholder="Số người tham gia"
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Số người tham gia'" required
                                                class="single-input">
                                        </div>
                                    </div>
                                    <!-- select in date -->
                                    <div class="single-select-box mb-30">
                                        <div class="boking-datepicker">
                                            <input id="datepicker1" placeholder="Date" name="date_book" />
                                        </div>
                                    </div>
                                    <!-- Single Select Box -->
                                    <div class="single-select-box mb-30">
                                        <div class="boking-datepicker">
                                            <input id="timepicker" placeholder="Time" name="time_book" />
                                        </div>
                                    </div>
                                    <!-- Single Select Box -->
                                    <div class="single-select-box mb-30">
                                        <button data-toggle="modal" class="btn select-btn">Book
                                            Now</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                            $thanhcong = Session::get('thanhcong');
                            $da_dk = Session::get('dadk');
                            $error = Session::get('error');
                            if ($thanhcong) { ?>
                            <script>
                                alert("Cảm ơn quý khách đã đặt bàn tại đây !");

                            </script>
                            <?php Session::put('thanhcong', null);} elseif ($da_dk) { ?>
                            <script>
                                alert("Quý khách đã đặt bàn tại đây rồi !");

                            </script>
                            <?php Session::put('dadk', null);}elseif ($error) {
                            ?>
                            <script>
                                alert("Thời gian đặt bàn không hợp lệ !");

                            </script>
                              <?php Session::put('error', null);}
                                ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Booking Room End-->
            <!--? About Area Start -->
            <div class="about-low-area section-padding30">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12">
                            <div class="about-caption mb-50">
                                <!-- Section Tittle -->
                                <div class="section-tittle mb-35">
                                    <span>Discover Your Test</span>
                                    <h2>We Provide Good Food For Your Family!</h2>
                                </div>
                                <p>Ut enim acgsd minim veniam, quxcis nostrud exercitation ullamco laboris nisi ufsit
                                    aliquip ex ea commodo consequat is aute irure m, quis nostrud exer.</p>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-10">
                                    <div class="single-caption mb-20">
                                        <div class="caption-icon">
                                            <span class="flaticon-restaurant"></span>
                                        </div>
                                        <div class="caption">
                                            <p>Ut enim ad minim veniam, quis nostrud exer.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-10">
                                    <div class="single-caption mb-20">
                                        <div class="caption-icon">
                                            <span class="flaticon-tools-and-utensils-1"></span>
                                        </div>
                                        <div class="caption">
                                            <p>Ut enim ad minim veniam, quis nostrud exer.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-10">
                                    <div class="single-caption mb-20">
                                        <div class="caption-icon">
                                            <span class="flaticon-hat"></span>
                                        </div>
                                        <div class="caption">
                                            <p>Ut enim ad minim veniam, quis nostrud exer.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-10">
                                    <div class="single-caption mb-20">
                                        <div class="caption-icon">
                                            <span class="flaticon-restaurant"></span>
                                        </div>
                                        <div class="caption">
                                            <p>Ut enim ad minim veniam, quis nostrud exer.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <!-- about-img -->
                            <div class="about-img ">
                                <img src="{{ URL::to('public/frontend/assets/img/gallery/about.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About Area End -->
            <!--? About-3 Start -->
            <div class="about-area3 pt-180 pb-170 section-bg"
                data-background="{{ asset('public/frontend/assets/img/gallery/section_bg03.png') }}">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-xl-6 col-lg-6 col-md-9 col-sm-11">
                            <!-- Section Tittle -->
                            <div class="section-tittle section-tittle2 mb-40">
                                <span>About Our Restaurant</span>
                                <h2>We Provide Good Food For Your Family!</h2>
                                <p>Ut enim acgsd minim veniam, quxcis nostrud exercitation ullamco laboris nisi ufsit
                                    aliquip ex ea commodo consequat is aute irure m, quis nostrud exer.</p>
                            </div>
                            <!--Hero form -->
                            <form action="#" class="search-box">
                                <div class="input-form">
                                    <input type="text" placeholder="Your Email">
                                </div>
                                <div class="search-form">
                                    <button>Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About-3 End -->
            <!-- About-2 Area End -->
            <!--? Our Services Start -->
            <div class="our-services section-padding30">
                <div class="container">
                    <div class="row justify-content-sm-center">
                        <div class="cl-xl-7 col-lg-8 col-md-10">
                            <!-- Section Tittle -->
                            <div class="section-tittle text-center mb-70">
                                <span>Servicees We Offer</span>
                                <h2>Our Best Services</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-lg-4 col-md-6 col-sm-6">
                            <div class="single-services text-center mb-30">
                                <div class="services-ion">
                                    <span class="flaticon-restaurant"></span>
                                </div>
                                <div class="services-cap">
                                    <h5><a href="#">Best Chef</a></h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore.</p>
                                </div>
                            </div>
                        </div>
                        <div class=" col-lg-4 col-md-6 col-sm-6">
                            <div class="single-services active text-center mb-30">
                                <div class="services-ion">
                                    <span class="flaticon-tools-and-utensils-1"></span>
                                </div>
                                <div class="services-cap">
                                    <h5><a href="#">Quality Food</a></h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore.</p>
                                </div>
                            </div>
                        </div>
                        <div class=" col-lg-4 col-md-6 col-sm-6">
                            <div class="single-services text-center mb-30">
                                <div class="services-ion">
                                    <span class="flaticon-restaurant"></span>
                                </div>
                                <div class="services-cap">
                                    <h5><a href="#">Perfect Cook</a></h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Our Services End -->
        @endforeach
        <!-- Button trigger modal -->


    </main>
@endsection
