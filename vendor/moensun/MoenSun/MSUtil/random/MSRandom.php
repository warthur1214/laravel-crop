<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年5月29日-下午11:20:08
 */
namespace MoenSun\MSUtil\random;
class MSRandom
{
	public static function getNonceStr($length = 32)
	{
		$chars = "abcdefghijklmnopqrstuvwxyz0123456789";
		$str = "";
		for ($i = 0; $i < $length; $i++) {
			$str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
		}
		return $str;
	}

	/**
	 * 生成长uuid
	 * @return mixed
	 */
	public static function getUUID()
	{
		return str_replace(".", "", uniqid("", true));
	}

	/**
	 * 生成纯数字的uuid
	 * @return string
	 */
	public static function getNumberUUID()
	{
		return date("YmdHis", time()) . mt_rand(1000, 9999);
	}

	/**
	 * 生成格式订单号
	 */
	public static function getOrderNumber($num)
	{
		return date("Ymd", time()) . sprintf("%04s", $num);
	}

	/**
	 * 生成纯数字ID，一般用于支付
	 */
	public static function getOutTradeID()
	{
		list($ta, $tb) = explode(" ", microtime());
		return $tb . str_replace(".", "", $ta);
	}
}