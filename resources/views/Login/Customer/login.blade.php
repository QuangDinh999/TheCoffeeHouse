<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/login.css')}}" rel="stylesheet">

    <title>Login</title>
</head>
<body>
<img src="{{asset('storage/logo/coffee.png')}}" width="200px" height="100px" style="margin-bottom: 10px">
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="{{route('customer.register')}}">
            <h1>Create Account</h1>
            <span>or use your email for registration</span>
            <input type="text" placeholder="Name" name="cus_name"/>
            <input type="email" placeholder="Email" name="cus_email"/>
            <input type="password" placeholder="Password" name="cus_password"/>
            <input type="text" placeholder="Phone" name="phone"/>
            <input type="text" placeholder="Address" name="address"/>
            <button>Sign Up</button>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form action="{{route('customer.login_process')}}">
            <h1>Sign in</h1>
            <span>or use your account</span>

            <input type="email" placeholder="Email" name="email"/>
            <input type="password" placeholder="Password" name="password"/>
            <a href="#">Forgot your password?</a>
            <button>Sign In</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Hello, Friend!</h1>
                <p>Enter your personal details and start journey with us</p>
                <button class="ghost" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>
</div>

{{--<footer>--}}
{{--    <p>--}}
{{--        Created with <i class="fa fa-heart"></i> by--}}
{{--        <a target="_blank" href="https://florin-pop.com">Florin Pop</a>--}}
{{--        - Read how I created this and how you can join the challenge--}}
{{--        <a target="_blank" href="https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/">here</a>.--}}
{{--    </p>--}}
{{--</footer>--}}

<script src="{{asset('js/login.js')}}"></script>
</body>
</html>
