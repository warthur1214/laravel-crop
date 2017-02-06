@extends("base")

@section("body")
    <body class="hold-transition skin-blue sidebar-mini" style="overflow: hidden;">
    <div class="wrapper">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                @foreach($menu as $vals)
                    @if(count($vals) != 0)
                        <li class="treeview">
                            <a href="{{env("APP_URL").$vals['module_url']}}">
                                <span>{{$vals['module_name']}}</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                @foreach($vals['menu_two'] as $val)
                                    <li>
                                        <a href="{{env("APP_URL").$val['module_url']}}" target="myFrame">
                                            <i class="fa fa-circle-o"></i>
                                            {{$val['module_name']}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
            </ul>
        </section>
    </div>
    </body>
@endsection
@section("js")
    <script type="text/javascript">
        $(function () {
            var $firstMenu = $('.sidebar-menu').children('li');
            var menuIco = ["fa-automobile", "fa-location-arrow", "fa-credit-card", "fa-search", "fa-wrench", "fa-users", "fa-database", "fa-edit", "fa-gears"];

            $firstMenu.each(function (i) {
                var $this = $(this);
                $this.children('a').prepend('<i class="fa ' + menuIco[i] + '"></i> ');
            });
            $('.treeview-menu').find('a').click(function () {
                var li = $(this).parent();
                li.addClass('active');
                li.siblings().removeClass('active');
            })
        })
    </script>
@endsection
