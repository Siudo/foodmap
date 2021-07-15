<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/logincss.css') }}">
    <link rel="shortcut icon" href="{{ asset('public/frontend/assets/img/logo/logofood.png') }}" type="image/x-icon">
</head>

<body id="particles-js">
    <div class="animated bounceInDown">
        <div class="container">
            <span class="error animated tada" id="msg"></span>
            <form action="{{ URL::to('/check-account') }}" class="box" method="post" onsubmit="return checkStuff()">
                {{ csrf_field() }}
                
                <h4>Quên<span> Mật khẩu</span></h4>
                <h5>Nhập thông tin của bạn</h5>
                <input type="text" name="tentk_user" placeholder="Tên tài khoản" autocomplete="off">
                
              
                <input type="submit" value="Xác nhận" class="btn1">
            </form>
           
        </div>

    </div>
    <script src="{{ asset('public/frontend/assets/js/all.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/loginjs.js') }}"></script>
</body>


</html>
