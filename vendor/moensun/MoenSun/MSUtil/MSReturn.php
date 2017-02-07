<?php 
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年1月25日-下午4:48:37
 */
namespace MoenSun\MSUtil;

class MSReturn{
	public static  $MS_COUNT="count";
	public static  $MS_LIST="list";
	public static  $MS_RESULT="result";
	public static  $MS_MSG="msg";
	
	public static  $MS_RETURN_STATUS="status";
	public static  $MS_RETURN_SUCCESS="1";
	public static  $MS_RETURN_ERROR="2";
	public static  $MS_RETUEN_FAILURE="3";
	public static  $MS_RETURN_UNLOGIN="4";
	
	
	public static function listAndCount($count,$list){
		return array(self::$MS_COUNT=>$count,self::$MS_LIST=>$list);
	}
	
	public static function unlogin(){
		return json_encode(array(self::$MS_RETURN_STATUS=>self::$MS_RETURN_UNLOGIN));
	}
	
	public static function success($obj=null){
		$array=array();
		$array=array(self::$MS_RETURN_STATUS=>self::$MS_RETURN_SUCCESS,self::$MS_RESULT=>array());
		if($obj){
			$array=array(self::$MS_RETURN_STATUS=>self::$MS_RETURN_SUCCESS,self::$MS_RESULT=>$obj);
		}
		return json_encode($array);
	}

	
	public static function failure($obj=null){
		$array=array();
		$array=array(self::$MS_RETURN_STATUS=>self::$MS_RETUEN_FAILURE);
		if($obj){
			$array=array(self::$MS_RETURN_STATUS=>self::$MS_RETUEN_FAILURE,self::$MS_MSG=>$obj);
		}
		return json_encode($array);		
	}
	
	public static function error($obj=null){
		$array=array();
		$array=array(self::$MS_RETURN_STATUS=>self::$MS_RETURN_ERROR);
		if($obj){
			$array=array(self::$MS_RETURN_STATUS=>self::$MS_RETURN_ERROR,self::$MS_RESULT=>$obj);
		}
		return json_encode($array);	
	}	
	
	public static function submitSuccess($bool,$obj=null){
		$array= array("success"=>$bool,"result"=>$obj);
		return json_encode($array);
	}
	
}
?>