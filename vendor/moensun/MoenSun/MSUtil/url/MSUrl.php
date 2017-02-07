<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年5月29日-下午11:24:41
 */
namespace MoenSun\MSUtil\url;
class MSUrl{
	public static function getFullUrl(){
		return (isset($_SERVER['HTTPS'])?"https://":"http://").$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	}
	
	public static function getFullUrlWithOutPort(){
		return (isset($_SERVER['HTTPS'])?"https://":"http://").$_SERVER['SERVER_NAME'].(($_SERVER["SERVER_PORT"]=="80")?"":':'.$_SERVER["SERVER_PORT"]).$_SERVER["REQUEST_URI"];
	}
	
	public static function getUrlForWechatForJSAPI(){
		return (isset($_SERVER['HTTPS'])?"https://":"http://").$_SERVER['SERVER_NAME'].(($_SERVER["SERVER_PORT"]=="80")?"":':'.$_SERVER["SERVER_PORT"]).$_SERVER["REQUEST_URI"];
	}
}