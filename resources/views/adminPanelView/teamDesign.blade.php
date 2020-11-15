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
    <link rel="stylesheet" href="lang/css/adminPanle/adminPanle.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
    @endsection

    @section('custom-js')
    <script src="lang/js/adminPanle/adminPanle.js?cache=<?php echo time(); ?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
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
                                            <a class="nav-link" href="#settings" data-toggle="tab">
                                                <i class="material-icons">cloud</i> Server
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item py-2 text-right w-100px">
                                            <a>Total : <span class="badge badge-info total-team">0</span></a>
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
                                        <p class="description text-center">Add Job Role</p>
                                        <div class="card-body">

                                            <div class="form-group bmd-form-group">
                                                <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="material-icons">face</i></div>
                                                  </div>
                                                  <input type="text" name="job_role" class="form-control job_role" placeholder="Job Role">
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
                                                <button type="submit" class="py-1 btn btn-primary btn-link btn-wd btn-lg"> Add Role
                                                    <div class="ripple-container"></div></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="settings">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value="">
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task"
                                                        class="btn btn-primary btn-link btn-sm">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove"
                                                        class="btn btn-danger btn-link btn-sm">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                checked>
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>Flooded: One year later, assessing what was lost and what was found
                                                    when a ravaging rain swept through metro Detroit
                                                </td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task"
                                                        class="btn btn-primary btn-link btn-sm">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove"
                                                        class="btn btn-danger btn-link btn-sm">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                checked>
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>Sign contract for "What are conference organizers afraid of?"</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task"
                                                        class="btn btn-primary btn-link btn-sm">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove"
                                                        class="btn btn-danger btn-link btn-sm">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

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
                        <div class="card-body">
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
                            <table class="table jobrole-table table-responsive">

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
    {{-- create team modal popup design code start --}}
    <div class="modal fade" id="createTeamModal" tabindex="-1" role="">
        <div class="modal-dialog modal-login" role="document">
            <div class="modal-content">
                <div class="card card-signup card-plain">
                    <div class="modal-header">
                        <div class="card-header card-header-primary text-center w-100 py-4">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="material-icons text-white">clear</i>
                            </button>
                            <div class="social-line">
                                <h4 class="card-title text-center">CREATE NEW TEAM</h4>
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

                        <form class="form admin-form-submit ">
                            @csrf
                            <p class="description text-center"><b
                                    class="font-weight-bold text-uppercase text-dark">Manage your employees group by
                                    creating a team such as service team, back and team and many more</b></p>
                            <div class="card-body">
                                {{-- hidden email input --}}
                                <div class="form-group bmd-form-group pb-4 d-none">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        </div>
                                        <input type="hidden" class="form-control team-creator-role"
                                            name="team_creator_role"
                                            value="{{ $_SESSION['team_creator'] }}">
                                    </div>
                                </div>

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
                            </div>
                            <div class="text-center justify-content-center">
                                <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg"> Create Team
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- create team modal popup design code end --}}
    @endsection



@endif
