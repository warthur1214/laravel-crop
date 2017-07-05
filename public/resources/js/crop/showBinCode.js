


function scanBinCode() {

    var cropId = $(this).attr("cropId"),
        cropName = $(this).attr("cropName"),
        cropWeight = $(this).attr("cropWeight"),
        cropNumber = $(this).attr("cropNumber");

    $.ajax({
        url:  $("#app_url").val()+"/crop/editCropAjax",
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
                    window.location.href = $("#app_url").val()+"/crop/cropList";
                }, 2000);
            }

        }
    });
}