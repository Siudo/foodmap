<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="{{ asset('public/backend/assets/css/bootstrap.css') }}">

    <link rel="shortcut icon" href="{{ asset('public/backend/assets/images/logo/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('public/backend/assets/css/app.css') }}">
</head>

<body>
    <div id="auth">

        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <img src="{{ URL::to('public/backend/assets/images/Logo/logo.png') }}" height="200"
                                    class='mb-4'>
                                <h3>Đăng ký</h3>
                                <p>Điền thông tin người dùng.</p>
                            </div>
                            <form action="{{ URL::to('/save-account-admin') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Tên tài khoản</label>
                                            <input type="text" id="first-name-column" name="tentk_ql"
                                                class="form-control" name="fname-column">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Mật khẩu</label>
                                            <input type="password" id="last-name-column" name="mk_ql"
                                                class="form-control" name="lname-column">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="username-column">Họ tên</label>
                                            <input type="text" id="username-column" name="ten_ql" class="form-control"
                                                name="username-column">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Địa chỉ</label>
                                            <input type="text" id="country-floating" name="diachi" class="form-control"
                                                name="country-floating">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Số điện thoại</label>
                                            <input type="text" id="company-column" name="sdt" class="form-control"
                                                name="company-column">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Email</label>
                                            <input type="text" id="email-id-column" name="email" class="form-control"
                                                name="email-id-column">
                                        </div>
                                    </div>
                                </diV>

                                <a href="{{ URL::to('/login-admin') }}">Have an account? Login</a>
                                <div class="clearfix">
                                    <button class="btn btn-primary float-right">Đăng ký</button>
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
    <script src="{{ asset('public/backend/assets/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('public/backend/assets/js/app.js') }}"></script>
    <script src="{{ asset('public/backend/assets/js/all.js') }}"></script>
    <script src="{{ asset('public/backend/assets/js/main.js') }}"></script>
</body>

</html>
