<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/19
 * Time: 下午2:45
 */

namespace App\Http\Dao;


use App\Http\Model\CycleModel;
use MoenSun\MSLaravelExtension\MSLaravelDB;

class CycleDao
{

    public static function getCycleList(CycleModel $model, $where=null, $order=null)
    {
        try {
            $sql = $model->where($where)->orderby($order)->find();
            return MSLaravelDB::queryAll($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function getCycleInfoById(CycleModel $model, $where=null)
    {
        try {
            $sql = $model->where($where)->find();
            return MSLaravelDB::queryRow($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function insertCycleInfo(CycleModel $model, $where=null)
    {
        try {
            $sql = $model->where($where)->save();
            return MSLaravelDB::insert($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function updateCycleById(CycleModel $model, $where = null)
    {
        try {
            $sql = $model->where($where)->update();
            return MSLaravelDB::update($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function deleteCycleById(CycleModel $model, $where=null)
    {
        try {
            $sql = $model->where($where)->delete();
            return MSLaravelDB::delete($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}