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
  <link rel="stylesheet" href="lang/css/account.css?cache=<?php echo time() ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
</head>
<body class="m-0" token="{{csrf_token()}}">


    @yield('login')
    @yield('register')


    @yield('congratulations')


  {{-- <script src="js/core/jquery.min.js"></script> --}}
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
  <script src="js/core/popper.min.js"></script>
  <script src="js/core/bootstrap-material-design.min.js"></script>
  <script src="js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="lang/js/account.js?cache=<?php echo time() ?>"></script>
</body>
</html>
