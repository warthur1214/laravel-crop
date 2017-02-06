$(function(){
    //获取企业类型
    $.ajax({
        url:'/Home/Organ/organType',
        dataType:'json',
        type:'post',
        data:'',
        success:function (res) {
            var sortStr = '';
            sortStr += '<option value="-1">选择企业类型</option>';
            for(var i=0,len=res.length;i<len;i++){
                sortStr +=	'<option value="'+res[i].type_id+'">'+res[i].type_name+'</option>';
            }
            $("#componySort").html(sortStr);
        }
    });
    // 获取省份
    $.ajax({
        url:'/Home/Organ/province',
        dataType:'json',
        type:'post',
        data:'',
        success:function (res) {
            var sortStr = '';
            sortStr += '<option value="">省份</option>';
            for(var i=0,len=res.length;i<len;i++){
                sortStr +=	'<option value="'+res[i].p_id+'" >'+res[i].province+'</option>';
            }
            $("#province_id").html(sortStr);
        }
    });
    //监听省份改变
    $('#province_id').change(function() {
        var proID = $(this).children('option:selected').val();
        fillCity(proID);
    });
    //获取city
    function fillCity(prov){
        $.ajax({
            url:'/Home/Organ/getCityById/id/'+prov,
            dataType:'json',
            type:'post',
            data:'',
            success:function (res) {
                var sortStr = '';
                for(var i=0,len=res.length;i<len;i++){
                    sortStr +=	'<option value="'+res[i].c_id+'">'+res[i].city+'</option>';
                }
                $("#city_id").html(sortStr);
            }
        });
    }

    //合作类型
    $.ajax({
        url:'/Home/Organ/cooperate',
        dataType:'json',
        type:'post',
        data:'',
        success:function (res) {
            var sortStr = '';
            for(var i=0,len=res.length;i<len;i++){
                sortStr += '<label><input name="checkbox_name" value="'+res[i].cooperate_id+'" type="checkbox">'+ res[i].cooperate_type+'</label>';
            }
            $("#cooperation").html(sortStr);
        }
    });
    //序列化checkbox
    function serializeBox(key){
        var obj = $("#cooperation :checked");
        check_val = [];
        for(k in obj){
            if(obj[k].checked)
                check_val.push(obj[k].value);
        }
        var dataStr = '';
        dataStr = key+'='+check_val.join(',');
        return dataStr;
    }

    // 提交数据
    $(function() {
        var form = $('#info_form');
        form.find('.form-control').not('[nowrap="nowrap"]').wrap('<div class="form-group"></div>');
        form.validate({
            errorElement: 'label', //default input error message container
            errorClass: 'text-red', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules:
            {
                organ_name:{
                    required:true
                },
                abbreviated_name:{
                    required:true
                },
                organ_address:{
                    required:true
                },
                checkbox_name:{
                    required:true
                },
                organ_province:{
                    required:true
                },
                organ_city:{
                    required:true
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

        $('#submit').click(function()
        {

            if (form.valid() == false)
            {
                return false;
            }
            $.ajax({
                url : "/Home/Organ/addOrganAjax",
                type : "post",
                data : serializeBox('cooperate_type')+'&'+form.serialize(),
                dataType :"json",
                success: function(result)
                {
                    $('.alert').html(result.msg);
                    if(result.status == 0)
                    {
                        $('.alert').show();
                    }
                    else
                    {
                        $('.alert').show().removeClass('alert-error').addClass('alert-success');
                        setTimeout(function(){window.location.href = 'organList'},2000);
                    }

                }
            });
        });
    });
});