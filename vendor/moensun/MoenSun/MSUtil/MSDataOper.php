<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年1月28日-下午11:48:49
 */
namespace MoenSun\MSUtil;
use MoenSun\MSConfig\MSConfig;
class MSDataOper{
	public static function objectToArray($obj){
		if(is_object($obj)){
			return get_object_vars($obj);
		}else {
			return null;
		}
	}
	
	public static function listAndCount($count,$list){
		return array("count"=>$count,"list"=>$list);
	}
	
	public static function editorUrlToTag($str){
		return str_replace(MSConfig::$fileUrl, MSConfig::$fileUrlTag, $str);
	}
	
	public static function editorTagToUrl($str){
		return str_replace(MSConfig::$fileUrlTag,MSConfig::$fileUrl,  $str);
	}
	
}