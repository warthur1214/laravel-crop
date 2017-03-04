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

        .img_browser {
            height: 400px;
            width: 300px;
        }
    </style>
@endsection


@section("body")
    <body>
    <section class="content-header">
        <h1>
            添加农产品信息
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
                        <td class="title" colspan="2"><i class="fa fa fa-info-circle"></i> 添加农产品</td>
                        <input type="hidden" class="form-control" id="app_url"
                               value="{{env("APP_URL")}}">
                    </tr>
                    <tr class="form-group">
                        <th>农产品编码 <span class="text-red">*</span></th>
                        <td>
                            <input type="text" class="form-control" id="crop_number" name="crop_number"
                                   value="{{$cropNumber}}" placeholder="农产品编码" readonly>
                        </td>
                    </tr>
                    <tr class="form-group">
                        <th>农产品名称 <span class="text-red">*</span></th>
                        <td>
                            <input type="text" class="form-control" id="crop_name" name="crop_name"
                                   placeholder="农产品名称">
                        </td>
                    </tr>
                    <tr class="form-group">
                        <th>产品重量 <span class="text-red">*</span></th>
                        <td>
                            <input type="text" class="form-control" id="crop_weight" name="crop_weight"
                                   placeholder="产品重量">
                        </td>
                    </tr>

                    <tr class="form-group">
                        <th>生长周期<span class="text-red">*</span></th>
                        <td>
                            <select name="cycle_id" id="cycle_id" class="form-group" title="选择生长周期">
                                <option value="0">初始状态</option>
                                @foreach($cycleInfo as $c)
                                    <option value="{{$c['id']}}">{{$c['cycle_name']}}</option>
                                @endforeach
                            </select>
                            <span class="span1">没有？<a href="{{env("APP_URL")}}/cycle/addCycle"
                                                       class="a1">加一个</a></span>
                        </td>
                    </tr>
                    <tr class="form-group">
                        <th>选择批次 <span class="text-red">*</span></th>
                        <td>
                            <select name="batch_id" id="batch_id" class="form-group" title="选择批次">
                                @foreach($batchInfo as $b)
                                    <option value="{{$b['id']}}">{{$b['batch_name']}}</option>
                                @endforeach
                            </select>
                            <span class="span1">没有？<a href="{{env("APP_URL")}}/batch/addBatch"
                                                      class="a1">加一个</a></span>
                        </td>
                    </tr>
                    <tr class="form-group">
                        <th>农产品品类 <span class="text-red">*</span></th>
                        <td>
                            <select name="variety_id" id="variety_id" class="form-group" title="选择农产品品类">
                                @foreach($varietyInfo as $v)
                                    <option value="{{$v['id']}}">{{$v['variety_name']}}</option>
                                @endforeach
                            </select>
                            <span class="span1">没有？<a href="{{env("APP_URL")}}/variety/addVariety"
                                                      class="a1">加一个</a></span>
                        </td>
                    </tr>
                    <tr class="form-group">
                        <th>上传图片</th>
                        <td colspan="5">
                            <div class="form-group"><input type="file" class="form-control" id="crop_img"
                                                           name="crop_img"
                                                           placeholder="农产品图片"></div>
                        </td>
                    </tr>

                    <tr class="form-group">
                        <th>图片预览</th>
                        <td colspan="5">
                            <div class="form-group">
                                <img src="" class="img_browser" id="img_browser" alt="图片预览">
                            </div>
                        </td>
                    </tr>
                    <tr class="form-group">
                        <th>农产品描述</th>
                        <td colspan="5">
                            <div class="form-group"><textarea class="form-control" id="crop_describe"
                                                              name="crop_describe" placeholder="输入农产品描述信息"></textarea>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="box-footer clearfix text-center">
            <button type="submit" class="btn btn-primary" id="submit"><i class="fa fa-save"></i> 提交</button>
            <a href="{{env("APP_URL")}}/crop/cropList" class="btn btn-default"><i class="fa fa-arrow-left"></i>
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
    <script src="{{asset("/resources/js/crop/addCrop.js")}}"></script>
@endsection

@section("js")
    <script type="text/javascript">
        //待上传图片预览
        $("#crop_img").change(function () {
            var objUrl = getObjectURL(this.files[0]);
            if (objUrl) {
                $("#img_browser").attr("src", objUrl);
            }
        });

        //建立一個可存取到該file的url
        function getObjectURL(file) {
            var url = null;
            window.createObjectURL = undefined;
            if (window.createObjectURL != undefined) { // basic
                url = window.createObjectURL(file);
            } else if (window.URL != undefined) { // mozilla(firefox)
                url = window.URL.createObjectURL(file);
            } else if (window.webkitURL != undefined) { // webkit or chrome
                url = window.webkitURL.createObjectURL(file);
            }
            return url;
        }
    </script>
@endsection