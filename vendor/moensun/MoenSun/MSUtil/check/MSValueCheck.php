<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年7月19日-下午4:54:02
 */
namespace MoenSun\MSUtil\check;
class MSValueCheck{
	public static  function isEmptyOrNull($val=null){
		$return=true;
		if(isset($val)&&($val!="")&&($val!=null)&&($val!="undefined")&&($val!="null")){
			$return=false;
		}
		return $return;
	}
}