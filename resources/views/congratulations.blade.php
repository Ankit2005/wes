@extends('auth_layout.auth_template')


<!DOCTYPE html>
<html lang="en">
<head>
  <title> @yield('title') </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../lang/css/account.css?cache=<?php echo time() ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
</head>
<body class="m-0">

    <div class="container" id="container">
        <div class="form-container sign-in-container">
                <img src="..\img\congratulations.jpg" class="w-100" alt="congratulations">
        </div>
        <div class="overlay-container d-none d-md-block">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1 class="text-center congrs-text">congratulations</h1>
                    
                    <h1>{{$notice}}</h1>
                    {{-- <h6 class="text-center my-2 txt-light">Your Data Is Successfully Inserted <br> Please Login Your Account</h6> --}}
                    {{-- <p>Enter your personal details and start journey with us</p> --}}
                    <a class="ghost btn" id="signIn" href="{{url('login')}}">Sign In</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <script src="../js/core/jquery.min.js"></script>
  <script src="../js/core/popper.min.js"></script>
  <script src="../js/core/bootstrap-material-design.min.js"></script>
  <script src="../js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="../lang/js/account.js?cache=<?php echo time() ?>"></script>
</body>
</html>
