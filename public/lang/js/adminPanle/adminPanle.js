window.onload = function () {
    showAllTeams('api/team?page=1');
    $(".team-sleteton-loader").removeClass("d-none");
}


$(document).ready(function () {
    var token = $('body').attr('token');

    var tbody = document.getElementsByClassName("show-all-team")[0];
    var check_tr = tbody.getElementsByTagName("tr")[0];
    // console.log(tr);
    //     alert(tr);
    //     if(tr != <tr></tr>){
    //         alert("not found");
    //         $(".team-not-found").removeClass("d-none");
    //     }else{
    //         alert("found tr");
    //     }

    $(".admin-form-submit").submit(function (e) {

        e.preventDefault();

        const team_creator_role = $(".team-creator-role").val();
        const team_role = $(".team-role").val();
        const team_name = $(".team-name").val();
        const about_team = $(".about-team").val();

        if (team_name != "" && about_team != "") {

            $.ajax({
                type: "POST",
                url: "api/team",
                beforeSend: function () {
                    $(".team-loader").removeClass('d-none');

                },
                data: {
                    _token: token,
                    team_creator_role: team_creator_role,
                    team_role: team_role,
                    team_name: team_name,
                    about_team: about_team
                },
                success: function (response) {
                    $(".team-not-found").html('');
                    $(".team-name").val('');
                    $(".about-team").val('');
                    $(".team-loader").addClass('d-none');
                    $("#createTeamModal").modal('hide');
                    toasterOptions();
                    console.log(response);
                    toastr.success(response.notice);


                    var tr = document.createElement("TR");
                    tr.className = "border-bottom";
                    $(".show-all-team").append(tr);

                    var td = document.createElement("TD");
                    $(tr).append(td);

                    var h6 = document.createElement("H5");
                    h6.className = "mb-2 text-capitalize text-primary font-weight-normal";
                    h6.innerHTML = response.data.team_name;
                    $(td).append(h6);

                    var p = document.createElement("P");
                    p.className = "text-capitalize m-0 txt-gray";
                    p.innerHTML = response.data.about_team;
                    $(td).append(p);


                    // Create 2 TD
                    var td2 = document.createElement("TD");
                    td2.className = "float-right mt-2 border-0 d-flex w-100 justify-content-end";
                    $(tr).append(td2);

                    // create edit btn
                    var editBtn = document.createElement("BUTTON");
                    editBtn.type = "button";
                    editBtn.className = "btn btn-primary btn-link btn-sm px-0";

                    var editIcon = document.createElement("I");
                    editIcon.className = "material-icons";
                    editIcon.innerHTML = "edit";
                    $(editBtn).append(editIcon);

                    // create close btn
                    var closeBtn = document.createElement("BUTTON");
                    closeBtn.type = "button";
                    closeBtn.className = "btn btn-primary btn-link btn-sm";

                    var closeIcon = document.createElement("I");
                    closeIcon.className = "material-icons";
                    closeIcon.innerHTML = "close";
                    $(closeBtn).append(closeIcon);

                    $(td2).append(editBtn);
                    $(td2).append(closeBtn);

                },
                error: function (ajax) {
                    if (ajax.status == 500) {
                        toastr.error("somethig want rong !");
                        $(".team-loader").addClass('d-none');
                        // $("#createTeamModal").modal('hide');
                        console.log("error !");
                        toasterOptions();
                    }
                }
            });

        } else {

            toastr.error("Please Fill All Filed Frist !");
            $(".team-loader").addClass('d-none');
            // $("#createTeamModal").modal('hide');
            console.log("error !");
            toasterOptions();

        }

    });

    // ajax to get team for set role
    $(".add-role").click(function () {
        var all_opt = $(".select-team option");
        if (all_opt.length == 1) {
            getTeamName();
        }
    });

    // Add New Role Store Database
    $("#add-role-form").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "api/jobrole",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (response) {
                toastr.success(response.response);
                toasterOptions();
                $("#add-role-form")[0].reset();
                getJobroleData();
                getTeamName();
            },
            error: function (ajax) {
                if (ajax.status == 500) {
                    toastr.error("Something Went Rong !");
                    toasterOptions();
                }
            }
        });
    });

});



