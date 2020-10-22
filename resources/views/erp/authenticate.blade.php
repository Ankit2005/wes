@if (!session()->has('auth'))
<script>
    window.location = '/';
</script>
@endif


@extends('../template/default')

@section('title')
WEP ERP SOLUTIONS
@endsection


@section('custom-css')
<link rel="stylesheet" href="{{url('/')}}/lang/css/authenticate.css?cache=<?php echo time(); ?>" >
@endsection

@section('custom-js')
<script src="{{url('/')}}/lang/js/adminRegister.js"></script>
@endsection


@section('content')
{{-- <div class="page py-4">
    <div class="branding">
        <h1 class="text-white text-center">WES</h1>
        <p class="text-white text-center">WAP ERP SOLUTIONS</p>
    </div>
<div class="px-4">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" href="#admin" data-toggle="tab">ADMIN</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="#employee" data-toggle="tab">EMPLOYEE</a>
    </li>

  </ul>

  <div class="tab-content py-4">
    <div id="admin" class="active tab-pane">
        <form class="admin-form">
            <div class="form-group">
                <label>COMPANY ESTD</label>
                <input type="date" class="form-control border-0 rounded-0" name="company_estd">
            </div>

            <div class="form-group">
                <label>PASSWORD</label>
                <input type="password" class="form-control border-0 rounded-0" name="password" placeholder="******">
            </div>

            <div class="form-group mt-4">

                <button class="btn btn-danger rounded-0 float-left">
                <i class="fa fa-sign-in"></i>
                LOGIN
                </button>

                <div class="preloader">
                    <div class="spinner"></div>
                    <div class="spinner-2"></div>
                </div>
            </div>
        </form>
    </div>

    <div id="employee" class="tab-pane fade">
        <form class="employee-form">
            <div class="form-group">
                <label>USERNAME</label>
                <input type="email" class="form-control border-0 rounded-0" name="username" placeholder="employee@wes.com">
            </div>

            <div class="form-group">
                <label>PASSWORD</label>
                <input type="password" class="form-control border-0 rounded-0" name="password" placeholder="******">
            </div>

            <div class="form-group mt-4">
                <button class="btn btn-danger rounded-0 float-left">
                <i class="fa fa-sign-in"></i>
                LOGIN
                </button>

                <div class="preloader">
                    <div class="spinner"></div>
                    <div class="spinner-2"></div>
                </div>

            </div>
        </form>
    </div>


  </div>
</div>
</div> --}}


{{-- ************** NotRegistered Form Design  **************  --}}

@if (session()->get('mac_authentication') == 'NotRegistered')
<div class="card card-signup card-plain mt-4 w-50 m-auto shadow-lg position-absolute card-con">
    <div class="modal-header w-100">
      <div class="card-header card-header-primary text-center w-100">
            <h2 class="card-title ls-spacing">WES</h2>
            <h4 class="card-title">WAP ERP SOLUTIONS</h4>
      </div>
    </div>
    <div class="modal-body">

        <ul class="nav nav-pills nav-pills-primary" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist" aria-expanded="true">
                    Admin
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#link2" role="tablist" aria-expanded="false">
                    Employee
                </a>
            </li>
        </ul>
        <div class="tab-content tab-space">
            <div class="tab-pane active" id="link1" aria-expanded="true">
                <form class="admin-form" slug="{{session()->get('auth')}}">
                    @csrf
                    <div class="alert alert-warning alert-dismissible fade show mt-4 px-4 text-center" role="alert">
                        <strong class="notice" style="font-size: 19px;"><i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i> Register admin panel from your personal pc. once you register you will only access your admin panel from this PC</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="form-group col-md-12">
                            <label for="company_estd">Company Estd</label>
                            <input type="date" class="form-control company-estd" name="company_estd" id="company_estd">
                        </div>

                        <div class="form-group col-md-12 mt-4">
                            <label for="password">Password</label>
                            <input type="Password" class="form-control password" name="password" id="password" placeholder="Password">
                          </div>
                    </div>

                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-primary">REGISTER THIS PC</button>

                        {{-- <a type="submit" class="btn btn-primary btn-link btn-wd btn-lg border"><strong>REGISTER THIS PC</strong></a> --}}
                    </div>
                </form>
            </div>
            <div class="tab-pane" id="link2" aria-expanded="false">
              Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas.
              <br><br>Dramatically maintain clicks-and-mortar solutions without functional solutions.
            </div>
        </div>

    </div>

