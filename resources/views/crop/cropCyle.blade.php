@extends("base")

@section("style")
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset("/resources/plugins/datatables/dataTables.bootstrap.css")}}">
    <link rel="stylesheet" href="{{asset("/resources/plugins/daterangepicker/daterangepicker-bs3.css")}}">
@endsection

@section("body")
    <body>
    <section class="content-header">
        <span class="pull-right"></span>
        <h1>
            配置农产品周期属性
        </h1>
    </section>
    <div class="box box-cus box-cus-form">
        <div class="alert alert-error" style="display:none;">
            <span>信息不能为空，请输入</span>
        </div>
        <div class="box-body">
            <form role="form" id="info_form">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 30px;">
                            <input type="checkbox" title=""/>
                        </th>
                        <th>周期名称</th>
                        <th>周期区间</th>
                        <th>周期描述</th>
                        <th>周期图片</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cycleInfo as $c)
                        <tr>
                            <td>
                                <input type="checkbox" title=""/>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="crop_id" value="{{$crop_id}}"
                                           title=""/>
                                    <input class="form-control" type="hidden" name="cycle_id" value="{{$c['id']}}"
                                           title=""/>
                                    <input class="form-control" type="text" name="cycle_name"
                                           value="{{$c['cycle_name']}}" title="" readonly/>
                                </div>
                            </td>
                            <td>
                                <div class="input-group-addon" style="float: left; width: 39px;height: 34px;">
                                    <i class="fa fa-calendar-times-o" style="margin-top: 4px;"></i>
                                </div>
                                <div>
                                    <input type="text" class="form-control" style="width: 218px;height: 34px;"
                                           id="cycle_section" name="cycle_section" value="{{$c['cycle_section']}}"
                                           placeholder="节点区间">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="cycle_describe"
                                               value="{{$c['cycle_describe']}}" title=""/>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="uploadfile-box no-img clearfix form-group">
                                    <div class="img-box">
                                        @if($c['cycle_img'])
                                            <img style="width: 150px; height: 80px;" src="{{$c['cycle_img']}}" >
                                        @endif
                                    </div>
                                    <input type="hidden" data-name="cycle_img"/>
                                    <span class="file-btn">
                                            <input type="file" accept="image/*" multiple="multiple" name="cycle_img"
                                                   onchange="renderUploadImg(this)"/>
                                        </span>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="4"><a class="btn btn-danger" onclick="removeTr()"><i class="fa fa-remove"></i>
                                删除</a>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </form>
        </div>
        <div class="box-footer clearfix text-center">
            <button type="submit" class="btn btn-primary" id="submit"><i class="fa fa-save"></i> 提交</button>
            <a href="#" onClick="javascript:history.back(-1);" class="btn btn-default"><i class="fa fa-arrow-left"></i>
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
    <script src="{{asset("/resources/js/crop/cropCycle.js")}}"></script>
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