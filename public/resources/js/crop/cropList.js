var table;
$(document).ready(function () {

    //删除模块
    function delMoudle() {
        //处理删除用户事件
        var id = $(this).attr('index');
        var success = $('.alert_page_success');
        var error = $('.alert_page_error');

        if (confirm('确实要删除该节点吗?')) {
            $.ajax({
                url: 'delCrop/' + id,
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
            {"searchable": false, "orderable": true, "targets": [6]},
            {"searchable": false, "orderable": true, "targets": [7]},
            {"searchable": false, "orderable": true, "targets": [8]},
            {"searchable": false, "orderable": true, "targets": [9]},
            {"searchable": false, "orderable": true, "targets": [10]}
        ],
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "ajax": {
            "url": "cropListAjax",
            "type": "POST"
        },
        "order": [
            [0, "asc"]
        ],
        "columns": [
            {"data": "id"},
            {"data": "crop_name"},
            {"data": "crop_number"},
            {"data": "crop_weight"},
            {"data": "batch_name"},
            {"data": "variety_name"},
            {
                "data": null,
                "createdCell": function (td, cellData, rowData, row, col) {
                    var html = rowData.cycle_name ? rowData.cycle_name : '初始状态';
                    $(td).html(html);
                }
            },
            {"data": "crop_describe"},
            {"data": "create_time"},
            {"data": "update_time"},
            {
                "data": null,
                "createdCell": function (td, cellData, rowData, row, col) {
                    var html = $(td).html("<a href='editCrop/" + rowData.id + "' " +
                        "class='btn btn-xs btn-primary'>查看</a> <a href='javascript:;' " +
                        "class='btn btn-xs btn-primary' cropName='"+rowData.crop_name+"' cropId='" + rowData.id + "' id='scanBinCode'>二维码</a> <a href='javascript:void(0);' " + rowData.id + "' " +
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
    $('#example1').on('click', '#scanBinCode', scanBinCode);


    function scanBinCode() {
        var loc = encodeURI("http://warthur.ngrok.cc/laravel-master/public/crop/scanBinCode/" + $(this).attr("cropId")),
            cropName = $(this).attr("cropName");

        layer.open({
            title: '农产品二维码',
            area: ['380px', '710px'], //宽高
            btn: ['确定', '取消'], //按钮
            content: '<div style="padding-left: 10%;">' +
            '<label style=""><h3>苏州市农产品质量追溯</h3></label>' +
            '<hr style="height:1px;border:none;border-top:1px solid #555555;" />' +
            '<label>产品名称：'+ cropName+'</label><br>' +
            '<label>追溯码：无</label><br>' +
            '<label>生产企业：太仓市海丰农场专业合作社</label><br>' +
            '<label>产品重量：20</label><br>' +
            '<label>销售去向：门店</label><br>' +
            "<img style='margin-left: -20px;' src='http://pan.baidu.com/share/qrcode?w=300&h=300&url="+loc+"' alt='农产品追溯二维码' /></a>" +
            '<br><label>追溯地址：www.ncpziaq.suzhou.gov.cn</label>' +
            '</div>',
            yes: function (index, elem) {
                var _data = serializeFormData(elem.find('form'));
                var _postData = $.extend({}, res.classInfo, _data);
            },
            success: function (elem) { //成功弹出弹窗后的回调方法

            }
        });
    }

});
