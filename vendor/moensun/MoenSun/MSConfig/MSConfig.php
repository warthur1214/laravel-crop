<?php
namespace MoenSun\MSConfig;
class MSConfig{
	public static $objectName="SinkFishWash";
	
	public static  $useOss=true;
	
	public static  $fileUrl="http://oss.chenyuxihu.com/";
	
	public static $fileUrlTag="[{ms_url_tag}]";
	
	public static $imageTypes=array(0=>"jpg",1=>"bmp",3=>"png");
	
	public static $fileTypes=array();
	
	public static $wechatUrlRedirect=true;
	
	public static function getFileTypes($fileType='image'){
		switch ($fileType){
			case 'image':
				return self::$imageTypes;
			case 'file':				
				return self::$fileTypes;
			default:
				return self::$imageTypes;
		}
	}
}
?>