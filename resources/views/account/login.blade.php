@extends('auth_layout.auth_template')

{{-- @section('custom-css')
    <link rel="stylesheet" href="lang/css/login.css">
@endsection --}}

@section('login')

<div class="container" id="container">
    <div class="form-container sign-in-container">

        <form action="#">
            <h1>Sign in</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fa fa-facebook"></i></a>
                <a href="#" class="social"><i class="fa fa-google-plus"></i></a>
                <a href="#" class="social"><i class="fa fa-linkedin"></i></a>
            </div>
            <span>or use your account</span>
            <input type="email" placeholder="Email"/>
            <input type="password" placeholder="Password"/>
            <a href="#">Forgot your password?</a>
            <button>Sign In</button>
        </form>

    </div>
    <div class="overlay-container d-none d-md-block">
        <div class="overlay">
            <div class="overlay-panel overlay-right">
                <h1>{{$notice}}</h1>
                {{-- <p>Enter your personal details and start journey with us</p> --}}
                     <a class="ghost btn" id="signUp" href="{{url('/')}}">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
