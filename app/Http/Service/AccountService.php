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

    public static function getUserInfo(AccountModel $model, $where = null)
    {
        try {
            return AccountDao::getUserInfo($model, $where);
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

    public static function getAccountList(AccountModel $model, $where=null)
    {
        try {
            return AccountDao::getAccountList($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function deleteAccount(AccountModel $model, $where=null)
    {
        try {
            return AccountDao::deleteAccount($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function accountAvailable(AccountModel $model, $where=null)
    {
        try {
            return AccountDao::accountAvailable($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}