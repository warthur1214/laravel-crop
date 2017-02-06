@extends("base")

@section("body")
    <body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                欢迎<strong>{{$display_name}}</strong>，现在是{{$date}}！
            </h1>
            <ol class="breadcrumb">
                <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li> -->
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                </div>
                <!-- /.row -->
            </div>
        </section>
    </div>
    </body>
@endsection
