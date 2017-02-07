<?php 
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年1月25日-下午4:39:41
 */
namespace MoenSun\MSORM;
class MSModelStatic{
	public static function toArray($obj){
		if(is_object($obj)){
			if($obj instanceof \stdClass){
				return json_decode(json_encode($obj),true);
			}else {
				return get_object_vars($obj);
			}
			
		}else {
			return $obj;
		}
	}	
	
	public static function sqlRegular($str){
		return preg_replace("/(?<!\\\)\'/", "\'",$str);
	}
	
}
?>