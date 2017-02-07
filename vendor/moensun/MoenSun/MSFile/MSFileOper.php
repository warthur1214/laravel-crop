<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年4月6日-上午11:14:12
 */
namespace MoenSun\MSFile;
use MoenSun\MSConfig\MSConfig;
use MoenSun\MSAliOss\MSAliOss;
class MSFileOper{
	public static function deleteFiles(array $files){
		try {
			$result=false;
			if(MSConfig::$useOss){
				if(is_array($files)){
					$res=MSAliOss::delete_objects($files);
					if($res->status==200){
						$result=true;
					}
				}
			}else {
				foreach ($files as $file){
					$result = unlink($file);
				}
			}	
			return $result;
		} catch (Exception $e) {
			throw new \Exception($e);
		}
	}
}