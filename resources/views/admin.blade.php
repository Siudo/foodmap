<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Food Map</title>

    <link rel="stylesheet" href="{{ asset('public/backend/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/assets/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/assets/vendors/chartjs/Chart.min.css') }}">

    <link rel="stylesheet"
        href="{{ asset('public/backend/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('public/backend/assets/images/logo/logo.png') }}"
        style="background-color: white" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="{{ URL::to('public/backend/assets/images/logo/logo.png') }}"
                        style="width:100%; height:150px" alt="" srcset="">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">


                        <li class='sidebar-title'>Main Menu</li>



                        <li class="sidebar-item active ">
                            <a href="{{ URL::to('/dashboard') }}" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>

                        </li>




                        <li class="sidebar-item has-sub ">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="triangle" width="20"></i>
                                <span>Thông tin quán</span>
                            </a>

                            <ul class="submenu ">
                                <li>
                                    <a href="{{ URL::to('/them-thong-tin-quan') }}"> Thêm thông tin quán </a>
                                </li>

                                <li>
                                    <a href="{{ URL::to('/tat-ca-quan') }}"> Hiển thị thông tin quán </a>
                                </li>

                            </ul>

                        </li>




                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="briefcase" width="20"></i>
                                <span>Loại Quán</span>
                            </a>

                            <ul class="submenu ">

                                <li>
                                    <a href="{{ URL::to('/them-loai-quan') }}">Thêm loại</a>
                                </li>

                                <li>
                                    <a href="{{ URL::to('/tat-ca-loai') }}">Tất cả Loại</a>
                                </li>

                            </ul>

                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="briefcase" width="20"></i>
                                <span>Brands</span>
                            </a>

                            <ul class="submenu ">

                                <li>
                                    <a href="{{ URL::to('/add-brand-product') }}">Add brands</a>
                                </li>

                                <li>
                                    <a href="{{ URL::to('/all-brand-product') }}">All brand</a>
                                </li>

                            </ul>

                        </li>






                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ml-auto">
                        <li class="dropdown nav-icon">
                            <a href="#" data-toggle="dropdown"
                                class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="bell"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-large">
                                <h6 class='py-2 px-4'>Notifications</h6>
                                <ul class="list-group rounded-none">
                                    <li class="list-group-item border-0 align-items-start">
                                        <div class="avatar bg-success mr-3">
                                            <span class="avatar-content"><i data-feather="shopping-cart"></i></span>
                                        </div>
                                        <div>
                                            <h6 class='text-bold'>New Order</h6>
                                            <p class='text-xs'>
                                                An order made by Ahmad Saugi for product Samsung Galaxy S69
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown nav-icon mr-2">
                            <a href="#" data-toggle="dropdown"
                                class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="mail"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ URL::to('/logout') }}"><i
                                        data-feather="log-out"></i>
                                    Logout</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar mr-1">
                                    <img src="assets/images/avatar/avatar-s-1.png" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">Hi, Saugi</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ URL::to('/logout') }}"><i
                                        data-feather="log-out"></i>
                                    Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-content container-fluid">

                @yield('admin_content')
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-left">
                        <p>Food Map</p>
                    </div>
                    <div class="float-right">
                        <p>Food Map<span class='text-danger'><i data-feather="heart"></i></span><a
                                href="http://ahmadsaugi.com">Food Map</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('public/backend/assets/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('public/backend/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('public/backend/assets/js/app.js') }}"></script>
    <script src="{{ asset('public/backend/assets/js/all.js') }}"></script>
    <script src="{{ asset('public/backend/assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('public/backend/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('public/backend/assets/js/pages/dashboard.js') }}"></script>



    <script src="{{ asset('public/backend/assets/js/adminmap.js') }}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=createMap&libraries=places"
        async defer></script>


    <script src="{{ asset('public/backend/assets/js/main.js') }}"></script>
</body>

</html>
