<?php
/**
 * @Copyright MoenSun
 * @Author Bane.Shi 2015年6月17日-下午1:19:32
 */
namespace MoenSun\MSWeChatV3\WechatPayAPI;

use MoenSun\MSWeChatV3\MSWechatConfig;
use MoenSun\MSWeChatV3\MSWechatBaseInterface;
use MoenSun\MSUtil\MSRequest;
use MoenSun\MSLog\MSLog;

require_once dirname(__FILE__) . "/lib/WxPay.Api.php";
require_once dirname(__FILE__) . "/unit/WxPay.JsApiPay.php";

class MSWechatPay
{

    public static function wechatPay(MSWechatPayParam $param)
    {
        date_default_timezone_set('Asia/Shanghai');
        $tools = new \JsApiPay();
        //$openId=MSWechatBaseInterface::getOpenId(MSRequest::getParam("code"));
        $openId = ($param->openId ? $param->openId : $tools->GetOpenid());
        //$openId="o0qFhs1vsXaoEO-IVay598Fu_wCA";
        $input = new \WxPayUnifiedOrder();
        $input->SetBody($param->body);
        $input->SetAttach($param->attach);
        $input->SetOut_trade_no($param->out_trade_no);

        $input->SetTotal_fee($param->total_fee);
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 3000));

        $input->SetGoods_tag($param->goods_tag);
        $input->SetNotify_url(MSWechatConfig::getNotify_url());
        $input->SetTrade_type($param->trade_type ? $param->trade_type : "JSAPI");

        MSLog::log(json_encode($input));

        $input->SetOpenid($openId);
        $order = \WxPayApi::unifiedOrder($input);
        return $tools->GetJsApiParameters($order);

    }

}