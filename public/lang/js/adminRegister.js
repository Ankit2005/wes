$(document).ready(function () {

$('.admin-form').on('submit', function (e) {
    e.preventDefault();

    var admin_data = {
        'authorized' : 'admin_registered',
        'company_slug' : $(this).attr('slug'),
        'company_estd' : $('.company-estd').val(),
        'password' : $('.password').val().trim()
    }

    admin_data = JSON.stringify(admin_data);
    admin_data = btoa(admin_data);


    $.ajax({
        type: "PUT",
        url: "/api/company/"+admin_data,
        data: {
            _token : $('body').attr('token')
        },
        success: function (response) {
            $(".notice").html('Your Pc Is Now Successfully Registered');
        },
        error: function(xhr,error,r){
            // alert('faild ' + r);
            // console.log('error');
            // console.log(r);

            $(".notice").html('Registration Failed !');
        }
    });
});

});
