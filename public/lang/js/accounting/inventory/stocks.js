
$(function () {
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
        var files = this.files;
        files.forEach((file, index) => {
            showImage(file[index]);
        });

    });
    function showImage(file) {
        var loadFile = function (event) {
            var row = document.getElementById('showProductImg');
           let src = image.src = URL.createObjectURL(file);
            let showImg = `<div class="col-md-3 p-2"><img src="`+ src +`" width="100"></div>`;
            row.append(showImage);
        };
    }
});
