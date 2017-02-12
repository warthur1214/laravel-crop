<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/12
 * Time: 上午11:27
 */

namespace App\Http\Dao;


use App\Http\Model\AccountModel;
use MoenSun\MSLaravelExtension\MSLaravelDB;

class AccountDao
{

    public static function getUserInfo(AccountModel $model, $where = null)
    {
        try {
            $sql = $model->where($where)->find();
            return MSLaravelDB::queryRow($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function updateLoginTime(AccountModel $model, $where = null)
    {
        try {
            $sql = $model->where($where)->update();
            return MSLaravelDB::update($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function getAccountList(AccountModel $model, $where = null)
    {
        try {
            $sql = "SELECT 
                        a.account_id, a.account_name, a.display_name, o.organ_name, r.role_name, a.login_time
                    FROM tp_account a
                    LEFT JOIN tp_organ o ON o.organ_id = a.organ_id
                    LEFT JOIN tp_account_role ar ON ar.account_id = a.account_id
                    LEFT JOIN tp_role r ON ar.role_id = r.role_id
                    ";
            return MSLaravelDB::queryAll($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}