@extends("base")

@section("style")
    <style type="text/css">
        body {
            font-size: 1rem;
        }

        .hr {
            height: 1px;
            border: none;
            border-top:1px solid #555555;
            width: 100%;
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
        }
        div {
            padding-left: 20%;
            padding-right: 20%;
            margin-top: 2.7rem;
        }

        img {
            margin-left: 2.5rem;
            width: 10rem;
            height: 10rem;
        }

        p {
            margin: 0 auto;
            font-size: 0.5rem;
        }
    </style>
@endsection

@section("body")

    <div>
        <label>
            <span>太仓市海丰农产品质量追溯管理系统</span>
        </label>
        <hr class="hr"/>
        <p>产品名称: {{$cropName}}</p>
        <p>追&nbsp;&nbsp;溯&nbsp;码:  &nbsp;{{$cropNumber}}</p>
        <p>生产企业: 太仓市海丰农场专业合作社</p>
        <p>产品重量: {{$cropWeight}} kg</p>
        <p>销售去向: 门店</p>
        <img src='http://pan.baidu.com/share/qrcode?w=300&h=300&url=http://www.tcwanfeng.com/crop/public/crop/scanBinCode/{{$cropId}}'
             title='农产品追溯二维码'/>
        <hr class="hr"/>
        <p>追溯地址：www.tcwanfeng.com/crop/public</p>
    </div>

@endsection