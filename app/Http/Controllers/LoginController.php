<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/12
 * Time: 上午10:47
 */

namespace App\Http\Controllers;


use App\Http\common\ReturnUtil;
use App\Http\Model\AccountModel;
use App\Http\Service\AccountService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Log;
use MoenSun\MSLog\MSLog;
use MoenSun\MSUtil\MSReturn;

class LoginController extends Controller
{

    public function login()
    {
        return view("index/login");
    }

    public function loginAjax(Request $request)
    {
        $model = new AccountModel();
        $model->account_name = $request->input("accountName");
        $model->is_available = 1;


        $userInfo = AccountService::getUserInfo($model, $model);
        $statusInfo = ReturnUtil::error("账号不存在或被冻结，请联系管理员");
        try {
            if ($userInfo['account_id']) {
                $statusInfo = ReturnUtil::error("账号不存在或被冻结，请联系管理员");
                if ($userInfo['password'] = md5($request->input("password"))) {
                    $statusInfo = ReturnUtil::success("登录成功");
                    $request->session()->put("accountId", $userInfo['account_id']);
                    $request->session()->put("displayName", $userInfo['display_name']);

                    $loginInfo = new AccountModel();
                    $loginInfo->login_time = date("Y-m-d H:i:s");
                    AccountService::updateLoginTime($loginInfo, "account_id={$userInfo['account_id']}");
                }
            }
        } catch (\Exception $e) {
            Log::ERROR($e);
            return ReturnUtil::error("账号不存在或被冻结，请联系管理员");
        }

        return $statusInfo;
    }

    public function loginOut(Request $request)
    {
        $request->session()->forget('accountId');
        return redirect("/login");
    }
}