@extends("base")

@section("style")

    <link rel="stylesheet" href="{{asset("/resources/plugins/datatables/dataTables.bootstrap.css")}}">
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
            修改作物批次
        </h1>
    </section>
    <div class="box box-cus box-cus-form">
        <div class="alert alert-error" style="display:none;">
            <span>信息不能为空，请输入</span>
        </div>
        <div class="box-body">

            <input type="hidden" class="form-control" id="app_url"
                   value="{{env("APP_URL")}}">
            <form role="form" id="info_form">
                <table class="table table-bordered">
                    <tbody>
                    <tr class="form-group">
                        <td class="title" colspan="2"><i class="fa fa fa-info-circle"></i> 修改节点</td>
                        <td>
                            <input type="hidden" class="form-control" id="batch_id" name="batch_id"
                                   value="{{$batchInfo['id']}}" placeholder="批次名称">
                        </td>
                    </tr>
                    <tr class="form-group">
                        <th>批次编码 <span class="text-red">*</span></th>
                        <td>
                            <input type="text" class="form-control" id="batch_number" name="batch_number"
                                   value="{{$batchInfo['batch_number']}}" placeholder="批次编码" readonly>
                        </td>
                    </tr>
                    <tr class="form-group">
                        <th>批次名称 <span class="text-red">*</span></th>
                        <td>
                            <input type="text" class="form-control" id="batch_name" name="batch_name"
                                   value="{{$batchInfo['batch_name']}}" placeholder="批次名称">
                        </td>
                    </tr>
                    <tr class="form-group">
                        <th>批次描述</th>
                        <td colspan="5">
                            <div class="form-group">
                                <textarea class="form-control" id="batch_describe" name="batch_describe"
                                          placeholder="输入批次描述信息">{{$batchInfo['batch_describe']}}</textarea>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="box-footer clearfix text-center">
            <button type="submit" class="btn btn-primary" id="submit"><i class="fa fa-save"></i> 提交</button>
            <a href="{{env("APP_URL")}}/batch/batchList" class="btn btn-default"><i class="fa fa-arrow-left"></i>
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
    <script src="{{asset("/resources/js/batch/editBatch.js")}}"></script>
@endsection