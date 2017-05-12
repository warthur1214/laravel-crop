@extends("base")

@section("style")

    <link rel="stylesheet" href="{{("/resources/plugins/datatables/dataTables.bootstrap.css")}}">
    <style type="text/css">
        .img_browser {
            height: 300px;
            width: 300px;
        }
        .ta_float {
            float: left;
            width: 60%;
        }
    </style>
@endsection

@section("body")
    <body>
    <section class="content-header">
        <h1>
            添加联系我们信息
        </h1>
    </section>
    <div class="box box-cus box-cus-form">
        <div class="alert alert-error" style="display:none;">
            <span>信息不能为空，请输入</span>
        </div>
        <div class="box-body">

            <input type="hidden" class="form-control" id="app_url"
                   value="{{config('app.url')}}">
            <input type="hidden" class="form-control" id="about_id"
                   value="@if($aboutInfo) {{$aboutInfo->about_id}}@endif">
            <form role="form" id="info_form">
                <table class="table table-bordered">
                    <tbody>
                    <tr class="form-group">
                        <th>上传二维码</th>
                        <td colspan="5">
                            <input type="file" class="form-control" style="width: 60%;float: left;" id="about_img"
                                   name="about_img" placeholder="联系我们二维码">
                            <span class="a1" style="margin-left: 20px;">建议上传 300*300像素</span>
                        </td>
                    </tr>

                    <tr class="form-group">
                        <th>图片预览</th>
                        <td colspan="5">
                            <div class="form-group">
                                <img src="@if($aboutInfo) {{$aboutInfo->about_img}}@endif" class="img_browser" id="img_browser"
                                     title="建议上传 300*300像素">
                            </div>
                        </td>
                    </tr>
                    <tr class="form-group">
                        <th>联系信息描述</th>
                        <td colspan="5">
                            <div class="form-group"><textarea class="form-control ta_float" id="about_describe"
                                                              name="about_describe"
                                                              placeholder="输入联系信息描述">@if($aboutInfo) {{$aboutInfo->about_describe}}@endif</textarea>
                            </div>
                            <span class="span1 a1">描述用于手机页面，建议55个字以内</span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="box-footer clearfix text-center">
            <button type="submit" class="btn btn-primary" id="submit"><i class="fa fa-save"></i> 提交</button>
        </div>
    </div>
    </body>
@endsection

@section("script")
    <!-- DataTables -->
    <script src="{{asset('/resources/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/resources/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset("/resources/plugins/jQuery/jquery.validate.min.js")}}"></script>
    <script src="{{asset("/resources/plugins/jQuery/additional-methods.min.js")}}"></script>
    <script src="{{asset("/resources/js/wechat/addAbout.js")}}"></script>
@endsection

@section("js")
    <script type="text/javascript">
        //待上传图片预览
        $("#about_img").change(function () {
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