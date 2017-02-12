<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/6
 * Time: 下午10:21
 */

namespace App\Http\Controllers;


use App\Http\Model\AccountModel;
use App\Http\Service\AccountService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use MoenSun\MSLog\MSLog;

class AccountController extends Controller
{

    public function accountList()
    {
        return view("account/accountList");
    }


    public function accountListAjax(Request $request)
    {
        $accountModel = new AccountModel();
        $where['account_name'] = $request->input("account_name");
        $where['display_name'] = $request->input("display_name");
        $data = AccountService::getAccountList($accountModel, $where);
        return response()->json(['data'=>$data]);
    }

    public function addAccount()
    {
    	return view("account/addAccount");
    }

    public function addAccountAjax()
    {
        $account = new AccountModel();
        $account->initByRequest();

        $result = ['msg'=>'修改成功！', 'status'=>1];
        try {
            AccountService::insertAccountInfo($account);
        } catch (\Exception $e) {
            MSLog::log($e);
            $result = ['msg'=>'修改失败！', 'status'=>0];
        }

        return response()->json($result);
    }

    public function deleteAccount($id)
    {
        $account = new AccountModel();
        $account->account_id = $id;
        $result = ['msg' => "删除成功",'status' => 1];
        try {
            AccountService::deleteAccount($account, $account);
        } catch (\Exception $e) {
            MSLog::log($e);
            $result = ['msg' => "删除失败",'status' => 0];
        }

        return response()->json($result);
    }

    public function accountAvailable(Request $request, $id)
    {
        $account = new AccountModel();
        $account->is_available = $request->input("is_available");

        $result = ['msg' => "修改成功",'status' => 1];
        $where['account_id'] = $id;
        try {
            AccountService::accountAvailable($account, $where);
        } catch (\Exception $e) {
            MSLog::log($e);
            $result = ['msg' => "修改失败",'status' => 0];
        }

        return response()->json($result);
    }

    public function editAccount($id)
    {
        return view("account/editAccount", [
            'account_id'=>$id
        ]);
    }

    public function getAccountInfoById($id)
    {
        $account = new AccountModel();

        $accountInfo = AccountService::getAccountInfoById($account, ['account_id'=>$id]);
        return response()->json($accountInfo);
    }

    public function editAccountAjax(Request $request)
    {
        $account = new AccountModel();
        $account->initByRequest();

        $where['account_id'] = $request->input("account_id");
        $result = ['msg'=>'修改成功！', 'status'=>1];
        try {
            AccountService::updateAccountInfo($account, $where);
        } catch (\Exception $e) {
            MSLog::log($e);
            $result = ['msg'=>'修改失败！', 'status'=>0];
        }

        return response()->json($result);
    }
}