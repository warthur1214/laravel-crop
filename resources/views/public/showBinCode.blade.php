@extends("base")

@section("style")
    <style type="text/css">
        body {
            font-size: 23px;
        }
        .content {
            font-size: 16px;
            margin-left: 0;
        }
        .hr {
            height: 1px;
            border: none;
            border-top:1px solid #555555;
            width: 100%;
        }
    </style>
@endsection

@section("body")

    <div style="padding-left: 25%; padding-right: 23%; margin-top: 5rem;">
        <label style="text-align: center">
            <span>太仓市海丰农产品质量追溯管理系统</span>
        </label>
        <hr class="hr"/>
        <label>产品名称：<span class="content">{{$cropName}}</span></label><br>
        <label>追&nbsp;&nbsp;溯&nbsp;码： <span class="content">{{$cropNumber}}</span></label><br>
        <label>生产企业：<span class="content">太仓市海丰农场专业合作社</span></label><br>
        <label>产品重量：<span class="content">{{$cropWeight}}</span> kg</label><br>
        <label>销售去向：<span class="content">门店</span></label><br>
        <img style='margin-left: 1rem; width: 240px;height: 240px;'
             src='http://pan.baidu.com/share/qrcode?w=300&h=300&url={{env("APP_URL")}}/crop/scanBinCode/{{$cropId}}'
             title='农产品追溯二维码'/>
        <br>
        <hr class="hr"/>
        <label>追溯地址：<span class="content">www.ncpziaq.suzhou.gov.cn</span></label>
    </div>

@endsection

@section("script")

    <script src="{{asset("/resources/js/crop/showBinCode.js")}}"></script>
    <script src="{{asset("/resources/js/thirdparty/layer/layer.js")}}"></script>

@endsection