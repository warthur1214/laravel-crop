<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/19
 * Time: 下午3:12
 */

namespace App\Http\common;


use Log;

class ReturnUtil
{

    public static function success()
    {
        return response()->json(['msg' => '修改成功！', 'status' => 1]);
    }

    public static function error($e)
    {
        Log::ERROR($e);
        return response()->json(['msg' => '修改失败！', 'status' => 0]);
    }

    public static function json($info)
    {
        return json_encode($info, JSON_UNESCAPED_UNICODE);
    }
}