<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年4月26日-下午4:40:21
 */
namespace MoenSun\MSWeChatV3;

use MoenSun\MSUtil\http\MSCurl;
use MoenSun\MSUtil\url\MSUrl;
class MSWechatBaseInterface{
	public static function getAccessToken(){
		$access_token_url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".MSWechatConfig::APPID."&secret=".MSWechatConfig::AppSecret;
		$result= MSCurl::get($access_token_url);
		if($result){
			$resultJson=json_decode($result,true);
			return $resultJson["access_token"];
		}else {
			return false;
		}
	}
	
	public static function getRedirectUrl($url,$scope=null,$state="STATE"){
		return "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".MSWechatConfig::APPID."&redirect_uri=".urlencode($url)."&response_type=code&scope=".($scope?"snsapi_userinfo":"snsapi_base")."&state=".$state."&connect_redirect=1#wechat_redirect";
	}
	
	public static function getOauth2AccessToken($code){
		$url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=".MSWechatConfig::APPID."&secret=".MSWechatConfig::AppSecret."&code=".$code."&grant_type=authorization_code";
		$result=MSCurl::get($url);
		return json_decode($result,true);
	}
	
	public static function getOpenId($code){
		try {
			$result=self::getOauth2AccessToken($code);
			return @$result["openid"];
		} catch (Exception $e) {
			throw new \Exception($e);
		}
	}
	
	public static function getUserInfo($code){
		try {
			$result=self::getOauth2AccessToken($code);
			$url="https://api.weixin.qq.com/sns/userinfo?access_token=".$result["access_token"]."&openid=".$result["openid"]."&lang=zh_CN";
			$result=MSCurl::get($url);
			$resultJson=json_decode($result,true);
			if(@$resultJson["errcode"]){
				return false;
			}else {
				return $resultJson;
			}			
		} catch (Exception $e) {
			throw new \Exception($e);
		}
	}
	
}