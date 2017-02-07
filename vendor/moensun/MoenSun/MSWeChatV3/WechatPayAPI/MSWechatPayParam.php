<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年6月17日-下午1:50:03
 */
namespace MoenSun\MSWeChatV3\WechatPayAPI;
class MSWechatPayParam{
	public $body="";
	public $attach="";
	public $out_trade_no;
	public $total_fee;
	public $time_start;
	public $time_expire;
	public $goods_tag;
	public $notify_url;
	public $trade_type;
	public $openId;
}