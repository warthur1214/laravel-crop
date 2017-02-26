$(function () {
    var form = $('#info_form');
    form.find('.form-control').not('[nowrap="nowrap"]').wrap('<div class="form-group"></div>');
    form.validate({
        errorElement: 'label', //default input error message container
        errorClass: 'text-red', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        rules: {
            crop_name: {
                required: true
            },
            crop_number: {
                required: true
            },
            batch_id: {
                required: true
            },
            cycle_id: {
                required: true
            },
            variety_id: {
                required: true
            }
        },
        invalidHandler: function (event, validator) { //display error alert on form submit
            $('.alert-error').show();
        },

        highlight: function (element) { // hightlight error inputs
            $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
        },

        success: function (label) {
            $('.alert-error').hide();
            label.prev('.form-group').removeClass('has-error');
            label.remove();
        },

        errorPlacement: function (error, element) {
            error.addClass('text-red').insertAfter(element.closest('.form-group'));
        },

        submitHandler: function (form) {
            $('.alert-error').hide();
            $('.alert-success').show();
        }
    });

    $('#submit').click(function () {
        if (form.valid() == false) {
            return false;
        }

        var formData = new FormData(form);
        var cropImg = document.getElementById('crop_img').files[0];
        if (cropImg) {
            formData.append("crop_img", document.getElementById('crop_img').files[0]);
        }
        formData.append("crop_number", $("#crop_number").val());
        formData.append("crop_name", $("#crop_name").val());
        formData.append("crop_describe", $("#crop_describe").val());
        formData.append("cycle_id", $("#cycle_id").val());
        formData.append("batch_id", $("#batch_id").val());
        formData.append("variety_id", $("#variety_id").val());
        formData.append("crop_weight", $("#crop_weight").val());

        $.ajax({
            url: $("#app_url").val()+"/crop/addCropAjax",
            type: "post",
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function (result) {
                $('.alert').html(result.msg);
                if (result.status == 0) {
                    $('.alert').show();
                }
                else {
                    $('.alert').show().removeClass('alert-error').addClass('alert-success');
                    setTimeout(function () {
                        window.location.href = $("#app_url").val()+'/crop/cropList'
                    }, 2000);
                }

            }
        });
    });
});