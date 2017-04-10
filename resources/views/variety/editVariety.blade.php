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
            修改农产品节点
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
                    <tr class="form-group">
                        <td class="title" colspan="2"><i class="fa fa fa-info-circle"></i> 修改品类</td>
                        <td>
                            <input type="hidden" class="form-control" id="variety_id" name="variety_id"
                                   value="{{$varietyInfo['id']}}" placeholder="品类名称">
                        </td>
                    </tr>
                    <tr class="form-group">
                        <th>品类名称 <span class="text-red">*</span></th>
                        <td>
                            <input type="text" class="form-control" id="variety_name" name="variety_name"
                                   value="{{$varietyInfo['variety_name']}}" placeholder="品类名称">
                        </td>
                    </tr>
                    <tr class="form-group">
                        <th>品类描述</th>
                        <td colspan="5">
                            <div class="form-group">
                                <textarea class="form-control" id="variety_describe"
                                          name="variety_describe"
                                          placeholder="输入品类描述信息">{{$varietyInfo['variety_describe']}}</textarea>
                            </div>
                        </td>
                    </tr>
                    <tr class="form-group">
                        <th>是否生效</th>
                        <td>
                            <label>
                                <input type="radio" name="variety_status" class="flat-red"
                                       {{$varietyInfo['variety_status']==0 ? 'checked' : ''}} value="0"> 不生效
                            </label>
                            <label>
                                <input type="radio" name="variety_status" class="flat-red"
                                       {{$varietyInfo['variety_status']==1 ? 'checked' : ''}} value="1"> 生效
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="box-footer clearfix text-center">
            <button type="submit" class="btn btn-primary" id="submit"><i class="fa fa-save"></i> 提交</button>
            <a href="{{config('app.url')}}/variety/varietyList" class="btn btn-default"><i class="fa fa-arrow-left"></i>
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
    <script src="{{asset("/resources/js/variety/editVariety.js")}}"></script>
@endsection