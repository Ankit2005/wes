
$(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('select').select2({ width: '100%', placeholder: "Select an Option", allowClear: true });
    $(".select-product").on("change", function () {
        let selectedValue = $(this).val();
        if (selectedValue == 'Physical Product') {
            $(".phsical-product").removeClass('d-none');
            $(".digital-product").addClass('d-none');
        }
        if (selectedValue == 'Digital Product') {
            $(".digital-product").removeClass('d-none');
            $(".phsical-product").addClass('d-none');
        }
    });

    // show product image
    $(".product-images").change(function (e) {
        e.preventDefault();
        debugger;
        let input = this;
        readURL(input);
    });

    function readURL(input) {
        if (input.files.length <= 4) {
            $(".only-select-img").addClass('d-none');
            for (let i = 0; i < input.files.length; i++) {
                if (input.files && input.files[i]) {
                    if (input.files[i].type.indexOf("image") > -1) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            let id_name = "#proImg" + (i + 1);
                            $(id_name)
                                .attr({'class' : 'animate__animated animate__bounceIn w-100', 'src': e.target.result, 'title': input.files[i].name, 'alt': input.files[i].name })
                                .width(150)
                                .height(200);
                            };

                        reader.readAsDataURL(input.files[i]);
                    } else {
                        $(".only-select-img").removeClass('d-none');
                    }
                }
            }
        } else {
            toastr.error("Only Select 4 Files");
            //alert("only select 4 files");
        }
    }

    // add new category group ajax code start
    $(".add-physical-product-category-group").submit(function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "api/physical-stock-group",
            data : new FormData(this),
            processData : false,
            contentType : false,
            success: function (response) {
                getGrupName();
                toastr.success(response.response);
            },
            error(xhr){
                if(xhr.status == "409"){
                    toastr.error("Category Name Is Already Exists");
                }
            }
        });
    });
    // add new category group ajax code end

    // fetch category name ajax request select tag
    getGrupName();

    function getGrupName(){
        $.ajax({
            type: "GET",
            url: "api/physical-stock-group",
            data: {
                _token: $("body").attr("token")
            },
            success: function (response) {
                $('.select-category-list').html('');
                $(".cateory-notfound-alert").addClass("d-none");
                console.log('category response');
                console.log(response);
                debugger;
                let res  = response;
                let select = $(".select-category-list");
                let primary_opt = `<option>Primary</option>`;
                $(select).append(primary_opt);
                res.response.forEach(element => {
                    let opt = `<option>`+element.group_name+`</option>`;
                    $(select).append(opt);
                });
            },
            error(xhr){
                if(xhr.status == "404"){
                    $(".cateory-notfound-alert").removeClass("d-none");
                }
            }
        });
    }

    // remove alert
    setTimeout(() => {
        $(".cateory-notfound-alert").addClass("d-none");
    }, 10000);
});
