$(function () {
    var form = $('#info_form');
    form.find('.form-control').not('[nowrap="nowrap"]').wrap('<div class="form-group"></div>');

    $('#submit').click(function () {
        if (form.valid() == false) {
            return false;
        }
        var formData = new FormData(form);
        console.log(document.getElementById('about_img'));
        var cropImg = document.getElementById('about_img').files[0];
        if (cropImg) {
            formData.append("about_img", document.getElementById('about_img').files[0]);
        }
        formData.append("about_id", $("#about_id").val());
        formData.append("about_describe", $("#about_describe").val());

        $.ajax({
            url:  $("#app_url").val()+"/wechat/addAboutUs",
            type: "post",
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function (result) {
                $('.alert').html(result.msg);
                if (result.status === 0) {
                    $('.alert').show();
                }
                else {
                    $('.alert').show().removeClass('alert-error').addClass('alert-success');
                    setTimeout(function () {
                        window.location.href = $("#app_url").val()+"/crop/cropList";
                    }, 2000);
                }

            }
        });
    });
});