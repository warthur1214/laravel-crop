<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年6月1日-下午9:47:48
 */
namespace MoenSun\MSUtil\file;
class MSFile{
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
	
}