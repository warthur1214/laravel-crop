<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年7月19日-下午4:50:17
 */
namespace MoenSun\MSUtil\conversion;
class MSDataConversion{
	public static function stdClassToArray($obj){
		try {
			return json_decode(json_encode($obj),true);
		} catch (Exception $e) {
			throw new \Exception($e);
		}
	}
	
	public static function objectToArray($obj){
		if(is_object($obj)){
			return get_object_vars($obj);
		}else {
			return null;
		}
	}
	
}