<?php 
/**
 * @Company MoenSun
 * @Author Bane.Shi 2015年1月25日-下午4:11:26
 */
namespace MoenSun\MSUtil;
class MSRequest{
	/**
	 * 获取url参数
	 * @param unknown $val
	 * @param string $required
	 * @throws Exception
	 * @return Ambigous <string, unknown>
	 */
	public static function getParam($val,$required=false){
		if($required){
			if(isset($_REQUEST[$val])){
				return isset($_REQUEST[$val])?$_REQUEST[$val]:"";
			}else {
				throw new Exception("miss the nessary parameter", 5);
			}
		}else {
			return isset($_REQUEST[$val])?$_REQUEST[$val]:null;
		}
	}
	
	/**
	 * 判断是否为ajax请求
	 * @return boolean
	 */
	public static function isAjaxRequest(){
		if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){
			return true;
		}else {
			return false;
		}
	}
	/**
	 * 获取请求域名或者ip
	 * @return string
	 */
	public static function getHost(){
		return (isset($_SERVER['HTTPS'])?"https://":"http://").$_SERVER["HTTP_HOST"];
	}
}
?>