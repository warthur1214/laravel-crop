<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年6月7日-下午1:22:41
 */
namespace MoenSun\MSMessageInterface;
use MoenSun\MSUtil\http\MSCurl;
class MSMessageSZ {
	private $sdk="http://api.bjszrk.com/sdk";
	
	private $groupid="SDK2732";
	private $pwd="123456";
	public  function sendMessage($mobile,$content,$cell="",$sendTime="",$encode="utf-8"){
		try {
			$url=$this->sdk;
			if("utf-8"==strtolower($encode)){
				$url.="/BatchSend.aspx";
			}else {
				$url.="/BatchSend2.aspx";
			}
			$url.="?CorpID=".$this->groupid."&Pwd=".$this->pwd."&Mobile=".$mobile."&Content=".$content."&Cell=".$cell."&SendTime=".$sendTime."&encode=".$encode;
			return MSCurl::get($url);
		} catch (Exception $e) {
			throw new \Exception($e);
		}
	}
}