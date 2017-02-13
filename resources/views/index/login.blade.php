<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>农产品管理平台</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{asset('/resources/css/public/bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/resources/css/public/AdminLTE.min.css')}}">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page login">
<div class="login-box">
    <div class="login-logo">
        <b>登录</b>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg"></p>

        <div class="alert alert-error" style="display:none;">

            <span>请输入用户登录信息</span>

        </div>

        <form action="" method="post" id="login_form">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="账号" name="account_name" id="account_name">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="密码" name="password" id="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
        </form>

        <button type="submit" class="btn btn-primary btn-block btn-flat" id="submit">登录</button>

    </div>
</div>

<!-- jQuery 2.2.0 -->
<script src="{{asset('/resources/plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>
<script src="{{asset('/resources/plugins/jQuery/jquery.validate.min.js')}}"></script>
<script src="{{asset('/resources/plugins/jQuery/additional-methods.min.js')}}"></script>
<script src="{{asset('/resources/js/public/md5-min.js')}}"></script>
<script src="{{asset('/resources/js/public/public.js')}}"></script>
<script src="{{asset('/resources/js/login/login.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('/resources/js/public/bootstrap.min.js')}}"></script>
</body>
</html>
