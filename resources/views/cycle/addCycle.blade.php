@extends("base")

<!-- DataTables -->
<link rel="stylesheet" href="{{asset("/resources/plugins/datatables/dataTables.bootstrap.css")}}">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{asset("/resources/plugins/iCheck/all.css")}}">
@section("style")
    <style type="text/css">
        .alert_page_success {
            color: #468847;
            background-color: #dff0d8;
            border-color: #d6e9c6
        }

        .alert_page_error {
            color: #b94a48;
            background-color: #f2dede;
            border-color: #eed3d7
        }
    </style>
@endsection


@section("body")
    <body>
    <section class="content-header">
        <h1>
            生长周期节点
        </h1>
    </section>
    <div class="box box-cus box-cus-form">
        <div class="alert alert-error" style="display:none;">
            <span>信息不能为空，请输入</span>
        </div>
        <div class="box-body">
            <form role="form" id="info_form">
                <table class="table table-bordered">
                    <tbody>
                    <tr class="form-group">
                        <td class="title" colspan="2"><i class="fa fa fa-info-circle"></i> 添加节点</td>
                        <input type="hidden" class="form-control" id="app_url" name="app_url"
                               value="{{env("APP_URL")}}">
                    </tr>
                    <tr class="form-group">
                        <th>节点名称 <span class="text-red">*</span></th>
                        <td>
                            <input type="text" class="form-control" id="cycle_name" name="cycle_name"
                                   placeholder="节点名称">
                        </td>
                    </tr>
                    <tr class="form-group">
                        <th>节点描述</th>
                        <td colspan="5">
                            <div class="form-group"><textarea class="form-control" id="cycle_describe" name="cycle_describe" placeholder="输入节点描述信息"></textarea></div>
                        </td>
                    </tr>
                    <tr class="form-group">
                        <th>是否生效</th>
                        <td>
                            <label>
                                <input type="radio" name="cycle_status" class="flat-red" checked value="0"> 不生效
                            </label>
                            <label>
                                <input type="radio" name="cycle_status" class="flat-red" value="1"> 生效
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="box-footer clearfix text-center">
            <button type="submit" class="btn btn-primary" id="submit"><i class="fa fa-save"></i> 提交</button>
            <a href="{{env("APP_URL")}}/cycle/cycleList" class="btn btn-default"><i class="fa fa-arrow-left"></i>
                返回</a>
        </div>
    </div>
    </body>
@endsection

@section("script")
    <!-- DataTables -->
    <script src="{{asset("/resources/plugins/datatables/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("/resources/plugins/datatables/dataTables.bootstrap.min.js")}}"></script>
    <script src="{{asset("/resources/plugins/jQuery/jquery.validate.min.js")}}"></script>
    <script src="{{asset("/resources/plugins/jQuery/additional-methods.min.js")}}"></script>
    <!-- iCheck 1.0.1 -->
    <script src="{{asset("/resources/plugins/iCheck/icheck.min.js")}}"></script>
    <script src="{{asset("/resources/js/cycle/addCycle.js")}}"></script>
@endsection