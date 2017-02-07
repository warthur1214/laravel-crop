<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年4月26日-下午4:27:20
 */
namespace MoenSun\MSWeChatV3;
use MoenSun\MSUtil\url\MSUrl;
class MSWechatConfig{
	const APPID="wx387e7d84de36db95";
	const AppSecret="7f1610fe507bb0f6c73b1bcb18379c60";
	const MCHID = '1241512802';
	const KEY = 'moensunchenyuxihu20150517baneshi';
	
	public static function getNotify_url(){
		//return MSUrl::getFullUrlWithOutPort()."wechatpay/notify";
		return "http://wechat.chenyuxihu.com/wechatpay/notify";
	}
	
}