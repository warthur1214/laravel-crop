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
        $data = AccountService::getAccountList($accountModel);
        return response()->json(['data'=>$data]);
    }

    public function addAccount()
    {
    	return view("account/addAccount");
    }
}