<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/1/3
 * Time: 17:58
 */

namespace MoenSun\MSUtil;


class MSNumOper
{
	/**
	 * 精确加法
	 * @param [type] $a [description]
	 * @param [type] $b [description]
	 */
	public static function math_add($a,$b,$scale = '2') {
		return bcadd($a,$b,$scale);
	}
	/**
	 * 精确减法
	 * @param [type] $a [description]
	 * @param [type] $b [description]
	 */
	public static function math_sub($a,$b,$scale = '2') {
		return bcsub($a,$b,$scale);
	}
	/**
	 * 精确乘法
	 * @param [type] $a [description]
	 * @param [type] $b [description]
	 */
	public static function math_mul($a,$b,$scale = '2') {
		return bcmul($a,$b,$scale);
	}
	/**
	 * 精确除法
	 * @param [type] $a [description]
	 * @param [type] $b [description]
	 */
	public static function math_div($a,$b,$scale = '2') {
		return bcdiv($a,$b,$scale);
	}
	/**
	 * 精确求余/取模
	 * @param [type] $a [description]
	 * @param [type] $b [description]
	 */
	public static function math_mod($a,$b) {
		return bcmod($a,$b);
	}
	/**
	 * 比较大小
	 * @param [type] $a [description]
	 * @param [type] $b [description]
	 * 大于 返回 1 等于返回 0 小于返回 -1
	 */
	public static function math_comp($a,$b,$scale = '5') {
		return bccomp($a,$b,$scale); // 比较到小数点位数
	}

}
?>