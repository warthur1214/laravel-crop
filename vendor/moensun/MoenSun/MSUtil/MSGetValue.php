<?php 
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年1月25日-下午4:15:47
 */
namespace MoenSun\MSUtil;
class MSGetValue{
	/**
	 * 生成长uuid
	 * @return mixed
	 */
	public static function getUUID(){
		return str_replace(".","",uniqid("",true));
	}
	/**
	 * 生成纯数字的uuid
	 * @return string
	 */
	public static function getNumberUUID(){
		return date("YmdHis",time()).mt_rand(1000, 9999);
	}
	
	/**
	 * 生成纯数字ID，一般用于支付
	 */
	public static function getOutTradeID(){
		list($ta,$tb)=explode(" ",microtime());
		return $tb.str_replace(".", "", $ta);
	}
	/**
	 * 获取文件后缀名
	 * @param unknown $val
	 * @return string
	 */
	public static function getExtension($val){
		$returnStr=null;
		if(!ValueCheck::isEmptyOrNull($val)){
			$array=explode(".",$val);
			if(count($array)>0){
				$returnStr=".".$array[count($array)];
			}
		}
		return $returnStr;
	}
	
	public static function getStartRow($page,$pageSize){
		$page=($page<1)?1:$page;
		return ($page-1)*$pageSize;
	}
	
	public static function getPageCount($count,$pageSize){
		return intval($count/$pageSize)+(($count%$pageSize==0)?0:1);
	}
	
}
?>