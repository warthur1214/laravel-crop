<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年3月13日-下午12:55:14
 */
namespace MoenSun\MSYII2Extension;
class MSYII2Request{
	public static  function getBaseUrl(){
		$hostInfo= \Yii::$app->request->hostInfo;
		$baseUrl=\Yii::$app->request->baseUrl;
		return $hostInfo.$baseUrl;
	}
}