</div>
@endif

{{-- ************** Admin Form Design  **************  --}}

@if (session()->get('mac_authentication') == 'admin')
<div class="card card-signup card-plain mt-4 w-50 m-auto shadow-lg position-absolute card-con">
    <div class="modal-header w-100">
      <div class="card-header card-header-primary text-center w-100">
            <h2 class="card-title ls-spacing">WES</h2>
            <h4 class="card-title">WAP ERP SOLUTIONS</h4>
      </div>
    </div>
    <div class="modal-body">

        <ul class="nav nav-pills nav-pills-primary" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist" aria-expanded="true">
                    Admin
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#link2" role="tablist" aria-expanded="false">
                    Employee
                </a>
            </li>
        </ul>
        <div class="tab-content tab-space">
            <div class="tab-pane active" id="link1" aria-expanded="true">
                <form class="admin-form" slug="{{session()->get('auth')}}">
                    @csrf
                    {{-- <div class="alert alert-warning alert-dismissible fade show mt-4 px-4 text-center" role="alert">
                        <strong class="notice" style="font-size: 19px;"><i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i> Register admin panel from your personal pc. once you register you will only access your admin panel from this PC</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div> --}}

                    <div class="card-body">
                        <div class="form-group col-md-12">
                            <label for="company_estd">Company Estd</label>
                            <input type="date" class="form-control company-estd" name="company_estd" id="company_estd">
                        </div>

                        <div class="form-group col-md-12 mt-4">
                            <label for="password">Password</label>
                            <input type="Password" class="form-control password" name="password" id="password" placeholder="Password">
                          </div>
                    </div>

                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-primary">LOGIN</button>

                        {{-- <a type="submit" class="btn btn-primary btn-link btn-wd btn-lg border"><strong>REGISTER THIS PC</strong></a> --}}
                    </div>
                </form>
            </div>
            <div class="tab-pane" id="link2" aria-expanded="false">
              Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas.
              <br><br>Dramatically maintain clicks-and-mortar solutions without functional solutions.
            </div>
        </div>

    </div>

</div>
@endif


{{-- ************** Employee Form Design  **************  --}}

@if (session()->get('mac_authentication') == 'employee')
<div class="card card-signup card-plain mt-4 w-50 m-auto shadow-lg position-absolute card-con">
    <div class="modal-header w-100">
      <div class="card-header card-header-primary text-center w-100">
            <h2 class="card-title ls-spacing">WES</h2>
            <h4 class="card-title">WAP ERP SOLUTIONS</h4>
      </div>
    </div>
    <div class="modal-body">

        <ul class="nav nav-pills nav-pills-primary" role="tablist">
            {{-- <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist" aria-expanded="true">
                    Admin
                </a>
            </li> --}}

            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#link2" role="tablist" aria-expanded="true">
                    Employee
                </a>
            </li>
        </ul>
        <div class="tab-content tab-space">
            {{-- <div class="tab-pane active" id="link1" aria-expanded="true">

            </div> --}}
            <div class="tab-pane active" id="link2" aria-expanded="true">
                <form class="admin-form" slug="{{session()->get('auth')}}">
                    @csrf
                    {{-- <div class="alert alert-warning alert-dismissible fade show mt-4 px-4 text-center" role="alert">
                        <strong class="notice" style="font-size: 19px;"><i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i> Register admin panel from your personal pc. once you register you will only access your admin panel from this PC</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div> --}}

                    <div class="card-body">
                        <div class="form-group col-md-12">
                            <label for="company_estd">User Name</label>
                            <input type="text" class="form-control company-estd" name="company_estd" id="company_estd">
                        </div>

                        <div class="form-group col-md-12 mt-4">
                            <label for="password">Password</label>
                            <input type="Password" class="form-control password" name="password" id="password" placeholder="Password">
                          </div>
                    </div>

                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-primary">LOGIN</button>

                        {{-- <a type="submit" class="btn btn-primary btn-link btn-wd btn-lg border"><strong>REGISTER THIS PC</strong></a> --}}
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>
@endif

@endsection
