$(document).ready(function () {
    // slide on next
    $(document).ready(function(){
        $(".step-1-next-btn").click(function(e){
            e.preventDefault();
            empty_field_validation("step-1","step-2");
        });


        $(".step-2-next-btn").click(function(e){
            e.preventDefault();
            empty_field_validation("step-2","step-3");
        });

        $(".step-3-next-btn").click(function(e){
            e.preventDefault();
            empty_field_validation("step-3","step-4");

        });
    });


    // validate on next click
    function empty_field_validation(first_class,second_class){

        var container = document.getElementsByClassName(first_class)[0];
        var input = container.getElementsByClassName("required");
        var url = container.getElementsByClassName("url");
        var tmp = [];
        $(input).each(function(i){
            if($(this).val().trim() == "")
            {
                if(this.nextSibling.nodeName == "SPAN")
                {
                    this.nextSibling.remove();
                }

                $(this).addClass("border-danger");
                $("<span class='text-danger required-notice float-left mx-1'><i class='fa fa-warning'></i> This field can`t be empty</span>").insertAfter(this);
            }
            else{
                tmp[i] = $(this).val().trim();
                if(this.type == "email")
                {
                    validate_email(this);
                }
            }
        });

        // validate url field
        $(url).each(function(){
            if($(this).val().trim() != "")
            {
                validate_url(this);
            }
        });

        // slide if all required field is not empty
        if(tmp.length == input.length && $(".required-notice").length == 0)
        {
            $("."+first_class).addClass("d-none");
            $("."+second_class).removeClass("d-none");
            $("."+second_class).addClass("animate__animated animate__slideInRight");
        }

        // remove required message on input
        $(input).each(function(){
            $(this).on("input",function(){
                if(this.nextSibling.nodeName == "SPAN")
                {
                    $(this).removeClass("border-danger");
                    this.nextSibling.remove();
                }
            });
        });


        // remove url message on input
        $(url).each(function(){
            $(this).on("input",function(){
                if(this.nextSibling.nodeName == "SPAN")
                {
                    $(this).removeClass("border-danger");
                    this.nextSibling.remove();
                }
            });
        });

    }

    // validate email
    function validate_email(input)
    {
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if(!reg.test(input.value))
        {
            if(input.nextSibling.nodeName == "SPAN")
                {
                    input.nextSibling.remove();
                }

                $(this).addClass("border-danger");
                $("<span class='text-danger required-notice float-left mx-1'><i class='fa fa-warning'></i> Enter a valid email</span>").insertAfter(input);
        }
    }

    // validate url
    function validate_url(input)
    {
        var reg = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;

        if(!reg.test(input.value))
        {
            if(input.nextSibling.nodeName == "SPAN")
                {
                    input.nextSibling.remove();
                }

                $(this).addClass("border-danger");
                $("<span class='text-danger required-notice float-left mx-1'><i class='fa fa-warning'></i> Enter a valid url</span>").insertAfter(input);
        }
    }

    // slide on back
    $(document).ready(function(){
        $(".step-2-back-btn").click(function(e){
            e.preventDefault();

            $(".step-2").addClass("d-none");
            $(".step-1").removeClass("d-none");
        });

        $(".step-3-back-btn").click(function(e){
            e.preventDefault();

            $(".step-3").addClass("d-none");
            $(".step-2").removeClass("d-none");
        });

        $(".step-4-back-btn").click(function(e){
            e.preventDefault();

            $(".step-4").addClass("d-none");
            $(".step-3").removeClass("d-none");
        });
    });

});
