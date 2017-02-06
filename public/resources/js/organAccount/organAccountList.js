var mytable;

$(function() {
    var chkGroupVm;
    var organListGroupVm;

    mytable = InitDataTable({
        $el: $('#myTable'), //表格dom选择器
        url: "/Home/OrganAccount/OrganAccountListAjax", //表格列表数据 
        ajaxdata: {},
        tableOpts: {
            data: {
                "account_id": { title: "账号编号" },
                "account_name": { title: "账号名称" },
                "display_name": { title: "账号姓名" },
                "organ_name": { title: "账号归属" },
                "system": {
                    title: "授权系统",
                    render: function(data, type, row, meta) {
                        var _html = '';

                        if (data) {
                            for (var i = 0, l = data.length; i < l; i++) {
                                _html += data[i] + '<br>';
                            };
                        };

                        return _html;
                    }
                },
                "login_time": { title: "最后登录时间" }
            },
            operate: {
                "title": '操作', //自定义操作列 
                render: function(data, type, row, meta) {
                    var _selectHtml = '<select data-id="' + row.account_id + '" onchange="changeStatus(this)"><option value="1">生效</option><option value="0" selected="selected">冻结</option></select>';
                    if (row.is_available == "1") {
                        _selectHtml = '<select data-id="' + row.account_id + '" onchange="changeStatus(this)"><option  value="1" selected="selected">生效</option><option value="0">冻结</option></select>';
                    };
                    var _data = JSON.stringify(row);
                    var _text = ('<a href="/Home/OrganAccount/editOrganAccount?id='+ row.account_id +'" class="label label-success">编辑</a> ' +
                        '<span data-id="' + row.account_id + '" onclick="deleteRecord( this )" class="label label-danger">删除</span> ' +
                        _selectHtml);

                    return _text;
                }
            }
        }
    });
    /*==============授权系统选项数据====*/
    AjaxJson('/Home/OrganAccount/systemList', function(res) {

        chkGroupVm = new Vue({
            el: '#chkGroup',
            data: {
                items: res
            }
        });
        $('#chkGroup').removeClass('hide')
    });

    /*==============账号归属数据列表====*/
    AjaxJson('/Home/OrganAccount/organList', function(res) {

        organListGroupVm = new Vue({
            el: '#organListGroup',
            data: {
                items: res
            }
        });
        $('#organListGroup').removeClass('hide');
    });

    /*==============点击搜索按钮====*/
    $('#searchBtn').bind('click', function() {
        var formdata = getSearchData();
        var $checkedBox = $(':checkbox:checked');
        var _checkedVal = [];
        for(var i = 0, l = $checkedBox.length; i < l; i++){
            var _d = $checkedBox[i].value;
            _checkedVal.push( _d ); 
        };
        formdata.system_id = _checkedVal.join(',');
        
        mytable.reloadByParam(formdata);
    });
});
/*删除该条记录*/
function deleteRecord(el) {
    var $el = $(el);
    Confirm('确定删除该条记录吗？', function(res) {
        if (res) {
            AjaxJson('/Home/OrganAccount/delOrganAccount/id/' + $el.attr('data-id'), function(res) {
                AlertHide(res.msg);

                if (res.status == 1) {
                    $el.parents('tr').remove();
                    mytable.refresh();
                };
            });
        };
    });
};

/*生效|冻结账号*/
function changeStatus(el) {
    var $el = $(el);

    AjaxJson('/Home/OrganAccount/organAccountAvailable/id/' + $el.attr('data-id'), { "is_available": $el.val() }, function(res) {
        if( res.status == "1"){
            AlertHide('修改成功');
        }else{
            AlertHide('修改失败');
        };
        mytable.reloadByParam({});
    });

};
