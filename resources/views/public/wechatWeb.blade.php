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
            width: 3.7rem;
            height: 3.7rem;
            float: right;
            margin-top: -100px;
            background-image: url(http://pan.baidu.com/share/qrcode?w=300&h=300&url=http://pingjia.ngrok.cc/laravel-master/public/crop/scanBinCode/{{$cropInfo['id']}};);
            position: relative;
            background-size: 100% 100%;
        }

        .cycle_img {
            width: 5.5rem;
            height: 4.7rem;
            margin-top: -5rem;
        }
        .weight_cl {
            font-weight: 500;
        }
    </style>
</head>
<body>

<header id="header" class="clearfix">太仓市海丰农产品质量追溯</header>
<div id="content">
    <div class="product_select">
        <div class="product_select_title tc weight_cl">
            <span>太仓市海丰农产品质量追溯</span>
        </div>
        <div style="margin-top: 0.3rem;height: 3rem;">
            <img style="margin-left: 0rem; width: 2.1rem; height: 1.7rem;" src="{{$cropInfo['crop_img']}}">
            <div style="float: right; margin-right: 0.5rem;">
                <p style="font-size: 0.5rem;font-weight: 600;">{{$cropInfo['crop_name']}}</p>
                <div style="word-break: normal; width: 4.5rem;text-align: left;margin-right: 0.1rem">{{$cropInfo['crop_describe']}}
                </div>
            </div>
        </div>

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
        @foreach($cropInfo['cycleList'] as $key=>$cycle)
            <div class="product_classify">
                <div class="bd_left"></div>
                <div class="bd_title clearfix">
                    <div class="bd_circle tc l">{{$key+1}}</div>
                    <div class="bd_title_letter l tc" style="font-size: 0.32rem; margin-left: 1.7rem;">{{$cycle['cycle_name']}}</div>
                </div>
                <div class="bd_content clearfix">
                    <div class="bd_empty tc l"></div>
                    <div class="bd_content_letter l tc" style="font-size: 0.4rem; margin-left: 0rem">{{$cycle['cycle_section']}}</div>
                </div>
                <div class="bd_content clearfix"></div>
                <div class="bd_content clearfix"></div>
                <div class="bd_content clearfix"></div>
                <div class="bd_content clearfix"></div>
                <div class="bd_content clearfix"></div>
                <div class="bd_content clearfix"></div>
                <div class="bd_content clearfix"></div>
                <div class="bd_content clearfix"></div>
                <div class="bd_content clearfix">
                    <div class="bd_empty tc l"></div>
                    <div class="bd_content_letter l tc">
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
            @foreach($cropInfo['cycleList'] as $key=>$cycle)
                @if($cycle['cycle_describe'])
                    <p>{{$key + 1}}、{{$cycle['cycle_describe']}}</p>
                    <br/>
                @endif
            @endforeach
        </div>
        <div class="link-me">
            <img class="bin_code" src="{{$aboutInfo->about_img}}"/>
        </div>
    </div>
    {{--<div class="connectUs tc" style="color: #F96E57;word-break: normal;text-align: left; margin-left: 0.5rem">--}}
        {{--{{$aboutInfo->about_describe}}--}}
    {{--</div>--}}
</footer>

</body>
</html>