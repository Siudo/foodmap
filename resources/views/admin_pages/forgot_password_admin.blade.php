<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Map | Forgot password</title>
    <link rel="stylesheet" href="{{ asset('public/backend/assets/css/bootstrap.css') }}">

    <link rel="shortcut icon" href="{{ asset('public/backend/assets/images/logo/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('public/backend/assets/css/app.css') }}">
</head>

<body>
    <div id="auth">
        
<div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-12 mx-auto">
            <div class="card py-4">
                <div class="card-body">
                    <div class="text-center mb-5">
                        <img src="{{URL::to('public/backend/assets/images/Logo/logo.png')}}" height="200" class='mb-4'>
                        <h3>Quên mật khẩu?</h3>
                        <p>Nhập thông tin của bạn !</p>
                    </div>
                    <form action="{{URL::to('/check-account-admin')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="first-name-column">Tên tài khoản</label>
                            <input type="text" id="first-name-column" class="form-control" name="tentk_admin">
                        </div>
                        

                        <div class="clearfix">
                            <button class="btn btn-primary float-right">Xác nhận</button>
                        </div>
                    </form>
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
