$(function () {
    var form = $("#info_form");
    $('tbody #cycle_section').daterangepicker();
    $('.fa-calendar-times-o').click(function () {
        $('#cycle_section').val('');
    });

    var $thead = $('#info_form').find('thead');
    var $tbody = $('#info_form').find('tbody');
    var $theadChk = $thead.find('[type="checkbox"]');

    $theadChk.change(function () { //勾选表头上的checkbox

        var $tbodyCheckbox = $tbody.find('[type="checkbox"]');
        if ($tbodyCheckbox.length === 0) {
            return;
        }
        if (this.checked) {
            $tbodyCheckbox.prop('checked', 'checked');
        } else {
            $tbodyCheckbox.prop('checked', false);
        }
    });
    $tbody.on('change', '[type="checkbox"]', function () {
        if (this.checked) {
            var $tbodyCheckbox = $tbody.find('[type="checkbox"]');

            if ($tbodyCheckbox.length === $tbodyCheckbox.filter(':checked').length) {
                $theadChk.prop('checked', 'checked');
            }
        } else {
            $theadChk.prop('checked', false);
        }
    });
    $tbody.on('focus', '[type="text"],[type="file"]', function () {
        var $this = $(this);
        $this.parents('.form-group').removeClass('has-error');
        if (this.type === 'file') {
            $this.parent('.file-btn').siblings('.text-red').remove();
        } else {
            $this.siblings('.text-red').remove();
        }
    }).on('blur', '[type="text"],[type="file"]', function () {
        var $this = $(this);
        if ($this.val() === '' && $this.attr('required')) {
            $this.parents('.form-group').addClass('has-error');
            $this.after('<span class="text-red">必填</span>');
        }
    });

    $('#submit').bind('click', function () {
        var $tr = $tbody.find('tr');
        var postData = [];

        $tr.each(function (i, e) {
            var _obj = {};


            var $cycle_img = $(e).find('[data-name="cycle_img"]');
            var $img_src = $cycle_img.siblings('.img-box').find('img');

            _obj.crop_id = validateForm($(e).find('[name="crop_id"]'));
            _obj.cycle_id = validateForm($(e).find('[name="cycle_id"]'));
            _obj.cycle_section = validateForm($(e).find('[name="cycle_section"]'));
            _obj.cycle_describe = validateForm($(e).find('[name="cycle_describe"]'));

            if (_obj.cycle_section === "") {
                return;
            }

            if ($img_src.length > 0) {
                // for (var j1 = 0, l1 = $img_src.length; j1 < l1; j1++) {
                //     _cycle_img.push($img_src[j1].src);
                // }

                _obj.cycle_img = $img_src[0].src;
            }

            // if (_obj.cycle_section === "") {
            //     $cycle_section.parent().addClass('has-error');
            //     $cycle_section.after('<span class="text-red">请选择</span>');
            // }

            postData.push(_obj);
        });
        // if (form.valid() === false) {
        //     return false;
        // }
        console.log(postData);
        $.ajax({
            url: $("#app_url").val() + "/crop/saveCycleProperty",
            type: "post",
            data: JSON.stringify(postData),
            dataType: "json",
            contentType: "application/json",
            success: function (result) {
                $('.alert').html(result.msg);
                if (result.status === 0) {
                    $('.alert').show();
                }
                else {
                    history.back(-1);
                }

            }
        });
    });
});


/*======== 验证输入的有效性 ========*/
function validateForm($el) {
    var _val = $el.val();
    var $parent = $el.parents('.form-group');

    if (_val === '' && $el.attr('required') && !$parent.hasClass('has-error')) {
        $parent.addClass('has-error');
        $el.after('<span class="text-red">必填</span>');
    }
    return _val;
}
/*======== 删除选中的商品 ========*/
function removeTr() {
    var $tbody = $('#info_form').find('tbody');
    var $tr = $tbody.find('[type="checkbox"]:checked').parents('tr');
    $tr.remove();
}
/*======== 添加一件商品 ========*/
function addOne(el) {
    var $tr = $(el).parent().parent().siblings('.hide').clone().removeAttr('class');
    $tr.appendTo($('tbody'));
}


/*======== 渲染上传之后的图片 ========*/
function renderUploadImg(el) {

    var $parent = $(el).parent();
    var $imgBox = $parent.siblings('.img-box');
    var $uploadfileBox = $parent.parent('.uploadfile-box');
    var $form = $uploadfileBox.parent('form');
    var $input = $(el).parents('td').children('input');
    var maxNum = 1; //最多允许上传的图片个数
    var fileLen = el.files.length;
    var imgCnt = $parent.parent().children("div.img-box").children().length + 1;

    // $imgBox.html('');

    if (fileLen === 0 || fileLen > 5 || imgCnt > maxNum) {
        var _msg = (fileLen === 0 ? '您没有选择图片' : '您最多可上传五张图片');
        layer.alert(_msg, {icon: 0});

        // $uploadfileBox.addClass('no-img');
        return;
    }
    if ($form.length === 0) {
        $uploadfileBox.wrap('<form></form>');
        $form = $uploadfileBox.parent('form');
    }

    AjaxjsonForm($("#app_url").val() + "/crop/uploadCycleImg", new FormData($form[0]), function (res) {

        var _data = res.data;
        if (res.status === 0) {
            alert(res.msg);
            return;
        }
        $uploadfileBox.removeClass('no-img');
        $input.val(_data);
        if ($imgBox.html()) {
            $imgBox.html("");
        }
        $imgBox.append('<img style="width: 150px; height: 80px;" src="' + _data + '" >');
    });

}