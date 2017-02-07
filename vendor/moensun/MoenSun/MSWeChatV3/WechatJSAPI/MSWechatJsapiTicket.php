<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年5月29日-下午11:01:34
 */
namespace MoenSun\MSWeChatV3\WechatJSAPI;
use MoenSun\MSUtil\http\MSCurl;
use MoenSun\MSUtil\random\MSRandom;
use MoenSun\MSUtil\url\MSUrl;
class MSWechatJsapiTicket{
	
	public static function getJsapiTicket($accessToken){
		try {
			$url="https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=".$accessToken."&type=jsapi";
			$result=MSCurl::get($url);
			$resultJson=json_decode($result,true);
			if($resultJson["errcode"]==0){
				return $resultJson["ticket"];
			}
		} catch (Exception $e) {
			throw new \Exception($e);
		}
	}
	
	public static function getWXConfig($jsapiTicket){
		try {
			$noncestr=MSRandom::getNonceStr();
			$timestamp=time();
			$arr=array("noncestr"=>$noncestr,"jsapi_ticket"=>$jsapiTicket,"timestamp"=>$timestamp,"url"=>MSUrl::getUrlForWechatForJSAPI());
			ksort($arr);
			$arraySignature=array();
			foreach ($arr as $key=>$value){
				$arraySignature[]=$key."=".$value;
			}
			$signatureStr=implode("&", $arraySignature);
			$signature=sha1($signatureStr);
			return array("nonceStr"=>$noncestr,"timestamp"=>$timestamp,"signature"=>$signature);
			
		} catch (Exception $e) {
			throw new \Exception($e);
		}
	}
	
}