function showAllTeams(url) {
    $(".show-all-team").html("");

    var token = $("body").attr("token");
    $.ajax({
        type: "get",
        url: url,
        beforeSend: function () {
            //$(".team-loader").removeClass('d-none');
            $(".team-sleteton-loader").removeClass("d-none");

        },
        data: {
            _token: token,
            fetch_type: 'pagination'
        },
        success: function (r) {
            $(".team-sleteton-loader").addClass('d-none');
            $(".team-not-found").html("");

            var start = r.all_team.from;
            var end = r.all_team.last_page;
            $(".total-team").html(r.all_team.total);
            r.all_team.data.forEach((data, i) => {

                var tr = document.createElement("TR");
                tr.className = "border-bottom";
                $(".show-all-team").append(tr);

                var td = document.createElement("TD");
                $(tr).append(td);

                var h6 = document.createElement("H5");
                h6.className = "mb-2 text-capitalize text-primary font-weight-normal";
                h6.innerHTML = data.team_name;
                $(td).append(h6);

                var p = document.createElement("P");
                p.className = "text-capitalize m-0 txt-gray";
                p.innerHTML = data.about_team;
                $(td).append(p);


                // Create 2 TD
                var td2 = document.createElement("TD");
                td2.className = "float-right mt-2 border-0 d-flex w-100 justify-content-end";
                $(tr).append(td2);

                // create edit btn
                var editBtn = document.createElement("BUTTON");
                editBtn.type = "button";
                editBtn.className = "btn btn-primary btn-link btn-sm px-0";

                var editIcon = document.createElement("I");
                editIcon.className = "material-icons";
                editIcon.innerHTML = "edit";
                $(editBtn).append(editIcon);

                // create close btn
                var closeBtn = document.createElement("BUTTON");
                closeBtn.type = "button";
                closeBtn.className = "btn btn-primary btn-link btn-sm";

                var closeIcon = document.createElement("I");
                closeIcon.className = "material-icons";
                closeIcon.innerHTML = "close";
                $(closeBtn).append(closeIcon);

                $(td2).append(editBtn);
                $(td2).append(closeBtn);
            });


            // create tea team-pagination code
            var ul = document.createElement("UL");
            ul.className = "pagination pagination-con m-0";

            // if(){

            //     var previous_btn_li = document.createElement("LI");
            //     previous_btn_li.className = "page-item disabled previous-btn";

            //     const p_a = document.createElement("A");
            //     p_a.className = "page-link";
            //     p_a.href = "javascript:;";
            //     p_a.tabindex = "-1";
            //     p_a.innerHTML = "Previous";
            //     $(previous_btn_li).append(p_a);
            //     $(ul).append(previous_btn_li);
            // }


            for (let index = start; index < end; index++) {

                var li = document.createElement("LI");
                li.className = "page-item";

                var a = document.createElement("A");
                a.className = "page-link";
                a.href = "api/team?page=" + index;
                a.innerHTML = index;
                $(li).append(a);
                // get data on click
                $(a).click(function (e) {
                    e.preventDefault();
                    showAllTeams($(this).attr('href'));
                });
                $(ul).append(li);
            }
            $(".team-pagination").append(ul);
            if ($(".jobrole-table thead").hasClass('table-head') == false) {
                getJobroleData();
            }
        },
        error: function (ajax, error, response) {
            $(".team-sleteton-loader").addClass("d-none");
            console.log("team not found");
            console.log(ajax);
            console.log(response);
            $(".team-not-found").html(response);
            if ($(".jobrole-table thead").hasClass('table-head') == false) {
                getJobroleData();
            }
        }
    });
}

// get team name for select box function
function getTeamName() {
    const token = $('body').attr('token');
    $.ajax({
        type: "GET",
        url: "api/team",
        data: {
            _token: token,
            fetch_type: 'select-box'
        },
        success: function (response) {
            // select-team
            var all_team_array = [];
            response.all_team.forEach(team_list => {
                // var option = document.createElement("OPTION");
                //option.innerHTML = team_list.team_name;
                //option.value = team_list.team_name;
                all_team_array.push(team_list.team_name);
                // $(".select-team").append(option);
            });

            $("#select_team").select2({
                data: all_team_array
            });
        },
        error: function () {

        }
    });
}

// Create JobRole Table
function getJobroleData() {

    const token = $('body').attr('token');
    $.ajax({
        type: "GET",
        url: "api/jobrole",
        data: {
            _token: token,
            type: "jobrole"
        },
        beforeSend: function () {
            //$(".team-sleteton-loader").removeClass("d-none");
        },
        success: function (response) {
            // $(".team-sleteton-loader").addClass("d-none");
            $(".jobrole-table").html('');
            console.log("jobrole data");
            console.log(response);
            $(".total-jobrole").html(response.response.total);
            let data = response.response.data;
            if (data != null && data.length > 0) {

                // start create table head
                var t_head_array = ['Team Name', 'Job Role', 'salary', 'Action'];
                var thead = document.createElement("THEAD");
                thead.className = "table-head";
                var thead_tr = document.createElement("TR");
                for (let i = 0; i < t_head_array.length; i++) {
                    let th = document.createElement("TH");
                    if (t_head_array[i] == 'Team Name') {
                        $(th).attr('colspan', '2');
                    }
                    th.innerHTML = t_head_array[i];
                    $(thead_tr).append(th);
                }
                $(thead).append(thead_tr);
                $(".jobrole-table").append(thead);
                // end create table head

                // start create table body
                var tbody = document.createElement("TBODY");
                data.forEach((element, index) => {
                    var tbody_tr = document.createElement("TR");

                    // var id_td = document.createElement("TD");
                    //     id_td.className = "col-2";
                    var team_name_td = document.createElement("TD");
                    $(team_name_td).attr('colspan', '2');
                    //team_name_td.className = "col-2";
                    var jobrole_td = document.createElement("TD");
                    //jobrole_td.className = "col-2";
                    var salary_td = document.createElement("TD");
                    //salary_td.className = "col-2";
                    var action_td = document.createElement("TD");
                    //action_td.className = "col-2";

                    // id_td.innerHTML = index+1;
                    team_name_td.innerHTML = element.team_name;
                    jobrole_td.innerHTML = element.job_role;
                    salary_td.innerHTML = element.salary;
                    action_td.innerHTML = '<span class="material-icons">create </span>';

                    // $(tbody_tr).append(id_td);
                    $(tbody_tr).append(team_name_td);
                    $(tbody_tr).append(jobrole_td);
                    $(tbody_tr).append(salary_td);
                    $(tbody_tr).append(action_td);

                    $(tbody).append(tbody_tr);
                });


                $(".jobrole-table").append(tbody);

                // end create table body
            }
        },
        error: function (ajax) {
            $(".team-sleteton-loader").addClass("d-none");
        }
    });
}
