<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年6月19日-下午10:13:37
 */
namespace MoenSun\MSUtil\device;
class MSDeviceJudeg{
	public static function isMobile(){
			$regex_match = "/(nokia|iphone|android|motorola|^mot\-|softbank|foma|docomo|kddi|up\.browser|up\.link|";
			$regex_match.= "htc|dopod|blazer|netfront|helio|hosin|huawei|novarra|CoolPad|webos|techfaith|palmsource|";
			$regex_match.="blackberry|alcatel|amoi|ktouch|nexian|samsung|^sam\-|s[cg]h|^lge|ericsson|philips|sagem|wellcom|bunjalloo|maui|";
			$regex_match.="symbian|smartphone|midp|wap|phone|windows ce|iemobile|^spice|^bird|^zte\-|longcos|pantech|gionee|^sie\-|portalmmm|";
			$regex_match.="jig\sbrowser|hiptop|^ucweb|^benq|haier|^lct|opera\s*mobi|opera\*mini|320×320|240×320|176×220";
			$regex_match.=")/i";
		
		
		if(isset ($_SERVER['HTTP_X_WAP_PROFILE'])
				||(strpos((isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:""),"MicroMessenger"))
				|| preg_match($regex_match, strtolower($_SERVER['HTTP_USER_AGENT']))
				||isset ($_SERVER['HTTP_VIA'])){
			return true;
		}else {
			return false;
		}
	}
}