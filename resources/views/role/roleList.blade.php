@extends("base")


@section("body")
    <body>
    <section class="content-header">
        <span class="pull-right">
        <a href="{{config('app.url')}}/role/addRole" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> 添加角色</a>
        <input type="hidden" id="app_url" value="{{config('app.url')}}">
      </span>
        <h1>
            角色管理
        </h1>
    </section>
    <div class="box marginB0">
        <div class="box-body row">
            {{--<div class="col-sm-3">--}}
                {{--<h4>角色查询</h4>--}}
                {{--<div id="roleTree"></div>--}}
            {{--</div>--}}
            <div class="col-sm-9">
                <table id="myTable" class="table table-bordered table-hover">
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    </body>
@endsection

@section("script")
    <link rel="stylesheet" href="{{asset("/resources/plugins/datatables/dataTables.bootstrap.css")}}">
    <script src="{{asset("/resources/plugins/datatables/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("/resources/js/public/dataTableCus.js")}}"></script>
    <script type="text/javascript" src="{{asset('/resources/js/role/roleTree.js')}}"></script>
    <script type="text/javascript" src="{{asset("/resources/js/role/roleList.js")}}"></script>
@endsection