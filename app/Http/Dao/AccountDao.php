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

    public static function getLoginUserInfo(AccountModel $model, $where=null)
    {
        try {
            $sql = $model->where($where)->find();
            return MSLaravelDB::queryRow($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function updateLoginTime(AccountModel $model, $where=null)
    {
        try {
            $sql = $model->where($where)->update();
            return MSLaravelDB::update($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}