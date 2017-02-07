<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/6
 * Time: 下午10:21
 */

namespace App\Http\Controllers;


use Illuminate\Routing\Controller;

class AccountController extends Controller
{

    public function accountList()
    {
        return view("account/accountList");
    }

    public function addAccount()
    {
    	return view("account/addAccount");
    }
}