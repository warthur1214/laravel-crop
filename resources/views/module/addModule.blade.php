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
            添加模块
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
                    <tr>
                        <td class="title" colspan="2"><i class="fa fa fa-info-circle"></i> 添加模块信息</td>
                        <input type="hidden" class="form-control" id="app_url" name="app_url"
                               value="{{config('app.url')}}">
                    </tr>
                    <tr>
                        <th><span class="text-red">*</span> 模块名称</th>
                        <td>
                            <input type="text" class="form-control" id="module_name" name="module_name"
                                   placeholder="模块名称">
                        </td>
                    </tr>
                    <tr>
                        <th>模块地址</th>
                        <td>
                            <input type="text" class="form-control" id="module_url" name="module_url"
                                   placeholder="模块地址">
                        </td>
                    </tr>
                    <tr>
                        <th><span class="text-red">*</span> 模块关键词</th>
                        <td>
                            <input type="text" class="form-control" id="module_matched_key" name="module_matched_key"
                                   placeholder="模块关键词">
                        </td>
                    </tr>
                    <tr>
                        <th>父级模块</th>
                        <td>
                            <select class="form-control" id="module_parent_id" name="module_parent_id">
                                <option value="">请选择</option>
                                @foreach($parent as $val)
                                    <option value="{{$val['module_id']}}">
                                        {{$val['module_name']}}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>模块排序</th>
                        <td>
                            <input type="text" class="form-control" id="module_sort" name="module_sort"
                                   placeholder="模块排序:1~999">
                        </td>
                    </tr>
                    <tr>
                        <th>是否显示</th>
                        <td>
                            <label>
                                <input type="radio" name="is_visible" class="flat-red" checked value="0"> 不显示
                            </label>
                            <label>
                                <input type="radio" name="is_visible" class="flat-red" value="1"> 显示
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="box-footer clearfix text-center">
            <button type="submit" class="btn btn-primary" id="submit"><i class="fa fa-save"></i> 提交</button>
            <a href="{{config('app.url')}}/module/moduleList" class="btn btn-default"><i class="fa fa-arrow-left"></i>
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
    <script src="{{asset("/resources/js/module/addModule.js")}}"></script>
@endsection

@section("js")
    <script type="text/javascript">
        $(function () {
            //Flat red color scheme for iCheck
            $('input[type="radio"].flat-red').iCheck({
                radioClass: 'iradio_flat-green'
            });
            $('#system_id').change(function () {
                getModuleByVal($(this).val());
            })
        })
        function getModuleByVal(val) {
            $.ajax({
                'url': '/getModuleById/' + val,
                'dataType': 'json',
                'type': 'post',
                success: function (result) {
                    var html = "<option value=''>请选择</option>";
                    if (result.length > 0) {
                        for (var i = 0; i < result.length; i++) {
                            html += "<option value='" + result[i]['module_id'] + "'>" + result[i]['module_name'] + "</option>";
                        }
                        ;
                    }
                    $('#module_parent_id').html(html);
                }
            })
        }
    </script>
@endsection