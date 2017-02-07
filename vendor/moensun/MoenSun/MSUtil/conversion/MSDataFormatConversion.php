<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年6月19日-上午11:29:15
 */
namespace MoenSun\MSUtil\conversion;
class MSDataFormatConversion{
	public static function xmlToArray($xml){
		try {
			return json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
		} catch (Exception $e) {
			throw new \Exception($e);
		}
	}
}