<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年4月1日-下午11:47:49
 */
namespace MoenSun\MSLaravelExtension;
use MoenSun\MSConfig\MSConfig;
use MoenSun\MSConfig\MSFolderConfig;
class MSLaravelPathConfig{
	public static function getNoPicPath(){
		return MSLaravelRequest::getBaseUrl()."/resources/images/no_image.gif";
	}
	
	public static function getBaseUrl(){
		if(preg_match('/localhost|(\d{1,3}\.\d{1,3}\.\d{1,3}.\d{1,3})/', MSLaravelRequest::getBaseUrl()."/../")){
				
		}else {
			return MSLaravelRequest::getBaseUrl()."/../../upload/";
		}
	}
	
	public static function getFileBaseUrl(){
		if(!MSConfig::$useOss){
			if(preg_match("/(localhost|(\d{0,3}\.\d{0,3}\.\d{0,3}\.\d{0,3}))((\:\d+){0,1})/",$_SERVER["HTTP_HOST"])){
				return MSLaravelRequest::getBaseUrl()."/../../upload/";
			}else {
				return MSConfig::$fileUrl;
			}
		}else {
			return MSConfig::$fileUrl;
		}
	}
	
	public static function getBasePath(){
		return \Yii::$app->basePath."/../upload/";
	}
	
	
	/**
	 * 获取Url
	 * @param unknown $use
	 * @return string
	 */
	public static function getUrl($use){
		return self::getFileBaseUrl().MSFolderConfig::getBaseUploadFloder($use);
	}
	/**
	 * 获取上传绝对路径
	 * @param unknown $use
	 * @return string
	 */
	public static function getFloder($use){
		return self::getBasePath().MSFolderConfig::getBaseUploadFloder($use);
	}
	
	
}