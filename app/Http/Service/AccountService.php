<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/12
 * Time: 上午11:26
 */

namespace App\Http\Service;


use App\Http\Dao\AccountDao;
use App\Http\Model\AccountModel;

class AccountService
{

    public static function getLoginUserInfo(AccountModel $model, $where = null)
    {
        try {
            return AccountDao::getLoginUserInfo($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function updateLoginTime(AccountModel $model, $where=null)
    {
        try {
            return AccountDao::updateLoginTime($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}