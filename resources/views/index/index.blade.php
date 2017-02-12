@extends("base")

@section("body")

    <body class="hold-transition skin-blue sidebar-mini" style="overflow: hidden;">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="/" class="logo" target="_top">
                <span class="logo-mini"><b>农产品管理平台</b></span>
                <span class="logo-lg"><b>农产品管理平台</b></span>
            </a>
            <nav class="navbar navbar-static-top">
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="{{env("APP_URL")}}/loginOut" target="_top">
                                <i class="fa fa-user"></i>
                                <span class="hidden-xs">退出</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <iframe src="{{env('APP_URL')}}/menu" width="100%" height="100%" scrolling="no"
                    frameborder="0"></iframe>
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div id="content" class="content-wrapper">
            <iframe src="{{env('APP_URL')}}/main" width="100%" height="100%" name="myFrame"
                    scrolling="no"
                    frameborder="0"></iframe>
        </div>
        <div class="control-sidebar-bg"></div>
    </div>
    </body>
@endsection

@section("js")
    <script type="text/javascript">
        $(function () {
            var _h = $('#content').outerHeight();
            $('iframe').outerHeight(_h);
        });
    </script>
@endsection
