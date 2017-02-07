<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年4月6日-下午2:08:31
 */
namespace MoenSun\MSUtil;
class MSDataConversion{
	public static function stdClassToArray($obj){
		try {
			return json_decode(json_encode($obj),true);
		} catch (Exception $e) {
			throw new \Exception($e);
		}
	}
}