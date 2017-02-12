$(function () {

    var mytable;
    var _treeHeight = $('html,body').height() - $('.content-header').height() - 85;
    // var initOrgTree = InitRoleTree({
    //     $el: $('#roleTree'),
    //     url: $('#app_url').val()+'/company/sonParentList',
    //     textKey: 'organ_name',
    //     valKey: 'organ_id',
    //     childrenKey: 'son',
    //     className: 'tree-list-cus'
    // });
    //
    // initOrgTree.onClickNode = function ($el) {
    //     var id = $el.parent('li').attr('data-id');
    //     mytable.reloadByParam({"organ_id": id});
    // };
    $('#roleTree').css({
        height: _treeHeight,
        overflow: 'auto'
    });
    mytable = InitDataTable({
        $el: $('#myTable'), //表格dom选择器
        url: "roleListAjax", //表格列表数据
        ajaxdata: {},
        tableOpts: {
            data: {
                "role_name": {title: "角色名称"},
                "role_depict": {title: "角色描述"},
                "organ_name": {title: "角色归属"}
            },
            operate: {
                "title": '操作', //自定义操作列 
                render: function (data, type, row, meta) {
                    var _data = JSON.stringify(row);
                    var _text = ('<a href="role/editRole/' + row.role_id + '" class="label label-success">编辑</a> ' +
                    '<span data-id="' + row.role_id + '" onclick="deleteRecord( this )" class="label label-danger">删除</span> ');

                    return _text;
                }
            }
        }
    });
});

/*删除该条记录*/
function deleteRecord(el) {

    var $el = $(el);

    Confirm('确定删除该条记录吗？', function (res) {
        if (res) {
            AjaxJson('role/delRole/' + $el.attr('data-id'), function (res) {
                AlertHide(res.msg);

                if (res.status == 1) {
                    $el.parents('tr').remove();
                    mytable.refresh();

                }
            });
        }
    });
}
