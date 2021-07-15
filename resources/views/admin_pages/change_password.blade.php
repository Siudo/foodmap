<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Voler Admin Dashboard</title>
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
                        <h3>Nhập mật khẩu mới !</h3>
                        <p>Please enter your email to receive password reset link.</p>
                    </div>
                    <form action="{{URL::to('/update-password-admin')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="first-name-column">Mật khẩu mới</label>
                            <input type="password" id="first-name-column" class="form-control" name="new_pass1">
                        </div>
                        <div class="form-group">
                            <label for="first-name-column">Xác nhận mật khẩu</label>
                            <input type="password" id="first-name-column" class="form-control" name="new_pass2">
                        </div>

                        <div class="clearfix">
                            <button class="btn btn-primary float-right">Xác nhận</button>
                        </div>
                    </form>
                    <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span style="color:red">'.$message.'</span>';
                         Session::put('message',null);
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
