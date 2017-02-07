<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年4月26日-下午4:49:04
 */
namespace MoenSun\MSUtil\http;
class MSCurl{
	public static function get($url,$useSsl=false,$second=30){
		try {
			$mscurl= curl_init();
			curl_setopt($mscurl, CURLOPT_TIMEOUT, $second);
			curl_setopt($mscurl, CURLOPT_URL, $url);
			curl_setopt($mscurl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($mscurl, CURLOPT_HEADER, 0);
			curl_setopt($mscurl, CURLOPT_SSL_VERIFYPEER, $useSsl);
			$result=curl_exec($mscurl);
			curl_close($mscurl);
			return $result;
		} catch (Exception $e) {
			throw new \Exception($e);
		}
	}
	
	
	public static function post($url,$data=null,$second=30){
		try {
			$mscurl= curl_init();
			curl_setopt($mscurl, CURLOPT_TIMEOUT, $second);
			curl_setopt($mscurl, CURLOPT_URL, $url);
			curl_setopt($mscurl,CURLOPT_SSL_VERIFYPEER,FALSE);
			curl_setopt($mscurl,CURLOPT_SSL_VERIFYHOST,false);
			//设置header
			curl_setopt($mscurl, CURLOPT_HEADER, FALSE);
			curl_setopt($mscurl, CURLOPT_RETURNTRANSFER,true);
			curl_setopt($mscurl, CURLOPT_POST, true);				
			curl_setopt($mscurl, CURLOPT_POSTFIELDS,$data) ;
			
			$result = curl_exec($mscurl);
			curl_close($mscurl);
			return $result;
		} catch (Exception $e) {
			throw new \Exception($e);
		}
	}
	
}
?>