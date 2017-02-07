<?php
namespace MoenSun\MSYII2Extension;
use MoenSun\MSConfig\MSConfig;
use MoenSun\MSConfig\MSFolderConfig;
class MSYII2PathConfig{
	public static function getNoPicPath(){
		return MSYII2Request::getBaseUrl()."/resources/images/no_image.gif";
	}
	
	public static function getFileBaseUrl(){
		if(!MSConfig::$useOss){
			if(preg_match("/(localhost|(\d{0,3}\.\d{0,3}\.\d{0,3}\.\d{0,3}))((\:\d+){0,1})/",$_SERVER["HTTP_HOST"])){
				return MSYII2Request::getBaseUrl()."/../../upload/";
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
?>