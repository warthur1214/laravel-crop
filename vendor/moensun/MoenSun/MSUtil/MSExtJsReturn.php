<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年3月18日-下午7:54:39
 */
namespace MoenSun\MSUtil;
class MSExtJsReturn{

	
	public static  $MS_RESULT="result";
	
	
	public static  $MS_SUCCESS_TEXT="success";
	public static  $MS_RETURN_STATUS="status";
	public static  $MS_RETURN_SUCCESS="1";
	public static  $MS_RETURN_ERROR="2";
	public static  $MS_RETUEN_FAILURE="3";
	public static  $MS_RETURN_UNLOGIN="4";
	
	
	
	public static function unlogin(){
		return json_encode(array(self::$MS_SUCCESS_TEXT=>true,self::$MS_RETURN_STATUS=>self::$MS_RETURN_UNLOGIN));
	}
	
	public static function success($obj=null){
		$array=array();
		$array=array(self::$MS_SUCCESS_TEXT=>true,self::$MS_RETURN_STATUS=>self::$MS_RETURN_SUCCESS,self::$MS_RESULT=>array());
		if($obj){
			$array=array(self::$MS_SUCCESS_TEXT=>true,self::$MS_RETURN_STATUS=>self::$MS_RETURN_SUCCESS,self::$MS_RESULT=>$obj);
		}
		return json_encode($array);
	}
	
	
	public static function failure($obj=null){
		$array=array();
		$array=array(self::$MS_SUCCESS_TEXT=>true,self::$MS_RETURN_STATUS=>self::$MS_RETUEN_FAILURE);
		if($obj){
			$array=array(self::$MS_SUCCESS_TEXT=>true,self::$MS_RETURN_STATUS=>self::$MS_RETUEN_FAILURE,self::$MS_RESULT=>$obj);
		}
		return json_encode($array);
	}
	
	public static function error($obj=null){
		$array=array();
		$array=array(self::$MS_SUCCESS_TEXT=>false,self::$MS_RETURN_STATUS=>self::$MS_RETURN_ERROR);
		if($obj){
			$array=array(self::$MS_SUCCESS_TEXT=>false,self::$MS_RETURN_STATUS=>self::$MS_RETURN_ERROR,self::$MS_RESULT=>$obj);
		}
		return json_encode($array);
	}
}