<?php
session_start();
?>

@if(!isset($_SESSION['Authenticated']))
    <script>
        window.location = '/404';
    </script>
@else

    @extends('../template.adminTemplate.adminTemplate');
    {{-- @extends('../skeleton_loader.loader'); --}}
    @section('title')
    Team Design
    @endsection

    @section('activePageName')
    Team Design Page
    @endsection

    @section('custom-css')
    <link rel="stylesheet" href="lang/css/adminPanle/adminPanle.scss">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" /> --}}
    @endsection

    @section('custom-js')
    <script src="lang/js/adminPanle/adminPanle.js?cache=<?php echo time(); ?>"></script>

    <script type="text/javascript">


    @endsection


    @section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-primary">
                            <div class="nav-tabs-navigation">

                                <div class="nav-tabs-wrapper">
                                    <button class="btn btn-primary createteam" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                        Button with data-target
                                    </button>
                                    <div class="collapse" id="collapseExample">
                                    <div class="">
                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#profile" data-toggle="tab">
                                                    <i class="material-icons">groups</i> Team List
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link add-role" href="#addRole" data-toggle="tab">
                                                    <i class="material-icons">add</i> Add Role
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#ceateTeam" data-toggle="tab">
                                                    <i class="material-icons">cloud</i> Add New Team
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                            <li class="nav-item py-2 text-right">
                                                <a class="pl-2">Total : <span class="badge badge-info total-team">0</span></a>
                                            </li>

                                        </ul>
                                    </div>
                                    </div>
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#profile" data-toggle="tab">
                                                <i class="material-icons">groups</i> Team List
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link add-role" href="#addRole" data-toggle="tab">
                                                <i class="material-icons">add</i> Add Role
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#ceateTeam" data-toggle="tab">
                                                <i class="material-icons">cloud</i> Add New Team
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item py-2 text-right">
                                            <a class="pl-2">Total : <span class="badge badge-info total-team">0</span></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body position-relative">
                            <div class="tab-content">
                                <div class="tab-pane active" id="profile">
                                    {{-- loadder desing code START --}}
                                         <div class="ph-item p-0 py-2 border-0 team-sleteton-loader ">
                                            <div class="ph-col-12 ">
                                                <div class="ph-row">
                                                    <div class="ph-col-6 big"></div>
                                                    <div class="ph-col-4 empty big"></div>
                                                    <div class="ph-col-2 big"></div>
                                                    <div class="ph-col-4"></div>
                                                    <div class="ph-col-8 empty"></div>

                                                </div>
                                                <div class="ph-row">
                                                    <div class="ph-col-6 big"></div>
                                                    <div class="ph-col-4 empty big"></div>
                                                    <div class="ph-col-2 big"></div>
                                                    <div class="ph-col-4"></div>
                                                    <div class="ph-col-8 empty"></div>

                                                </div>
                                                <div class="ph-row">
                                                    <div class="ph-col-6 big"></div>
                                                    <div class="ph-col-4 empty big"></div>
                                                    <div class="ph-col-2 big"></div>
                                                    <div class="ph-col-4"></div>
                                                    <div class="ph-col-8 empty"></div>

                                                </div>
                                                <div class="ph-row">
                                                    <div class="ph-col-6 big"></div>
                                                    <div class="ph-col-4 empty big"></div>
                                                    <div class="ph-col-2 big"></div>
                                                    <div class="ph-col-4"></div>
                                                    <div class="ph-col-8 empty"></div>

                                                </div>
                                                <div class="ph-row">
                                                    <div class="ph-col-6 big"></div>
                                                    <div class="ph-col-4 empty big"></div>
                                                    <div class="ph-col-2 big"></div>
                                                    <div class="ph-col-4"></div>
                                                    <div class="ph-col-8 empty"></div>
                                                </div>
                                            </div>
                                        </div>
                                    {{-- loadder desing code END --}}
                                    <table class="table ">
                                        <tbody class="show-all-team">
                                            <span class="text-center m-0 team-not-found d-block"> </span>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="addRole">

                                    <form class="form" id="add-role-form">
                                        @csrf
                                        <p class="description text-center m-0">Add Job Role</p>
                                        <div class="card-body">

                                            <div class="form-group bmd-form-group d-none">
                                                <div class="input-group d-none">
                                                  <input type="text" name="job_role_id" class="form-control job_role_id">
                                                </div>
                                            </div>
                                            <div class="form-group bmd-form-group">
                                                <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="material-icons">face</i></div>
                                                  </div>
                                                  <input type="text" name="job_role" class="form-control job_role" placeholder="Job Role">
                                                </div>
                                            </div>

                                             {{-- qualification input --}}
                                                <div class="form-group bmd-form-group pb-4">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text"><i class="material-icons">school</i></div>
                                                        </div>
                                                        <input type="text" name="qualification" class="form-control qualification"
                                                            placeholder="Enter Qualification">
                                                    </div>
                                                </div>

                                                {{-- certification input --}}
                                                <div class="form-group bmd-form-group pb-4">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text"><i class="material-icons">receipt</i></div>
                                                        </div>
                                                        <input type="text" name="certification" class="form-control certification"
                                                            placeholder="Enter Certification">
                                                    </div>
                                                </div>

                                                {{-- experience input --}}
                                                <div class="form-group bmd-form-group pb-4">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text"><i class="material-icons">receipt_long</i></div>
                                                        </div>
                                                        <input type="text" name="experience" class="form-control experience"
                                                            placeholder="Enter Experience">
                                                    </div>
                                                </div>

                                            <div class="form-group bmd-form-group">
                                                <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="material-icons">payments</i></div>
                                                  </div>
                                                  <input type="number" name="salary" class="form-control" placeholder="Salary">
                                                </div>
                                            </div>
                                            <div class="px-4 ml-3">
                                                    <select id="select_team" name="team_name" class="stom-select select-team w-100" >
                                                        <option value="no-team">Part Of Any Team</option>
                                                    </select>
                                            </div>

                                            <div class="text-center w-100 my-2">
                                                <button type="submit" class="py-1 btn btn-primary btn-link btn-wd btn-lg add-role-btn" role="insert"> Add Role
                                                    <div class="ripple-container"></div></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="ceateTeam">
                                    <form class="form createTeam-form-submit ">
                            @csrf
                            <p class="description text-center"><b
                                    class="font-weight-bold text-uppercase text-dark">Manage your employees group by
                                    creating a team such as service team, back and team and many more</b></p>
                            <div class="card-body">

                                {{-- hidden role input --}}
                                <div class="form-group bmd-form-group pb-4 d-none ">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        </div>
                                        <input type="hidden" class="form-control team-role" name="team_role"
                                            value="{{ $_SESSION['team_role'] }}"
                                            placeholder="Enter Team Name">
                                    </div>
                                </div>

                                {{-- team name input --}}
                                <div class="form-group bmd-form-group pb-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="material-icons">face</i></div>
                                        </div>
                                        <input type="text" name="team_name" class="form-control team-name"
                                            placeholder="Enter Team Name">
                                    </div>
                                </div>

                                {{-- about team textarea --}}
                                <div class="form-group bmd-form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="material-icons">perm_identity</i>
                                            </div>
                                        </div>
                                        <textarea class="form-control about-team" name="about_team"
                                            id="exampleFormControlTextarea1" placeholder="Describe Somethig About Team."
                                            rows="1"></textarea>
                                    </div>
                                </div>

                                 {{-- hidden team_creator_role input --}}
                                 <div class="form-group bmd-form-group pb-4 d-none">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        </div>
                                        <input type="hidden" class="form-control team-creator-role"
                                            name="team_creator_role"
                                            value="{{ $_SESSION['team_creator'] }}">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center justify-content-center">
                                <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg"> Create Team
                                </button>
                            </div>
                        </form>

                                </div>
                            </div>
                            <div class="card-footer m-0">
                            <div class="stats">
                                <nav class="team-pagination" aria-label="..."></nav>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="card card-chart">
                        <div class="card-header card-header-success">
                            <div class="d-flex justify-content-between">
                                <div class="ct-chart" id="dailySalesChart">jobe Role</div>
                                <div class="">
                                    <a>Total : <span class="badge badge-info total-jobrole">0</span><div class="ripple-container"></div></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body jobrole-table-card-body">
                              {{-- loadder desing code START --}}
                                <div class="ph-item p-0 py-2 border-0 team-sleteton-loader ">
                                    <div class="ph-col-12 ">
                                        <div class="ph-row">
                                            <div class="ph-col-6 big"></div>
                                            <div class="ph-col-4 empty big"></div>
                                            <div class="ph-col-2 big"></div>
                                            <div class="ph-col-4"></div>
                                            <div class="ph-col-8 empty"></div>
                                        </div>
                                        <div class="ph-row">
                                            <div class="ph-col-6 big"></div>
                                            <div class="ph-col-4 empty big"></div>
                                            <div class="ph-col-2 big"></div>
                                            <div class="ph-col-4"></div>
                                            <div class="ph-col-8 empty"></div>

                                        </div>
                                        <div class="ph-row">
                                            <div class="ph-col-6 big"></div>
                                            <div class="ph-col-4 empty big"></div>
                                            <div class="ph-col-2 big"></div>
                                            <div class="ph-col-4"></div>
                                            <div class="ph-col-8 empty"></div>

                                        </div>
                                        <div class="ph-row">
                                            <div class="ph-col-6 big"></div>
                                            <div class="ph-col-4 empty big"></div>
                                            <div class="ph-col-2 big"></div>
                                            <div class="ph-col-4"></div>
                                            <div class="ph-col-8 empty"></div>

                                        </div>
                                    </div>
                                </div>
                                {{-- loadder desing code END --}}
                            <table class="table jobrole-table">

                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">access_time</i> updated 4 minutes ago
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">content_copy</i>
                            </div>
                            <p class="card-category">Used Space</p>
                            <h3 class="card-title">49/50
                                <small>GB</small>
                            </h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-danger">warning</i>
                                <a href="javascript:;">Get More Space...</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">store</i>
                            </div>
                            <p class="card-category">Revenue</p>
                            <h3 class="card-title">$34,245</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">date_range</i> Last 24 Hours
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">info_outline</i>
                            </div>
                            <p class="card-category">Fixed Issues</p>
                            <h3 class="card-title">75</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">local_offer</i> Tracked from Github
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="fa fa-twitter"></i>
                            </div>
                            <p class="card-category">Followers</p>
                            <h3 class="card-title">+245</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">update</i> Just Updated
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card card-chart">
                        <div class="card-header card-header-success">
                            <div class="ct-chart" id="dailySalesChart"></div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Daily Sales</h4>
                            <p class="card-category">
                                <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in
                                today sales.</p>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">access_time</i> updated 4 minutes ago
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-chart">
                        <div class="card-header card-header-warning">
                            <div class="ct-chart" id="websiteViewsChart"></div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Email Subscriptions</h4>
                            <p class="card-category">Last Campaign Performance</p>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">access_time</i> campaign sent 2 days ago
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-chart">
                        <div class="card-header card-header-danger">
                            <div class="ct-chart" id="completedTasksChart"></div>
                        </div>
                        <div class="card-body">

                            <h4 class="card-title">Completed Tasks</h4>
                            <p class="card-category">Last Campaign Performance</p>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">access_time</i> campaign sent 2 days ago
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <footer class="footer">
        <div class="container-fluid">
            <nav class="float-left">
                <ul>
                    <li>
                        <a href="https://www.creative-tim.com">
                            Creative Tim
                        </a>
                    </li>
                    <li>
                        <a href="https://creative-tim.com/presentation">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="http://blog.creative-tim.com">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="https://www.creative-tim.com/license">
                            Licenses
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright float-right">
                &copy;
                <script>
                    document.write(new Date().getFullYear())

                </script>, made with <i class="material-icons">favorite</i> by
                <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
            </div>
        </div>
    </footer>

    @endsection


    @section('createTeamModal')
    {{-- Add New Employee modal popup design code start --}}
    <div class="modal fade ctm " id="createTeamModal" tabindex="-1" role="" >
        <div class="modal-dialog modal-lg modal-login" role="document">
            <div class="modal-content">
                <div class="card card-signup card-plain">
                    <div class="modal-header">
                        <div class="card-header card-header-primary text-center w-100 py-4">
                            <button type="button" class="close" id="closeEmpPopup" data-dismiss="modal" aria-hidden="true">
                                <i class="material-icons text-white">clear</i>
                            </button>
                            <div class="social-line">
                                <h4 class="card-title text-center">Add New Employee</h4>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        {{-- loadder desing code START --}}
                        <div class="lds-ripple team-loader d-none">
                            <div></div>
                            <div></div>
                        </div>
                        {{-- loadder desing code END --}}

                    <form id="add-employee" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-3">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class=" avtar-dumy-img ">
                                        <img src="http://style.anu.edu.au/_anu/4/images/placeholders/person_8x10.png" class="w-100"  rel="nofollow" alt="...">
                                    </div>

                                    <div class="fileinput-preview fileinput-exists emp-img thumbnail img-raised"></div>
                                    <div class="d-flex">
                                        <span class="btn-raised  btn-default btn-file">
                                            <span class="fileinput-new text-primary choose-img">
                                                <span class="material-icons"> add_circle_outline </span>
                                            </span>
                                            <span class="fileinput-exists text-primary">Change</span>
                                            <input type="file" accept="image/*" name="emp_img" id="emp_img_select"  />
                                            <small class="file-name mx-2"></small>
                                            <input type="file" name="emp_img" id="emp_img_select"  />
                                        </span>
                                        {{--  <a href="#pablo" class="btn btn-danger remove-img-btn btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>--}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-9">
                                <div class="form-group bmd-form-group pb-4">
                                    <div class="input-group">
                                        <input type="text" name="emp_name" class="form-control team-name"
                                            placeholder="Employee Name">
                                    </div>
                                </div>
                                <div class="form-group bmd-form-group pb-4">
                                    {{--  <label for="exampleFormControlSelect1">Select Job Role</label>--}}
                                    <select name="job_role" class="form-control" id="select-jobRole">

                                     </select>
                                     <input type="hidden" name="job_role_salary" class="job_role_salary" value="0">
                                </div>

                               <div class="form-group bmd-form-group pb-4">
                                    <div class="input-group">
                                        <input type="text" name="designation" class="form-control Designation"
                                            placeholder="Designation">
                                    </div>
                                </div>
                                <div class="form-group bmd-form-group pb-4">
                                    <div class="input-group">
                                        <input type="text" name="department" class="form-control Department"
                                            placeholder="Department">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-4">
                                <div class="form-group  emp-file-upload">
                                    <input type="file" accept="image/*" name="residential_proof" multiple="" class="inputFileHidden emp-proof-upload">
                                    <small class="file-name"></small>
                                    <div class="input-group">
                                        <input type="text" class="form-control inputFileVisible" placeholder="Residential Proof">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-fab btn-round btn-primary">
                                                <i class="material-icons">apartment</i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group  emp-file-upload">
                                    <input type="file" accept="image/*" name="qualification_proof" multiple="" class="inputFileHidden emp-proof-upload">
                                    <small class="file-name"></small>
                                    <div class="input-group">
                                        <input type="text" class="form-control inputFileVisible" placeholder="Qualification Proof">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-fab btn-round btn-primary">
                                                <i class="material-icons">school</i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group emp-file-upload">
                                    <input type="file" accept="image/*" name="certification_proof" multiple="" class=" emp-proof-upload">
                                    <small class="file-name"></small>
                                    <div class="input-group">
                                        <input type="text" class="form-control " placeholder="Certification Proof">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-fab btn-round btn-primary">
                                                <i class="material-icons">card_membership</i>
                                        <input type="text" name="Department" class="form-control Department"
                                            placeholder="Department">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-4">
                                <div class="form-group  emp-file-upload">
                                    <input type="file" name="residential_proof" multiple="" class="inputFileHidden emp-proof-upload">
                                    <div class="input-group">
                                        <input type="text" class="form-control inputFileVisible" placeholder="Residential Proof">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-fab btn-round btn-primary">
                                                <i class="material-icons">apartment</i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group  emp-file-upload">
                                    <input type="file" name="qualification_proof" multiple="" class="inputFileHidden emp-proof-upload">
                                    <div class="input-group">
                                        <input type="text" class="form-control inputFileVisible" placeholder="Qualification Proof">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-fab btn-round btn-primary">
                                                <i class="material-icons">school</i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group emp-file-upload">
                                    <input type="file" name="certification_proof" multiple="" class=" emp-proof-upload">
                                    <div class="input-group">
                                        <input type="text" class="form-control " placeholder="Certification Proof">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-fab btn-round btn-primary">
                                                <i class="material-icons">card_membership</i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-12 col-md-6">
                                <div class="form-group bmd-form-group pb-4">
                                    <div class="input-group">
                                        <input type="text" name="contact" class="form-control team-name"
                                            placeholder="Contact">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group bmd-form-group pb-4">
                                    <div class="input-group">
                                        <input type="text" name="email" class="form-control team-name"
                                            placeholder="Email">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <div class="form-group bmd-form-group pb-4">
                                    <div class="input-group">
                                        <input type="text" name="region" class="form-control team-name"
                                            placeholder="Region">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group bmd-form-group pb-4">
                                    <div class="input-group">
                                        <input type="text" name="street_address" class="form-control street_address"
                                            placeholder="Street Address">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <div class="form-group bmd-form-group pb-4">
                                    <div class="input-group">
                                        <input type="text" name="city" class="form-control city-name"
                                            placeholder="City">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group bmd-form-group pb-4">
                                    <div class="input-group">
                                        <input type="text" name="pincode" class="form-control pincode"
                                            placeholder="Picode">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group bmd-form-group pb-4">
                                    <div class="input-group">
                                        <input type="text" name="state" class="form-control state-name"
                                            placeholder="State">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <div class="form-group bmd-form-group pb-4">
                                    <div class="input-group">
                                        <input type="text" name="city" class="form-control city-name"
                                            placeholder="City">
                                        <input type="text" name="country" class="form-control country-name"
                                            placeholder="Country">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <div class="form-group bmd-form-group pb-4">
                                    <div class="input-group">
                                        <input type="text" name="region" class="form-control team-name"
                                            placeholder="Region">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group bmd-form-group pb-4">
                                    <div class="input-group">
                                        <input type="text" name="pincode" class="form-control pincode"
                                            placeholder="Picode">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group bmd-form-group pb-4">
                                    <div class="input-group">
                                        <input type="text" name="state" class="form-control state-name"
                                            placeholder="State">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group bmd-form-group pb-4">
                                    <div class="input-group">
                                        <input type="text" name="country" class="form-control country-name"
                                            placeholder="Country">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <label class="mb-1">Gender</label>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-check mt-0 form-check-radio">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="emp_gender" id="exampleRadios1" value="male" checked>
                                                Male
                                                <span class="circle">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="form-check mt-0 form-check-radio">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="emp_gender" id="exampleRadios2" value="female" >
                                                Female
                                                <span class="circle">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group bmd-form-group pb-4">
                                    <label>Birth Date</label>
                                    <div class="input-group">
                                        <input type="date" name="emp_birth_date" class="form-control team-name"
                                            placeholder="Birth Date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group bmd-form-group pb-4">
                                    <label>Hire Date</label>
                                    <div class="input-group">
                                        <input type="date" name="emp_hire_date" class="form-control team-name"
                                            placeholder="Hire Date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input last-job-details-checkbox"  type="checkbox" value="">
                                        Last Job Details
                                        <span class="form-check-sign">
                                            <span class="check" data-toggle="collapse" data-target="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                    <div class="card card-body">
                                        <h5 class="text-center"><b>You Worked Any Where Before</b></h5>
                                        <div class="row emp-prev-job-details-form">
                                            <div class="col-12 col-md-6">
                                                <div class="form-group bmd-form-group pb-4">
                                                    <div class="input-group">
                                                        <input type="text" name="prev_company_name" class="form-control prev-company-name"
                                                            placeholder="Company Name">
                                                    </div>
                                        <div class="col-12">
                                            <div class="form-group bmd-form-group pb-4">
                                                <div class="input-group">
                                                    <input type="text" name="department" class="form-control team-name"
                                                        placeholder="Department">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group bmd-form-group pb-4">
                                                    <div class="input-group">
                                                        <input type="text" name="emp_experience" class="form-control experience"
                                                            placeholder="Experience">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group bmd-form-group pb-4">
                                                    <div class="input-group">
                                                        <input type="text" name="prev_salary" class="form-control prev-salary"
                                                            placeholder="Salary">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="">
                                                    <div class="form-group form-file-upload form-file-multiple is-focused">
                                                        <input type="file" accept="image/*" name="prev_salary_sleep" multiple="" class="inputFileHidden upload-salary-sleep">
                                                        <small class="file-name"></small>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control inputFileVisible" placeholder="Upload Last 4 Salary Slip (Multiple Files)" multiple>
                                                            <span class="input-group-btn">
                                                                <button type="button" class="btn btn-fab btn-round btn-info">
                                                                    <i class="material-icons">layers</i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Add New Employee modal popup design code end --}}
    @endsection
@endif
