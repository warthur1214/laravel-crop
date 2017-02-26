$(document).ready(function () {

    //删除模块
    function delMoudle() {
        //处理删除用户事件
        var id = $(this).attr('index');
        var success = $('.alert_page_success');
        var error = $('.alert_page_error');

        if (confirm('确实要删除该节点吗?')) {
            $.ajax({
                url: 'delCycle/' + id,
                type: "post",
                dataType: "json",
                success: function (result) {
                    if (result.status == 0) {
                        success.hide();
                        //设置msg
                        error.text(result.msg);
                        error.show();
                        setTimeout(function () {
                            error.hide();
                        }, 3000);
                        return;
                    }
                    error.hide();
                    success.text(result.msg);
                    success.show();

                    //重新加载列表
                    table.ajax.reload();

                    setTimeout(function () {
                        success.hide();
                        error.hide();
                    }, 3000);
                }
            });
        }
    }

    //datatables 初始化
    var table = $('#example1').DataTable({
        "columnDefs": [
            {"searchable": false, "orderable": false, "targets": [0]},
            {"searchable": false, "orderable": false, "targets": [1]},
            {"searchable": false, "orderable": false, "targets": [2]},
            {"searchable": false, "orderable": false, "targets": [3]},
            {"searchable": false, "orderable": true, "targets": [4]},
            {"searchable": false, "orderable": true, "targets": [5]},
            {"searchable": false, "orderable": true, "targets": [6]}
        ],
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "ajax": {
            "url": "cycleListAjax",
            "type": "POST"
        },
        "order": [
            [0, "asc"]
        ],
        "columns": [
            {"data": "id"},
            {"data": "cycle_name"},
            {"data": "cycle_describe"},
            {
                "data": "cycle_status",
                "createdCell": function (td, cellData, rowData, row, col) {
                    var status = rowData.cycle_status == 1 ? '生效' : '失效';
                    $(td).html(status);
                }
            },
            {"data": "create_time"},
            {"data": "update_time"},
            {
                "data": null,
                "createdCell": function (td, cellData, rowData, row, col) {
                    var html = $(td).html("<a href='editCycle/" + rowData.id + "' " +
                        "class='btn btn-xs btn-primary'>查看</a> <a href='javascript:;' " +
                        "class='btn btn-xs btn-danger deleteById' id='deleteById' index='" +
                        rowData.id + "'>删除</a>");
                }
            }
        ],
        "lengthMenu": [
            [50],
            [50]
        ],
        "language": {
            "emptyTable": "暂无数据",
            "lengthMenu": "_MENU_ 条/每页",
            "loadingRecords": "Please wait - loading...",
            "sInfo": "当前显示 _START_ 到 _END_ 条，共 _TOTAL_ 条记录",
            "paginate": {
                "first": "首页",
                "last": "末页",
                "next": "下一页",
                "previous": "上一页"
            }
        }
    });

    /*重新加载table*/
    function reloadData(param) {
        table.settings()[0].ajax.data = param;
        table.ajax.reload();
    }

    $('#example1').on('click', '#deleteById', delMoudle);

});
