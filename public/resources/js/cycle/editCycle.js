$(function () {
    var form = $('#info_form');
    form.find('.form-control').not('[nowrap="nowrap"]').wrap('<div class="form-group"></div>');
    form.validate({
        errorElement: 'label', //default input error message container
        errorClass: 'text-red', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        rules: {
            module_name: {
                required: true
            },
            module_matched_key: {
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

        formData.append("cycle_img", document.getElementById('cycle_img').files[0]);
        formData.append("cycle_id", $("#cycle_id").val());
        formData.append("cycle_name", $("#cycle_name").val());
        formData.append("cycle_describe", $("#cycle_describe").val());
        formData.append("cycle_status", $("#cycle_status").val());

        $.ajax({
            url:  $("#app_url").val()+"/cycle/editCycleAjax",
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
                        window.location.href = $("#app_url").val()+"/cycle/cycleList";
                    }, 2000);
                }

            }
        });
    });
});