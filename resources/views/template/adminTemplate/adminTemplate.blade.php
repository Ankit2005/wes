
<!DOCTYPE html>
<html lang="en">
<head>
  <title> @yield('title') </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
 <!-- Material Dashboard CSS -->
 <!-- Required meta tags -->
 <meta charset="utf-8">
 {{-- <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' /> --}}
 <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
 <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
 <link href="{{url('/')}}/css/material-dashboard.css?v=2.1.2" rel="stylesheet"/>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
     {{-- animated.css cdn link --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">
  {{-- <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" /> --}}
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"> --}}
  <!-- CSS Files -->
  {{-- <link href="{{url('/')}}/css/material-dashboard.css?v=2.1.2" rel="stylesheet"/> --}}
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />


  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="demo/demo.css" rel="stylesheet" />
  {{-- custom css start --}}
    @yield('custom-css')
  {{-- custom css end --}}

</head>
<body token="{{csrf_token()}}" class="">
    <div class="wrapper main-layout">

        {{-- sidebar start --}}
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="img/sidebar-1.jpg">
              <!--
                Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

                Tip 2: you can also add an image using data-image tag
            -->
          <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
              Admin Penale
            </a></div>
          <div class="sidebar-wrapper">
            <ul class="nav">
              <li class="nav-item active  ">
                <a class="nav-link" href="{{url('/admin')}}">
                  <i class="material-icons">dashboard</i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="{{url('/admin')}}">
                  <i class="material-icons">person</i>
                  <p>Team Design</p>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="./tables.html">
                  <i class="material-icons">content_paste</i>
                  <p>Table List</p>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="./typography.html">
                  <i class="material-icons">library_books</i>
                  <p>Typography</p>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="./icons.html">
                  <i class="material-icons">bubble_chart</i>
                  <p>Icons</p>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="./map.html">
                  <i class="material-icons">location_ons</i>
                  <p>Maps</p>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="./notifications.html">
                  <i class="material-icons">notifications</i>
                  <p>Notifications</p>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="./rtl.html">
                  <i class="material-icons">language</i>
                  <p>RTL Support</p>
                </a>
              </li>
              <li class="nav-item active-pro ">
                <a class="nav-link" href="./upgrade.html">
                  <i class="material-icons">unarchive</i>
                  <p>Upgrade to PRO</p>
                </a>
              </li>
            </ul>
          </div>
        </div>
        {{-- sidebar end --}}

        <div class="main-panel">
        <!-- Start Navbar -->
        <nav class="navbar navbar-expand-lg topbar-fix">
            <div class="container-fluid">
            <div class="navbar-wrapper">
                <a class="navbar-brand" href="javascript:">@yield('activePageName')</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon    icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
                <div class="mr-4">
                    <div class="togglebutton">
                        <label>
                          <input id="switch" class="dark-mode-swithch" type="checkbox">
                            <span class="toggle"></span>
                               Dark Mode off
                        </label>
                    </div>
                </div>
                <form class="navbar-form">

                <div class="input-group no-border">
                    <input type="text" value="" class="form-control" placeholder="Search...">
                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                    <i class="material-icons">search</i>
                    <div class="ripple-container"></div>
                    </button>
                </div>
                </form>
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="javascript:;">
                    <i class="material-icons">dashboard</i>
                    <p class="d-lg-none d-md-block">
                        Stats
                    </p>
                    </a>
                </li>
                <li class="nav-item" id="openMPopup" data-toggle="modal" data-target="#createTeamModal">
                    <a class="nav-link" href="javascript:;" >
                    <i class="material-icons" data-toggle="tooltip" data-placement="top" title="Create Team">control_point</i>
                    <p class="d-lg-none d-md-block">
                        Stats
                    </p>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">notifications</i>
                    <span class="notification">5</span>
                    <p class="d-lg-none d-md-block">
                        Some Actions
                    </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Mike John responded to your email</a>
                    <a class="dropdown-item" href="#">You have 5 new tasks</a>
                    <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                    <a class="dropdown-item" href="#">Another Notification</a>
                    <a class="dropdown-item" href="#">Another One</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">person</i>
                    <p class="d-lg-none d-md-block">
                        Account
                    </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Log out</a>
                    </div>
                </li>
                </ul>
            </div>
            </div>
        </nav>
       <!-- End Navbar -->
            @yield('content')
        </div>
        @yield('createTeamModal')
        @yield('simple-skeleton-loader')
    </div>


  <script src="{{url('/')}}/js/core/jquery.min.js"></script>
  <script src="{{url('/')}}/js/core/popper.min.js"></script>
  <script src="{{url('/')}}/js/core/bootstrap-material-design.min.js"></script>
  <script src="{{url('/')}}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="{{url('/')}}/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="{{url('/')}}/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="{{url('/')}}/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="{{url('/')}}/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="{{url('/')}}/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="{{url('/')}}/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="{{url('/')}}/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="{{url('/')}}/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="{{url('/')}}/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="{{url('/')}}/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="{{url('/')}}/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{url('/')}}/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="{{url('/')}}/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  {{-- <script src="{{url('/')}}/js/plugins/chartist.min.js"></script> --}}
  <!--  Notifications Plugin    -->
  <script src="{{url('/')}}/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->

  <script src="{{url('/')}}/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>

  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  {{-- <script src="demo/demo.js"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
  <script src="{{url('/')}}/js/main.js"></script>

  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
          // tostar service code start
    function toasterOptions() {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "100",
            "hideDuration": "1000",
            "timeOut": "4000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "",
            "showMethod": "show",
            "hideMethod": "hide"
        }
    }
    // tostar service code end
    </script>
      {{-- custom js start --}}
      @yield('custom-js')
      {{-- custom js end --}}

</body>
</html>
