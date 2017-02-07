<?php
use MoenSun\MoenSunLoadClass;
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年3月12日-下午3:38:51
 */

if(class_exists("MoenSun\MoenSun")){
	return ;
}

require dirname(__FILE__).'/MoenSun/MoenSunLoadClass.php';

MoenSunLoadClass::registerAutoload();