<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/12
 * Time: 下午6:19
 */

namespace App\Http\Dao;


use App\Http\Model\CompanyModel;
use MoenSun\MSLaravelExtension\MSLaravelDB;

class CompanyDao
{
    public static function sonParentList(CompanyModel $model, $where=null)
    {
        try {
            $sql = $model->where($where)->find();
            return MSLaravelDB::queryAll($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function getUserOrganInfo(CompanyModel $model, $where = null)
    {
        try {
            $sql = $model->where($where)->find();
            return MSLaravelDB::queryAll($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}