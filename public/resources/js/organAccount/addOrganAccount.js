$(function() {
    var validateForm = InitValidateForm($('#info_form'));
    var fenceNameVm = new Vue({
        el: '#fenceName'
    });

    RelationSelect({
        level: [
            { el: '#organListGroup', url: '/Home/OrganAccount/organList', id: "organ_id", name: 'organ_name' } 
        ]
    });

    $('#info_form').on('change', '#organListGroup', function(res) {
        var _val = $(this).val();
        AjaxJson('/Home/OrganAccount/getRoleById/id/' + _val, function(res) {
            fenceNameVm.$data = {
                items: res
            };
        }); 
    });
  
    $('#submit').bind('click', function() {
        if (validateForm.validnew()) {
            var _postdata = validateForm.serializeObject();
            _postdata.password = newHexMd5( _postdata.password );  

            AjaxJson('/Home/OrganAccount/addOrganAccountAjax', _postdata, function(res) {  

                if (res.status == "1") {
                    AlertHide(res.msg, function() {
                        HrefTo('/Home/OrganAccount/organAccountList');
                    });
                } else {
                    AlertHide(res.msg);
                };
            });

        };
    });
});
