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
</head> 

<script>

</script>
<body>

<header id="header" class="clearfix">太仓市海丰农产品质量追溯</header>
<div id="content">
	<div class="product_select">
		<div class="product_select_title tc">
			<span>太仓市海丰农产品质量追溯</span>
		</div>	
		<p class="tc">{{$cropInfo['crop_name']}}</p>
		<p class="tc">{{$cropInfo['crop_describe']}}</p>

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
		<!-- 重复模块 -->
		<div class="product_classify">
			<div class="bd_left"></div>
			<div class="bd_title clearfix">
				<div class="bd_circle tc l">*</div>
				<div class="bd_title_letter l">种子产品</div>
			</div>
			<div class="bd_content clearfix">
				<div class="bd_empty tc l"></div>
				<div class="bd_content_letter l">黄豆</div>
			</div>
		</div>
		<!-- 重复模块 -->
		<!-- 重复模块 -->
		<div class="product_classify">
			<div class="bd_left"></div>
			<div class="bd_title clearfix">
				<div class="bd_circle tc l">*</div>
				<div class="bd_title_letter l">种子产品</div>
			</div>
			<div class="bd_content clearfix">
				<div class="bd_empty tc l"></div>
				<div class="bd_content_letter l">黄豆</div>
			</div>
		</div>
		<!-- 重复模块 -->
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
			<p>1、测试发现提交没有用</p>
		</div>
		<div class="r">
			
		</div>
	</div>
	<div class="connectUs tc">
		联系我们
	</div>
</footer>
		
</body>
</html>