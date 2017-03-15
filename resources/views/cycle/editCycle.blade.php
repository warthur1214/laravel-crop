@extends("base")

@section("style")

    <link rel="stylesheet" href="{{asset("/resources/plugins/datatables/dataTables.bootstrap.css")}}">
    <link rel="stylesheet" href="{{asset("/resources/plugins/daterangepicker/daterangepicker-bs3.css")}}">
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
            修改生长周期节点
        </h1>
    </section>
    <div class="box box-cus box-cus-form">
        <div class="alert alert-error" style="display:none;">
            <span>信息不能为空，请输入</span>
        </div>
        <div class="box-body">

            <input type="hidden" class="form-control" id="app_url" name="app_url"
                   value="{{env("APP_URL")}}">
            <form role="form" id="info_form">
                <table class="table table-bordered">
                    <tbody>
                    <tr class="form-group">
                        <td class="title" colspan="2"><i class="fa fa fa-info-circle"></i> 修改节点</td>
                        <td>
                            <input type="hidden" class="form-control" id="cycle_id" name="cycle_id"
                                   value="{{$cycleInfo['id']}}" placeholder="节点名称">
                        </td>
                    </tr>
                    <tr class="form-group">
                        <th>节点名称 <span class="text-red">*</span></th>
                        <td>
                            <input type="text" class="form-control" id="cycle_name" name="cycle_name"
                                   value="{{$cycleInfo['cycle_name']}}" placeholder="节点名称">
                        </td>
                    </tr>
                    <tr class="form-group">
                        <th>节点序号 <span class="text-red">*</span></th>
                        <td>
                            <input type="text" class="form-control" id="cycle_sort" name="cycle_sort"
                                   value="{{$cycleInfo['cycle_sort']}}" placeholder="节点序号">
                        </td>
                    </tr>
                    <tr class="form-group">
                        <th>节点区间 <span class="text-red">*</span></th>
                        <td>
                            <div class="input-group-addon" style="float: left; width: 39px;height: 34px;">
                                <i class="fa fa-calendar-times-o" style="margin-top: 4px;"></i>
                            </div>
                            <div>
                                <input type="text" class="form-control" style="width: 218px;height: 34px;"
                                       id="cycle_section" name="cycle_section" value="{{$cycleInfo['cycle_section']}}"
                                       placeholder="节点区间" readonly>
                            </div>

                        </td>
                    </tr>
                    <tr class="form-group">
                        <th>节点描述</th>
                        <td colspan="5">
                            <div class="form-group">
                                <textarea class="form-control" id="cycle_describe"
                                          name="cycle_describe"
                                          placeholder="输入节点描述信息">{{$cycleInfo['cycle_describe']}}</textarea>
                            </div>
                        </td>
                    </tr>
                    <tr class="form-group">
                        <th>上传图片</th>
                        <td colspan="5">
                            <div class="form-group"><input type="file" class="form-control" id="cycle_img"
                                                           name="cycle_img"
                                                           placeholder="节点图片描述"></div>
                        </td>
                    </tr>
                    <tr class="form-group">
                        <th>图片预览</th>
                        <td colspan="5">
                            <div class="form-group">
                                <img src="{{$cycleInfo['cycle_img']}}" class="img_browser" id="img_browser" alt="图片预览">
                            </div>
                        </td>
                    </tr>
                    <tr class="form-group">
                        <th>是否生效</th>
                        <td>
                            <label>
                                <input type="radio" name="cycle_status" id="cycle_status" class="flat-red"
                                       {{$cycleInfo['cycle_status']==0 ? 'checked' : ''}} value="0"> 不生效
                            </label>
                            <label>
                                <input type="radio" name="cycle_status" id="cycle_status" class="flat-red"
                                       {{$cycleInfo['cycle_status']==1 ? 'checked' : ''}} value="1"> 生效
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="box-footer clearfix text-center">
            <button type="submit" class="btn btn-primary" id="submit"><i class="fa fa-save"></i> 修改</button>
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
    <script src="{{asset("/resources/js/cycle/editCycle.js")}}"></script>
    <script src="{{asset("/resources/plugins/uploadify/jquery.uploadify.min.js")}}"></script>
    <script src="{{asset('/resources/plugins/daterangepicker/moment.js')}}"></script>
    <script src="{{asset("/resources/plugins/daterangepicker/daterangepicker-dob.js")}}"></script>
@endsection

@section("js")
    <script type="text/javascript">
        //待上传图片预览
        $("#cycle_img").change(function () {
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