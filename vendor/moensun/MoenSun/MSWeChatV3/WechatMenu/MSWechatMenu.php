<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年5月17日-下午9:00:29
 */
namespace MoenSun\MSWeChatV3\WechatMenu;
use MoenSun\MSWeChatV3\MSWechatBaseInterface;
use MoenSun\MSUtil\http\MSCurl;
class MSWechatMenu{
	public static function wechatMenuLink($buttonsJson){
		try {
			$accesstoken=MSWechatBaseInterface::getAccessToken();
			$url="https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$accesstoken;
			$result= MSCurl::post($url,$buttonsJson);
			$res=json_decode($result,true);
			if($res["errcode"]=="0"){
				return true;
			}else {
				return false;
			}
		} catch (Exception $e) {
		}
	}
	
	public static function createMenuJson($data,$pidVal,$idField,$pidField,$nameField,$typeField,$keyField,$urlField){
		try {
			$buttons=self::createMenu($data, $pidVal, $idField, $pidField, $nameField, $typeField, $keyField, $urlField);
			return json_encode(array("button"=>$buttons));
		} catch (Exception $e) {
			throw new \Exception($e);
		}
	}
	
	public static function createMenu($data,$pidVal,$idField,$pidField,$nameField,$typeField,$keyField,$urlField){
		try {
			$newArray=array();
			if(count($data)>0){
				foreach ($data as $item){
					if($item[$pidField]==$pidVal){
						$button=array();
						$button["name"]=$item[$nameField];
						$childern=self::createMenu($data, $item[$idField],$idField,$pidField,$nameField,$typeField,$keyField,$urlField);
						if(!empty($childern)){
							$button["sub_button"]=$childern;
						}else {
							$button["type"]=$item[$typeField];
							if(isset($item[$keyField]) && $item[$keyField]!=""){
								$button["key"]=$item[$keyField];
							}
							if(isset($item[$urlField]) && $item[$urlField]!=""){
								$button["url"]=$item[$urlField];
							}
						}
						$newArray[]=$button;
					}
				}
			}
			return $newArray;
		} catch (Exception $e) {
			throw new \Exception($e);
		}
	}
}