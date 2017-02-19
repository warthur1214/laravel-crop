<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/19
 * Time: 下午10:32
 */

namespace App\Http\Dao;


use App\Http\Model\VarietyModel;
use MoenSun\MSLaravelExtension\MSLaravelDB;

class VarietyDao
{

    public static function getVarietyList(VarietyModel $model, $where=null)
    {
        try {
            $sql = $model->where($where)->find();
            return MSLaravelDB::queryAll($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function getVarietyInfoById(VarietyModel $model, $where=null)
    {
        try {
            $sql = $model->where($where)->find();
            return MSLaravelDB::queryRow($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function insertVarietyInfo(VarietyModel $model, $where=null)
    {
        try {
            $sql = $model->where($where)->save();
            return MSLaravelDB::insert($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function updateVarietyById(VarietyModel $model, $where = null)
    {
        try {
            $sql = $model->where($where)->update();
            return MSLaravelDB::update($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function deleteVarietyById(VarietyModel $model, $where=null)
    {
        try {
            $sql = $model->where($where)->delete();
            return MSLaravelDB::delete($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}