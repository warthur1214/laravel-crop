<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年5月11日-下午11:09:34
 */
namespace MoenSun\MSConfig;
class MSFolderConfig{
	/**
	 * 获取基本上传文件夹
	 * @param unknown $use
	 * @return string
	 */
	public static function getBaseUploadFloder($use){
		if(MSConfig::$useOss){
			$floder= MSConfig::$objectName."/";
		}else {
			$floder="";
		}
	
		switch ($use){
			case "ProjrctIntroduce":
				$floder.="ProjrctIntroduce/";
				break;
			case "IndexPicture":
				$floder.="IndexPicture/";
				break;
			case "ArticlePicture":
				$floder.="ArticlePicture/";
				break;
			case "Logo":
				$floder.="Logo/";
				break;
			case "AndroidVersion":
				$floder.="AndroidVersion/";
				break;
			case "HeadPic":
				$floder.="HeadPic/";
				break;
			case "GoodsPicture":
				$floder.="GoodsPicture/";
				break;
			case "Advertisement":
				$floder.="Advertisement/";
				break;
			case "DicPicture":
				$floder.="DicPicture/";
				break;
			case "SetMeal":
				$floder.="SetMeal/";
				break;
			case "CollocationPackage":
				$floder.="CollocationPackage/";
				break;
			case "BackgroundPicture":
				$floder.="BackgroundPicture/";
				break;
			case "MemberLevel":
				$floder.="MemberLevel/";
				break;
			case "CardCoupons":
				$floder.="CardCoupons/";
				break;
			default:
				break;
		}
	
		return $floder;
	}
}