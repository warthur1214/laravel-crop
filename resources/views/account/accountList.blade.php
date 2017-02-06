@extends("base")

@section("body")
    <body>
    <section class="content-header">
        <span class="pull-right">
        <a href="{{env("APP_URL")}}/Account/addAccount" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> 添加账号</a>
      </span>
        <h1>
            账号管理
        </h1>
    </section>
    <div class="box marginB0">
        <form class="form-horizontal padding10" role="form" id="submit_form">
            <div class="form-group">
                <label for="account_name" class="col-sm-1 control-label">账号名称</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="account_name" name="account_name" placeholder="请输入账号名称">
                </div>
                <label for="display_name" class="col-sm-1 control-label">账号姓名</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="display_name" name="display_name" placeholder="请输入账号姓名">
                </div>
                <label for="organListGroup" class="col-sm-1 control-label">账号归属</label>
                <div class="col-sm-2">
                    <div class="relative">
                        <input type="hidden" name="organ_id">
                        <input type="text" class="form-control" id="organ_id" placeholder="选择所属企业或机构"
                               readonly="readonly" required style="background-color: transparent;">
                        <div id="roleTree" class="role-tree-popup hide"></div>
                    </div>
                </div>
            </div>
            <div class="text-center"><a href="javascript:;" id="searchBtn" class="btn btn-sm btn-primary selectInfo"><i
                            class="fa fa-search"></i> 搜索</a></div>
        </form>
        <div class="box-body">
            <table id="myTable" class="table table-bordered table-hover">
            </table>
        </div>
    </div>
    </body>
@endsection

<!-- /.box -->
<link rel="stylesheet" href="{{asset("/public/plugins/datatables/dataTables.bootstrap.css")}}">
<script src="{{asset("/public/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("/public/js/public/dataTableCus.js")}}"></script>
<script type="text/javascript" src="{{asset("/public/js/role/roleTree.js")}}"></script>
<!--账号归属 | 前置 roleTree.js -->
<script type="text/javascript" src="{{asset("/public/js/role/InitOrgIdTree.js")}}"></script>
<script type="text/javascript" src="{{asset("/public/js/account/accountList.js")}}"></script>