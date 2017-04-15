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

        .table > tbody > tr.table-box-td > td {
            padding: 20px 40px;
        }

        .table-box-td table {
            width: 100%;
        }

        .table-box-td table th,
        .table-box-td table td {
            padding: 3px 0;
        }

        .form-horizontal {
            padding-bottom: 0;
        }

        .form-group {
            margin-bottom: 0;
        }
    </style>
@endsection

@section("body")
    <body>
    <section class="content-header">
        <span class="pull-right">
        <a href="{{config('app.url')}}/cycle/addCycle" class="btn btn-sm btn-primary"> <i
                    class="fa fa-plus"></i> 添加周期节点</a>
        </span>
        <h1>
            周期节点列表
        </h1>
    </section>
    <div class="box marginB0">
        <form class="form-horizontal padding10" role="form" id="submit_form">
        </form>
        <div class="box-body">
            <!-- alert start -->
            <div class="alert alert_page_success" style="display:none;">
            </div>
            <div class="alert alert_page_error" style="display:none;">
            </div>
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>节点id</th>
                    <th>周期节点名称</th>
                    <th>周期节点描述</th>
                    <th>周期序号</th>
                    <th>是否生效</th>
                    <th>创建时间</th>
                    <th>修改时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    </body>
@endsection

@section("script")
    <link rel="stylesheet" href="{{asset("/resources/plugins/datatables/dataTables.bootstrap.css")}}">
    <script src="{{asset("/resources/plugins/datatables/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("/resources/js/public/dataTableCus.js")}}"></script>
    <script src="{{asset("/resources/js/cycle/cycleList.js")}}"></script>
@endsection