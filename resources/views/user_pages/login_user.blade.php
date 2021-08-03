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
            <form action="{{ URL::to('/login-account') }}" class="box" method="post" onsubmit="return checkStuff()">
               
                
                {{ csrf_field() }}
                <?php
                $message = Session::get('message');
                if ($message) {
                echo '<span style="color:red">' . $message . '</span>';
                Session::put('message', null);
                }
                ?>
                <h4>User<span> Login</span></h4>
                <h5>Sign in to your account.</h5>
                <input type="text" name="tentk_user" placeholder="Email" autocomplete="off">
                <i class="typcn typcn-eye" id="eye"></i>
                <input type="password" name="password_user" placeholder="Passsword" id="pwd" autocomplete="off">
               
                <label>
                    <input type="checkbox">
                    <span></span>
                    <small class="rmb">Remember me</small>
                </label>
                <a href="{{URL::to('/forgot-password-user')}}" class="forgetpass">Forget Password?</a>
                <input type="submit" value="Sign in" class="btn1">
            </form>
           
            <a href="{{ URL::to('/register-user') }}" class="dnthave">Don’t have an account? Sign up</a>
            <div>
             
            </div>
            
        </div>
       
      

    </div>
    <script src="{{ asset('public/frontend/assets/js/all.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/loginjs.js') }}"></script>
</body>


</html>
