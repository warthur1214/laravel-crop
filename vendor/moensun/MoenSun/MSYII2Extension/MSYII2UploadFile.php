<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年3月21日-下午8:40:25
 */
namespace MoenSun\MSYII2Extension;
use yii\web\UploadedFile;
use MoenSun\MSYII2Extension\MSYII2PathConfig;
class MSYII2UploadFile{
	public static function saveAs(UploadedFile $file,$saveFolder,$newFileName,$createFolder){
		if(!is_dir($saveFolder)){
			if($createFolder){
				system("mkdir \"".$saveFolder."\"");
			}
		}
		
		$file->saveAs($saveFolder.$newFileName);
	}
	
	public static function saveAsMSPath(UploadedFile $file,$use,$newFileName,$createFolder){
		if(!is_dir(MSYII2PathConfig::getFloder($use))){
			if($createFolder){
				system("mkdir \"".MSYII2PathConfig::getFloder($use)."\"");
			}
		}
		$file->saveAs(MSYII2PathConfig::getFloder($use).$newFileName);
		return MSYII2PathConfig::getBaseUploadFloder($use);
	}
	
}