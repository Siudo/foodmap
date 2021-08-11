<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị viên</title>
    <link rel="stylesheet" href="{{ asset('public/backend/assets/css/bootstrap.css') }}">

    <link rel="shortcut icon" href="{{ asset('public/backend/assets/images/logo/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('public/backend/assets/css/app.css') }}">
</head>

<body>
    <div id="auth">

        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <img src="{{URL::to('public/backend/assets/images/Logo/logo.png')}}" height="200" class='mb-4'>
                                <h3>ADMIN</h3>
                                
                            </div>
                            <form action="{{ URL::to('/check-login-quantri') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group position-relative has-icon-left">
                                    <label for="username">Username</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" id="username" name="taikhoan">
                                        <div class="form-control-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="clearfix">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" name="matkhau" id="password">
                                        <div class="form-control-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                </div>

                              
                                <div class="clearfix">
                                    <button class="btn btn-primary float-right">Login</button>
                                </div>
                            </form>
                            <?php
                            $message = Session::get('message');
                            if ($message) {
                            echo '<p style="color:#ff8585;">' . $message . '</p>';
                            Session::put('message', null);
                            }
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="{{ asset('public/backend/assets/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('public/backend/assets/js/app.js') }}"></script>
    <script src="{{ asset('public/backend/assets/js/all.js') }}"></script>
    <script src="{{ asset('public/backend/assets/js/main.js') }}"></script>
</body>

</html>
