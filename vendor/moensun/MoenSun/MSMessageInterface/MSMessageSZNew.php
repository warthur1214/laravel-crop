<?php
/**
 * Created by PhpStorm.
 * Copyright MoenSun
 * User: Bane.Shi
 * Date: 2015/11/10
 * Time: 23:08
 */

namespace MoenSun\MSMessageInterface;


use MoenSun\MSUtil\http\MSCurl;

class MSMessageSZNew
{
    private $url='http://114.215.206.2/msg/HttpBatchSendSM';
    private $account = 'SDK0542';
    private $password = 'SDK0542';
    private $customerTag='【沉鱼洗护】';

    public function sendMessage($mobiles,$content){
        try{
            $post_data = array();
            $post_data['account'] =$this->account; //账号
            $post_data['pswd'] =$this->password; //密码
            $post_data['mobile'] = $mobiles; //手机号码，使用逗号隔开可以发送多个号码
            //$message = iconv("gb2312", "utf-8//IGNORE", $content.$this->customerTag); //根据具体环境 设置对应字符集  接口响应UTF-8编码
            $post_data['msg'] = rawurlencode($content.$this->customerTag); //短信内容

            $post_data['needstatus'] = 'false'; //是否需要报告回执
            $post_data['product'] = ''; //产品编号  默认为空空
            $post_data['extno'] = ''; //扩展码   可为空

            $o = "";
            foreach ($post_data as $k => $v) {
                if ($k == 'msg'){
                    $o .= "$k=".urlencode($v)."&";
                }else{
                        $o .= "$k=".($v)."&";
                }
            }
            
            $post_data = substr($o, 0, -1);
            return  MSCurl::post($this->url,$post_data);
        }catch (\Exception $e){
            throw $e;
        }
    }
}