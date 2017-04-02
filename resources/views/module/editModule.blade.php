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
            修改模块
        </h1>
    </section>
    <div class="box box-cus box-cus-form">
        <div class="alert alert-error" style="display:none;">
            <span>信息不能为空，请输入</span>
        </div>
        <div class="box-body">

            <input type="hidden" class="form-control" id="app_url" name="app_url"
                   value="{{config('app.url')}}">
            <form role="form" id="info_form">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td class="title" colspan="2"><i class="fa fa fa-info-circle"></i> 修改模块信息</td>
                    </tr>
                    <tr>
                        <th><span class="text-red">*</span> 模块名称</th>
                        <td>
                            <input type="text" class="form-control" id="module_name" name="module_name"
                                   value="{{$info['module_name']}}">
                        </td>
                    </tr>
                    <tr>
                        <th>模块地址</th>
                        <td>
                            <input type="text" class="form-control" id="module_url" name="module_url"
                                   value="{{$info['module_url']}}">
                        </td>
                    </tr>
                    <tr>
                        <th><span class="text-red">*</span> 模块关键词</th>
                        <td>
                            <input type="text" class="form-control" id="module_matched_key" name="module_matched_key"
                                   value="{{$info['module_matched_key']}}">
                        </td>
                    </tr>
                    {{--<tr>--}}
                        {{--<th>所属平台</th>--}}
                        {{--<td>--}}
                            {{--<select class="form-control" id="system_id" name="system_id">--}}
                                {{--<option value="">请选择</option>--}}
                                {{--@foreach($system as $val)--}}
                                    {{--<option value="{{$val['system_id']}}"--}}
                                            {{--{{$val['system_id'] == $info['system_id'] ? 'selected' : null}} >--}}
                                        {{--{{$val['system_name']}}--}}
                                    {{--</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    <tr>
                        <th>父级模块</th>
                        <td>
                            <select class="form-control" id="module_parent_id" name="module_parent_id" title="">
                                <option value="">请选择</option>
                                @foreach($parent as $val)
                                    <option value="{{$val['module_id']}}"
                                            {{$val['module_id'] == $info['module_parent_id'] ? 'selected' : null}} >
                                        {{$val['module_name']}}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <input type="hidden" id="module_id" name="module_id" value="{{$info['module_id']}}">
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
    <script src="{{asset("/resources/js/module/editModule.js")}}"></script>
@endsection

@section("js")
    <script type="text/javascript">
        $(function () {
            {{--getModuleByVal("{{$info['system_id']}}");--}}
            $('#system_id').change(function () {
                getModuleByVal($(this).val());
            })
        });
        function getModuleByVal(val) {
            $.ajax({
                'url': 'getModuleById/' + val,
                'dataType': 'json',
                'type': 'post',
                success: function (result) {
                    var html = "<option value=''>请选择</option>";
                    if (result.length > 0) {
                        for (var i = 0; i < result.length; i++) {
                            var is_select = ("{{$info['module_parent_id']}}" == result[i]['module_id']) ? "selected" : "";
                            html += "<option value='" + result[i]['module_id'] + "'" + is_select + ">" + result[i]['module_name'] + "</option>";
                        }
                    }
                    $('#module_parent_id').html(html);
                }
            })
        }
    </script>
@endsection