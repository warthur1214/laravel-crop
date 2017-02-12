<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>农产品管理平台</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset("/resources/css/public/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("/resources/css/public/font-awesome.min.css")}}">
    <link rel="stylesheet" href="{{asset("/resources/css/public/AdminLTE.min.css")}}">
    <link rel="stylesheet" href="{{asset("/resources/css/public/skins/_all-skins.min.css")}}">
    <link rel="stylesheet" href="{{asset("/resources/css/style/style.css")}}">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    @yield("style")
</head>

@yield("body")

</html>
<!-- jQuery 2.2.0 -->
<script src="{{asset("/resources/plugins/jQuery/jQuery-2.2.0.min.js")}}"></script>
<script src="{{asset("/resources/plugins/jQuery/jquery-ui.js")}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset("/resources/js/public/bootstrap.min.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{asset("/resources/js/public/app.min.js")}}"></script>

<!-- radio checkbox 美化-->
<link href="{{asset("/resources/plugins/iCheck/minimal/_all.css")}}" rel="stylesheet">
<script src="{{asset("/resources/plugins/iCheck/icheck.min.js")}}"></script>

<!-- modal.js 封装过的提示框组件 -->
<script src="{{asset("/resources/js/public/modal.js")}}"></script>
<script src="{{asset("/resources/js/public/public.js")}}"></script>

@yield("script")

@yield("js")