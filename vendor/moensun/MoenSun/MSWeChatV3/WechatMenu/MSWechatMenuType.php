<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年4月26日-下午6:03:04
 */
namespace MoenSun\MSWeChatV3\WechatMenu;
class MSWechatMenuType{
		
	public static function menuButton($buttons){
		return array("button"=>$buttons);
	}
	
	
	public static function clickButton($name,$key){
		return array("type"=>"click","name"=>$name,"key"=>$key);
	}
	
	public static function viewButton($name,$url){
		return array("type"=>"view","name"=>$name,"url"=>$url);
	}
	/**
	 * 扫码事件
	 * @param unknown $name
	 * @param unknown $key
	 * @return multitype:string unknown
	 */
	public static function scancode_pushButton($name,$key){
		return array("type"=>"scancode_push","name"=>$name,"key"=>$key);
	}
	/**
	 * 扫码推事件且弹出“消息接收中”提示框
	 * @param unknown $name
	 * @param unknown $key
	 * @return multitype:string unknown
	 */
	public static function scancode_waitmsgButton($name,$key){
		return array("type"=>"scancode_waitmsg","name"=>$name,"key"=>$key);
	}
	/**
	 * 弹出系统拍照发图
	 * @param unknown $name
	 * @param unknown $key
	 * @return multitype:string unknown
	 */
	public static function pic_sysphotoButton($name,$key){
		return array("type"=>"pic_sysphoto","name"=>$name,"key"=>$key);
	}	
	/**
	 * 弹出拍照或者相册发图
	 * @param unknown $name
	 * @param unknown $key
	 * @return multitype:string unknown
	 */
	public static function pic_photo_or_albumButton($name,$key){
		return array("type"=>"pic_photo_or_album","name"=>$name,"key"=>$key);
	}	
	
	/**
	 * 弹出微信相册发图器
	 * @param unknown $name
	 * @param unknown $key
	 * @return multitype:string unknown
	 */
	public static function pic_weixinButton($name,$key){
		return array("type"=>"pic_weixin","name"=>$name,"key"=>$key);
	}	
	
	/**
	 * 弹出地理位置选择器
	 * @param unknown $name
	 * @param unknown $key
	 * @return multitype:string unknown
	 */
	public static function location_selectButton($name,$key){
		return array("type"=>"location_select","name"=>$name,"key"=>$key);
	}	

	/**
	 * 下发消息（除文本消息）
	 * @param unknown $name
	 * @param unknown $key
	 * @return multitype:string unknown
	 */
	public static function media_idButton($name,$key){
		return array("type"=>"media_id","name"=>$name,"key"=>$key);
	}	
	
	/**
	 * 跳转图文消息URL
	 * @param unknown $name
	 * @param unknown $key
	 * @return multitype:string unknown
	 */
	public static function view_limitedButton($name,$key){
		return array("type"=>"view_limited","name"=>$name,"key"=>$key);
	}	
	
	public static function groupButton($name,$buttons){
		return array("name"=>$name,"sub_button"=>$buttons);
	}
	
	
	

	
	
}