<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="{{ asset('public/BackEnd/assets/css/bootstrap.css') }}">

    <link rel="shortcut icon" href="{{ asset('public/BackEnd/assets/images/logo/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('public/BackEnd/assets/css/app.css') }}">
</head>

<body>
    <div id="auth">

        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <img src="{{URL::to('public/BackEnd/assets/images/logo/logo.png')}}" height="200" class='mb-4'>
                                <h3>Login Admin</h3>
                                
                            </div>
                            <form action="{{ URL::to('/check-login') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group position-relative has-icon-left">
                                    <label for="username">Username</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" id="username" name="admin_name">
                                        <div class="form-control-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="clearfix">
                                        <label for="password">Password</label>
                                        <a href="#" class='float-right'>
                                            <small>Forgot password?</small>
                                        </a>
                                    </div>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" name="admin_password" id="password">
                                        <div class="form-control-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class='form-check clearfix my-4'>
                                    <div class="checkbox float-left">
                                        <input type="checkbox" id="checkbox1" class='form-check-input'>
                                        <label for="checkbox1">Remember me</label>
                                    </div>
                                    <div class="float-right">
                                        <a href="auth-register.html">Don't have an account?</a>
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
                            <div class="divider">
                                <div class="divider-text">OR</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <button class="btn btn-block mb-2 btn-primary"><i data-feather="facebook"></i>
                                        Facebook</button>
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn btn-block mb-2 btn-secondary"><i data-feather="github"></i>
                                        Github</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="{{ asset('public/BackEnd/assets/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('public/BackEnd/assets/js/app.js') }}"></script>
    <script src="{{ asset('public/BackEnd/assets/js/all.js') }}"></script>
    <script src="{{ asset('public/BackEnd/assets/js/main.js') }}"></script>
</body>

</html>