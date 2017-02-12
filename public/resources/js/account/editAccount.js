$(function () {
    var editData;
    var validateForm = InitValidateForm($('#info_form'));
    var _id = location.href.split('/')[location.href.split('/').length-1];
    var chkGroupVm = new Vue({
        el: '#chkGroup'
    });

    // InitOrgIdTree({
    //     $inputId: $('#organ_id'),
    //     $inputName: $('[name="organ_id"]'),
    //     $tree: $('#roleTree'),
    //     onClickTreeNode: function ($el) {
    //         var id = $el.parent('li').attr('data-id');
    //     }
    // });

    AjaxJson(APP_URL + '/account/getAccountInfoById/' + _id, function (res) {
        validateForm.assignForm(res);
        // loadRoleList(res);
        editData = res;

        var roleTreeInterval = setInterval(function () {

            if ($('#roleTree').html() != '') {
                var $treenode = $('#roleTree').find('li').filter('[data-id="' + res.organ_id + '"]').children('.tree-node');

                if ($treenode.length > 0) {
                    $('#organ_id').val($treenode.text());
                    $treenode.addClass('active');
                }

                clearInterval(roleTreeInterval);
            }
        }, 200);
    });


    $('#submit').bind('click', function () {
        if (validateForm.validnew()) {
            var postdata = validateForm.serializeObject();

            postdata.password = ( newHexMd5(postdata.password) == editData.password ? editData.password : newHexMd5(postdata.password) );
            postdata.account_id = _id;

            // if (typeof(postdata.role_id) != 'string') {
            //     postdata.role_id = postdata.role_id.join(',')
            // }

            AjaxJson(APP_URL + '/account/editAccountAjax', postdata, function (res) {
                if (res.status == "1") {

                    AlertHide(res.msg, function () {

                        HrefTo(APP_URL + "/account/accountList");
                    });
                } else {
                    AlertHide(res.msg);
                }
            });
        }
    });

    function loadRoleList(data) {

        var organId = data.organ_id ? data.organ_id : data.organ_parent_id;
        AjaxJson('getRoleById/' + organId, function (res) {
            if (res) {
                chkGroupVm.$data = {
                    items: res
                };
                $('#chkGroup').removeClass('hide');
                setTimeout(function () {
                    initRoleId(data, 'role_id');
                }, 0);
            }
        });
    }

    /*初始化角色*/
    function initRoleId(data, roleKey) {
        var roleIdData = data[roleKey];
        if (roleIdData) {
            for (var i = 0, l = roleIdData.length; i < l; i++) {
                var _d = roleIdData[i];
                $('[name="' + roleKey + '"][value="' + _d + '"]').prop('checked', 'checked');
            }
        }
    }
});
