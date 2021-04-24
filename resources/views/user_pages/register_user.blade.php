<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
    <link rel="stylesheet" href="{{ asset('public/frontend/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/logincss.css') }}">
    <link rel="shortcut icon" href="{{ asset('public/frontend/images/logo/logofood.png') }}" type="image/x-icon">
</head>

<body id="particles-js">
    <div class="animated bounceInDown">
        <div class="container" style="height:790px ">
            <span class="error animated tada" id="msg"></span>
            <form action="{{URL::to('/register')}}" class="box" method="post" onsubmit="return checkStuff()">
                {{ csrf_field() }}
                <h4>User<span> Register</span></h4>
                <h5>Sign in to your account.</h5>

                <input type="text" name="tentk_user" placeholder="Account" autocomplete="off">
                <input type="text" name="ten_user" placeholder="Your Name" autocomplete="off">
                <input type="text" name="sdt_user" placeholder="Phone Number" autocomplete="off">
                <input type="text" name="email_user" placeholder="Email" autocomplete="off">
                <i class="typcn typcn-eye" id="eye"></i>
                <input type="password" name="password_user" placeholder="Passsword" id="pwd" autocomplete="off">
                @if(Session::get('message') != null)
                    <p style="color: whitesmoke">{{Session::get('message')}}</p>
                    {{Session::put('message',null)}}
                    
                @endif
                
                <input type="submit" value="Sign in" class="btn1">
            </form>
            <a href="{{ URL::to('/login-user') }}" class="dnthave" style="left: 30%">   Have an account? Login</a>
        </div>
      
    </div>
    <script src="{{ asset('public/frontend/js/all.js') }}"></script>
    <script src="{{ asset('public/frontend/js/loginjs.js') }}"></script>
</body>


</html>
