<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年5月26日-上午12:05:23
 */
namespace MoenSun\MSLaravelExtension;
use Illuminate\Support\Facades\Cache;
use MoenSun\MSWeChatV3\MSWechatBaseInterface;
use MoenSun\MSWeChatV3\WechatJSAPI\MSWechatJsapiTicket;
class MSLaravelWechat{
	public static function getWechatAccessToken(){
		try {
			$accessToken=null;
			if(Cache::has("moensunwechataccesstoken")){
				$accessToken=Cache::get("moensunwechataccesstoken");
			}else {
				$accessToken=MSWechatBaseInterface::getAccessToken();
				Cache::add("moensunwechataccesstoken",$accessToken,110);
			}
			return $accessToken;
		} catch (Exception $e) {
		}
	}
	
	public static function getWechatJsapiTicket(){
		try {
			$accessToken=self::getWechatAccessToken();
			$jsapiTicket=null;
			if(Cache::has("moensunwechatjsapiticket")){
				$jsapiTicket=Cache::get("moensunwechatjsapiticket");
			}else {
				$jsapiTicket=MSWechatJsapiTicket::getJsapiTicket($accessToken);
				Cache::add("moensunwechatjsapiticket",$jsapiTicket,110);
			}
			return $jsapiTicket;	
		} catch (Exception $e) {
		
		}
	}
	
}