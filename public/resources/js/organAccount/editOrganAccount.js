$(function() {
    var _id = location.href.split('id=')[1];
    var validateForm = InitValidateForm($('#info_form'));
    var fenceNameVm = new Vue({
        el: '#fenceName'
    });

    /*==============账号归属数据列表====*/
    AjaxJson('/Home/OrganAccount/getInfoById/id/' + _id, function(res) {
        renderRoleList(res);
    });

    $('#submit').bind('click', function() {
        if (validateForm.validnew()) {
            var _postdata = validateForm.serializeObject();
            _postdata.password = newHexMd5( _postdata.password ); 
            _postdata.account_id = _id; 
            
            AjaxJson('/Home/OrganAccount/editOrganAccountAjax', _postdata, function(res) {

                if (res.status == "1") {
                    AlertHide(res.msg, function() {
                        HrefTo('/Home/OrganAccount/organAccountList');
                    });
                } else {
                    Alert(res.msg);
                };
            });

        };
    });

    /*角色列表数据*/
    function renderRoleList(data) {

        RelationSelect({ //账号归属下拉选项值
            level: [{
                el: '#organListGroup',
                url: '/Home/OrganAccount/organList',
                id: "organ_id",
                name: 'organ_name',
                defaultval: data.organ_parent_id
            }]
        });

        var _val = data.organ_parent_id;

        if (_val != "") {

            AjaxJson('/Home/OrganAccount/getRoleById/id/' + _val, function(res) {
                fenceNameVm.$data = {
                    items: res
                };
                setTimeout(function() {
                    validateForm.assignForm(data);
                    initRoleId( data, 'role_id' ); 
                }, 0);
            });
        } else {
            $('#fenceName').html('<option value="">选择角色</option>');
        };
    };
});

function initRoleId( data, roleKey ) {
    var roleIdData = data[roleKey];
    if (roleIdData) {
        for (var i = 0, l = roleIdData.length; i < l; i++) {
            var _d = roleIdData[i];
            $('[name="'+ roleKey +'"][value="' + _d + '"]').prop('checked', 'checked');
        };
    };
}
