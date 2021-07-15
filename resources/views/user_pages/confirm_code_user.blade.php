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
            <form action="{{ URL::to('/check-code-xn') }}" class="box" method="post" onsubmit="return checkStuff()">
                {{ csrf_field() }}
                
                <h4>Quên<span> Mật khẩu</span></h4>
                <h5>Nhập mã xác nhận</h5>
                <input type="text" name="cf_code" placeholder="Mã xác nhận" autocomplete="off">
                
              
                <input type="submit" value="Xác nhận" class="btn1">
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
    <script src="{{ asset('public/frontend/assets/js/all.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/loginjs.js') }}"></script>
</body>


</html>
