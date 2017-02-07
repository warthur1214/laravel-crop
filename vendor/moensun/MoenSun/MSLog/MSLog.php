<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年1月27日-下午10:21:50
 */
namespace MoenSun\MSLog;
class MSLog{
	public static function log($log){
		$log=serialize($log); 
		$filename=dirname(__FILE__)."/log/".date("Y-m-d")."."."mslog";		
		if(!file_exists($filename)){
			//chmod(dirname(__FILE__)."/log/", 0777);
			$file=fopen($filename,"wa+");
			
		}else {
			$file=fopen($filename,"a+");
		}
		
		$write=date("Y-m-d H:i:s")."    ".$log."\r\n\r\n";
		fwrite($file,$write);
		fclose($file);
		unset($write);
	}
}