$(document).ready(function () {
    // slide on next
    $(document).ready(function () {
        $(".step-1-next-btn").click(function (e) {
            e.preventDefault();
            empty_field_validation("step-1", "step-2");
        });

        $(".step-2-next-btn").click(function (e) {
            e.preventDefault();
            empty_field_validation("step-2", "step-3");
        });

        $(".step-3-next-btn").click(function (e) {
            e.preventDefault();
            empty_field_validation("step-3", "step-4");
        });
        
    });

    // validate on next click
    function empty_field_validation(first_class, second_class) {

        var container = document.getElementsByClassName(first_class)[0];
        var input = container.getElementsByClassName("required");
        var url = container.getElementsByClassName("url");
        var tmp = [];
        $(input).each(function (i) {
            if ($(this).val().trim() == "") {
                if (this.nextSibling.nodeName == "SPAN") {
                    this.nextSibling.remove();
                }

                $(this).addClass("border-danger");
                $("<span class='text-danger required-notice float-left mx-1'><i class='fa fa-warning'></i> This field can`t be empty</span>").insertAfter(this);
            }
            else {
                tmp[i] = $(this).val().trim();
                if (this.type == "email") {
                    validate_email(this);
                }
            }
        });

        // validate url field
        $(url).each(function () {
            if ($(this).val().trim() != "") {
                validate_url(this);
            }
        });

        // slide if all required field is not empty
        if (tmp.length == input.length && $(".required-notice").length == 0) {
            company_valudition(first_class, second_class);
        }

        // remove required message on input
        $(input).each(function () {
            $(this).on("input", function () {
                if (this.nextSibling.nodeName == "SPAN") {
                    $(this).removeClass("border-danger");
                    this.nextSibling.remove();
                }
            });
        });

        // remove url message on input
        $(url).each(function () {
            $(this).on("input", function () {
                if (this.nextSibling.nodeName == "SPAN") {
                    $(this).removeClass("border-danger");
                    this.nextSibling.remove();
                }
            });
        });

    }

    // validate email
    function validate_email(input) {
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (!reg.test(input.value)) {
            if (input.nextSibling.nodeName == "SPAN") {
                input.nextSibling.remove();
            }

            $(this).addClass("border-danger");
            $("<span class='text-danger required-notice float-left mx-1'><i class='fa fa-warning'></i> Enter a valid email</span>").insertAfter(input);
        }
    }

    // validate url
    function validate_url(input) {
        var reg = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;

        if (!reg.test(input.value)) {
            if (input.nextSibling.nodeName == "SPAN") {
                input.nextSibling.remove();
            }

            $(this).addClass("border-danger");
            $("<span class='text-danger required-notice float-left mx-1'><i class='fa fa-warning'></i> Enter a valid url</span>").insertAfter(input);
        }
    }

    // company name validations

    function company_valudition(first_class, second_class) {
        const cmp_name_input = document.querySelector('.cmp-name');
        const cmp_name = $(".cmp-name").val().trim();
        const cmp_slug = cmp_name.replace(/ /g, '');
        // var query = {
        //     column_name : 'company_name',
        //     data: cmp_name.replace(/ /g,"")
        // }


        //    query = btoa(JSON.stringify(query));

        $(".erp-url").val(window.location + 'erp/' + cmp_slug);
        $(".company-slug").val(cmp_slug);

        $.ajax({
            type: "get",
            url: "/erp/" + cmp_slug,
            data: {
                _token: $("body").attr('token')
            },
            success: function (response) {
                //alert(cmp_name + " Is All Ready Use ");

                if (cmp_name_input.nextSibling.nodeName == "SPAN") {
                    cmp_name_input.nextSibling.remove();
                }

                $(cmp_name_input).addClass("border-danger");
                $("<span class='text-danger required-notice float-left mx-1'><i class='fa fa-warning'></i> This Name Is Allready Exitce </span>").insertAfter(cmp_name_input);
            },
            error: function (response) {

                if (cmp_name_input.nextSibling.nodeName == "SPAN") {
                    cmp_name_input.nextSibling.remove();
                }

                $(".password").val(password_generator());
                $("." + first_class).addClass("d-none");
                $("." + second_class).removeClass("d-none");
                $("." + second_class).addClass("animate__animated animate__slideInRight");
            }
        });

        // $("." + first_class).addClass("d-none");
        // $("." + second_class).removeClass("d-none");
        // $("." + second_class).addClass("animate__animated animate__slideInRight");
    }


    // password generator

    function password_generator() {
        var charset = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
        var pass = ' ';
        for (let index = 0; index < 8; index++) {
            var j = Math.floor(Math.random() * charset.length - 1);
            pass += charset[j];
        }
        // (@(a-r8l
        return pass;
    }

    // slide on back

    $(".step-2-back-btn").click(function (e) {
        e.preventDefault();

        $(".step-2").addClass("d-none");
        $(".step-1").removeClass("d-none");
    });

    $(".step-3-back-btn").click(function (e) {
        e.preventDefault();

        $(".step-3").addClass("d-none");
        $(".step-2").removeClass("d-none");
    });

    $(".step-4-back-btn").click(function (e) {
        e.preventDefault();

        $(".step-4").addClass("d-none");
        $(".step-3").removeClass("d-none");
    });


    var testForm = document.getElementById('register_form');
    // testForm.onsubmit = function(event) {
    //   event.preventDefault();

    //   var request = new XMLHttpRequest();
    //   // POST to httpbin which returns the POST data as JSON
    //   request.open('POST', 'https://httpbin.org/post', /* async = */ false);

    //   var formData = new FormData(document.getElementById('register_form'));
    //   request.send(formData);

    //   console.log("test form response");
    //   console.log(request.response);

    // }
});

