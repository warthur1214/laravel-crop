<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年5月30日-下午10:29:42
 */
namespace MoenSun\MSWeChatV3\WechatUrl;
use MoenSun\MSConfig\MSConfig;
use MoenSun\MSWeChatV3\MSWechatBaseInterface;
use MoenSun\MSUtil\device\MSDeviceJudeg;
class MSWechatUrl{
	
	public static function getWechatUrl($url,$state="STATE",$scope=null){
		if(MSDeviceJudeg::isMobile()){
			$url.=(strpos($url,"?")?"&":"?")."random=".uniqid();
			return MSWechatBaseInterface::getRedirectUrl($url,$state,$scope);
		}else {
			return $url;
		}
	}
}
?>