<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta content="telephone=no,email=no" name="format-detection">


    <script src="{{asset('/resources/js/public/flexible_css.debug.js')}}"></script>
    <script src="{{asset('/resources/js/public/flexible.debug.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('/resources/css/public/wechat.css')}}">
    <style>
        .bin_code {
            width: 250px;
            height: 250px;
            float: right;
            margin-top: -160px;
            background-image: url(http://pan.baidu.com/share/qrcode?w=300&h=300&url=http://pingjia.ngrok.cc/laravel-master/public/crop/scanBinCode/{{$cropInfo['id']}};);
            position: relative;
            background-size: 100% 100%;
        }

        .cycle_img {
            width: 300px;
            height: 200px;
            margin-top: -200px;
        }
    </style>
</head>
<body>

<header id="header" class="clearfix">太仓市海丰农产品质量追溯</header>
<div id="content">
    <div class="product_select">
        <div class="product_select_title tc">
            <span>太仓市海丰农产品质量追溯</span>
        </div>
        <p class="tc">{{$cropInfo['crop_name']}}</p>
        <p class="tc">{{$cropInfo['crop_describe']}}</p>
        <img src="{{$cropInfo['crop_img']}}">
    </div>
    <div class="split tc clearfix">
        <div class="l seperate"></div>
        <div class="cube"></div>
        <div class="r seperate"></div>
    </div>

    <div class="product_cycle tc">
		农产品生长周期
	</div>
    <div class="product_point tc">
		↓↓↓
	</div>
    <div class="repeat_wrap">
        @foreach($cropInfo['cycleList'] as $cycle)
            <div class="product_classify">
                <div class="bd_left"></div>
                <div class="bd_title clearfix">
                    <div class="bd_circle tc l">*</div>
                    <div class="bd_title_letter l">{{$cycle['cycle_name']}}</div>
                </div>
                <div class="bd_content clearfix">
                    <div class="bd_empty tc l"></div>
                    <div class="bd_content_letter l">{{$cycle['cycle_section']}}</div>
                </div>
                <div class="bd_content clearfix"></div>
                <div class="bd_content clearfix"></div>
                <div class="bd_content clearfix"></div>
                <div class="bd_content clearfix"></div>
                <div class="bd_content clearfix">
                    <div class="bd_empty tc l"></div>
                    <div class="bd_content_letter l">
                        <img class="cycle_img" src="{{$cycle['cycle_img']}}">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="split tc clearfix">
        <div class="l seperate"></div>
        <div class="cube"></div>
        <div class="r seperate"></div>
    </div>

    <div class="border_contain">
        <div class="border_outer">
            <div class="border_inner">
                <div class="tc border_title">
	    			生长阶段的施药及施肥情况
	    		</div>
            </div>
        </div>
    </div>
</div>
<footer id="footer">
    <div class="clearfix">
        <div class="l">
            <h3 class="footer_title">周期描述</h3>
            @foreach($cropInfo['cycleList'] as $key=>$cycle)
                <p>{{$key + 1}}、{{$cycle['cycle_describe']}}</p>
                <br/>
            @endforeach
        </div>
        <div class="bin_code">
            <img src="" />
        </div>
    </div>
    <div class="connectUs tc">
		<a href="http://www.tcwanfeng.com">联系我们</a>
	</div>
</footer>

</body>
</html>