@extends('auth_layout.auth_template')

{{-- @section('custom-css')
    <link rel="stylesheet" href="lang/css/login.css">
@endsection --}}

@section('login')

<div class="container" id="container">
    <div class="form-container sign-in-container">

        <form action="#" class="d-flex flex-column justify-content-center">
            <h1 class="my-4">Sign in</h1>

            <span>or use your account</span>
            <input type="email" placeholder="Email"/>
            <input type="password" placeholder="Password"/>
            <button class="my-4">Sign In</button> <br>
            <a href="#">Forgot your password?</a>

            <div class="social-container">
                <a href="#" class="social"><i class="fa fa-facebook"></i></a>
                <a href="#" class="social"><i class="fa fa-google-plus"></i></a>
                <a href="#" class="social"><i class="fa fa-linkedin"></i></a>
            </div>
        </form>

    </div>
    <div class="overlay-container d-none d-md-block">
        <div class="overlay">
            <div class="overlay-panel overlay-right">

                {{-- <p>Enter your personal details and start journey with us</p> --}}
                     <a class="ghost btn" id="signUp" href="{{url('/')}}">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
