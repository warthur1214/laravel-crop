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
            width: 2rem;
            height: 2rem;
            background-size: 100% 100%;
            float: right;
        }

        .cycle_img {
            width: 5.5rem;
            height: 4.7rem;
            margin-top: -5rem;
        }

        .weight_cl {
            font-weight: 700;
            font-size: 0.5rem;
        }
    </style>
</head>
<body>

<header id="header" class="clearfix">太仓市海丰农产品质量追溯</header>
<div id="content">
    <div class="product_select">
        <div class="product_select_title tc weight_cl">
            <span class="weight_cl">太仓市海丰农产品质量追溯</span>
        </div>
        <div style="margin-top: 0.3rem;height: 3rem;">
            <img style="margin-left: 0.2rem; margin-top: 0.5rem; width: 2.1rem; height: 1.7rem;"
                 src="{{$cropInfo['crop_img']}}">
            <div style="float: right; padding-left: 0.6rem;">
                <p style="font-size: 0.5rem;font-weight: 600; margin-right: 2rem">{{$cropInfo['crop_name']}}</p>
                <div style="word-break: normal; width: 4.5rem;text-align: left;margin-right: 0rem;margin-left: 0rem">{{$cropInfo['crop_describe']}}
                </div>
            </div>
        </div>

    </div>
    <div class="split tc clearfix">
        <div class="l seperate"></div>
        <div class="cube"></div>
        <div class="r seperate"></div>
    </div>

    <div class="product_cycle tc weight_cl">
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
                    <div class="bd_title_letter l tc weight_cl"
                         style="margin-left: 1.7rem;">{{$cycle['cycle_name']}}</div>
                </div>
                <div class="bd_content clearfix">
                    <div class="bd_empty tc l"></div>
                    <div class="bd_content_letter l tc"
                         style="font-size: 40px; margin-left: 0rem">{{$cycle['cycle_section']}}</div>
                </div>
                @if($cycle['cycle_img'])
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
                @endif
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
                <div class="tc border_title weight_cl">
	    			生长阶段的施药及施肥情况
	    		</div>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="clearfix">
        <div class="l">
            <h3 class="footer_title">施药及施肥情况描述</h3>
            @foreach($cropInfo['cycleList'] as $key=>$cycle)
                <p>{{$key + 1}}、{{$cycle['cycle_describe']}}</p>
                <br/>
            @endforeach
        </div>

        <div class="link-me">
            <img class="bin_code" src="{{$aboutInfo->about_img}}"/>
        </div>
    </div>

    <div class="connectUs tc" style="color: #F96E57;word-break: normal;text-align: left; margin-left: 1rem">
        {{$aboutInfo->about_describe}}
    </div>
</footer>

</body>
</html>