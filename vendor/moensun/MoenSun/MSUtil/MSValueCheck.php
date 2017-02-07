<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年1月26日-下午11:44:06
 */
namespace MoenSun\MSUtil;
class MSValueCheck{
	public static  function isEmptyOrNull($val=null){
		$return=true;
		if(isset($val)&&($val!="")&&($val!=null)&&($val!="undefined")&&($val!="null")){
			$return=false;
		}
		return $return;
	}
}
?>