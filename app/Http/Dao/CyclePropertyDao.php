<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/4/20
 * Time: 下午9:57
 */

namespace App\Http\Dao;


use App\Http\Model\CyclePropertyModel;
use Exception;
use MoenSun\MSLaravelExtension\MSLaravelDB;

class CyclePropertyDao
{
    public static function getPropertyList(CyclePropertyModel $model, $where = null)
    {
        try {
            $sql = $model->where($where ? $where : $model)->find();
            return MSLaravelDB::queryAll($sql);
        } catch (Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function getPropertyListBySql($crop_id=null)
    {
        try {
            $link = "";
            if (!$crop_id) {
                $link = "AND p.crop_id={$crop_id}";
            }
            $sql = "select 
                        c.cycle_name, p.cycle_describe, p.cycle_img, p.cycle_section, c.id
                    from t_crop_cycle c
                    LEFT JOIN t_cycle_property p ON p.cycle_id = c.id {$link}
                    WHERE c.cycle_status=1
                    ORDER BY c.cycle_sort ASC
                    ";
            return MSLaravelDB::queryAll($sql);
        } catch (Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function getPropertyListByWechat($crop_id)
    {
        try {
            $sql = "select 
                        c.cycle_name, p.cycle_describe, p.cycle_img, p.cycle_section, c.id
                    from t_crop_cycle c
                    LEFT JOIN t_cycle_property p ON p.cycle_id = c.id 
                    WHERE c.cycle_status=1
                        AND p.crop_id={$crop_id}
                    ORDER BY c.cycle_sort ASC
                    ";
            return MSLaravelDB::queryAll($sql);
        } catch (Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function getPropertyInfo(CyclePropertyModel $model, $where = null)
    {
        try {
            $sql = $model->where($where ? $where : $model)->find();
            return MSLaravelDB::queryRow($sql);
        } catch (Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function insertPropertyInfo(CyclePropertyModel $model, $where = null)
    {
        try {
            $sql = $model->where($where ? $where : $model)->save();
            return MSLaravelDB::insert($sql);
        } catch (Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function updatePropertyInfo(CyclePropertyModel $model, $where = null)
    {
        try {
            $sql = $model->where($where ? $where : $model)->update();
            return MSLaravelDB::update($sql);
        } catch (Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function deletePropertyInfo(CyclePropertyModel $model, $where = null)
    {
        try {
            $sql = $model->where($where ? $where : $model)->delete();
            return MSLaravelDB::delete($sql);
        } catch (Exception $e) {
            throw new \Exception($e);
        }
    }
}