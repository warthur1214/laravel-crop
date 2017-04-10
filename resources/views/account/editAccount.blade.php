@extends("base")

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

        #allmap {
            width: 100%;
            height: 500px;
            overflow: hidden;
        }

        #result {
            width: 100%;
            font-size: 12px;
        }

        #myTablePopup .dataTables_wrapper div.dataTables_info {
            display: none;
        }
    </style>
@endsection

@section("body")
    <body>
    <section class="content-header">
        <h1>
            编辑账号
        </h1>
    </section>
    <!-- general form elements -->
    <div class="box box-cus box-cus-form">
        <div class="alert alert-error" style="display:none;">
            <span>信息不能为空，请输入</span>
        </div>
        <div class="box-body">
            <form role="form" id="info_form">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td class="title" colspan="6"><i class="fa fa fa-info-circle"></i> 基本信息</td>
                    </tr>
                    <tr>
                        <th><span class="text-red">*</span>账号名称</th>
                        <td>
                            <input type="text" class="form-control" name="account_name" placeholder="请输入账号名称"
                                   readonly="readonly" required>
                        </td>
                        <th><span class="text-red">*</span>账号姓名</th>
                        <td>
                            <input type="text" class="form-control" name="display_name" placeholder="请输入账号姓名"
                                   required>
                        </td>
                        <th><span class="text-red">*</span>账号密码</th>
                        <td>
                            <input type="password" class="form-control" name="password" placeholder="请输入账号密码" required>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="box-footer clearfix text-center">
            <button type="button" class="btn btn-primary" id="submit"><i class="fa fa-save"></i> 提交</button>
            <a href="{{config('app.url')}}/account/accountList" class="btn btn-default"><i class="fa fa-arrow-left"></i> 返回</a>
        </div>
    </div>
    </body>
@endsection

@section("script")

    <script src="{{asset("/resources/plugins/jQuery/jquery.validate.min.js")}}"></script>
    <script src="{{asset("/resources/plugins/jQuery/messages_zh.js")}}"></script>
    <script src="{{asset("/resources/js/public/validateFormCus.js")}}"></script>
    <script src="{{asset("/resources/js/public/vue.js")}}"></script>
    <script type="text/javascript" src="{{asset("/resources/js/role/roleTree.js")}}"></script>
    <!--账号归属 | 前置 roleTree.js -->
    <script type="text/javascript" src="{{asset("/resources/js/role/InitOrgIdTree.js")}}"></script>
    <script type="text/javascript" src="{{asset("/resources/js/account/editAccount.js")}}"></script>
    <script src="{{asset('/resources/js/public/md5-min.js')}}"></script>
@endsection
