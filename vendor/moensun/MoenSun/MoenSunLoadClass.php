<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年3月12日-下午3:49:46
 */
namespace MoenSun;
class MoenSunLoadClass{
	public static function  autoload($class){
		if(0===strpos($class,"MoenSun")){
			if(!class_exists($class)){
				require dirname(__FILE__).'/../'.str_replace("\\", "/",$class).'.php';
			}
		}

	}

	public static function  registerAutoload(){
		spl_autoload_register(array('MoenSun\MoenSunLoadClass', 'autoload'));
	}
}

