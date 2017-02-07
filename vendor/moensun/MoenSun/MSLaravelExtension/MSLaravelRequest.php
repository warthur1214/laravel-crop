<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年4月1日-下午11:43:22
 */
namespace MoenSun\MSLaravelExtension;
class MSLaravelRequest{
	public static function getBaseUrl(){
		//return (isset($_SERVER['HTTPS'])?"https://":"http://").$_SERVER["HTTP_HOST"].preg_replace("/\\\/", "",dirname($_SERVER['SCRIPT_NAME']));
		return preg_replace("/[\/\\\]$/","",(isset($_SERVER['HTTPS'])?"https://":"http://").$_SERVER["HTTP_HOST"].dirname($_SERVER['SCRIPT_NAME']));
	}
}