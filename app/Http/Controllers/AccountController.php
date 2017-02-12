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
}