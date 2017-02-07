<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年3月31日-下午6:05:22
 */
namespace MoenSun\MSAliOss;

require_once dirname(__FILE__)."/sdk.class.php";
class MSAliOss{

	public static  $bucket="sinkfishwash";
	
	public static function upload_by_file($object,$file_path){
		try {
			$oss_sdk_service=new \ALIOSS();
			$oss_sdk_service->set_debug_mode(FALSE);			
			return $oss_sdk_service->upload_file_by_file(self::$bucket,$object,$file_path);
		} catch (Exception $e) {
			
		}

		
	}
	
	public static function upload_by_content(){
		try {
			
		} catch (Exception $e) {
			throw new \Exception($e);
		}
	}
	
	public static function delete_object($object){
		try {
			$oss_sdk_service=new \ALIOSS();
			$oss_sdk_service->set_debug_mode(FALSE);
			return $oss_sdk_service->delete_object(self::$bucket,$object);
		} catch (Exception $e) {
			throw new \Exception($e);
		}
	}
	
	public static function delete_objects($objects){
		try {
			$oss_sdk_service=new \ALIOSS();
			$oss_sdk_service->set_debug_mode(FALSE);
			
			$options = array(
					'quiet' => false,
					//ALIOSS::OSS_CONTENT_TYPE => 'text/xml',
			);
			
			return $oss_sdk_service->delete_objects(self::$bucket,$objects,$options);
		} catch (Exception $e) {
			throw new \Exception($e);
		}
	}
	
	
}