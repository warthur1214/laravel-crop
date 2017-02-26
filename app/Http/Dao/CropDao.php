<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/26
 * Time: 下午8:21
 */

namespace App\Http\Dao;


use App\Http\Model\CropModel;
use MoenSun\MSLaravelExtension\MSLaravelDB;

class CropDao
{
    public static function getCropList(CropModel $model, $where = null)
    {
        try {
            $sql = "SELECT 
                        c.id, c.crop_name, c.crop_number, c.crop_weight, c.crop_describe, v.variety_name,
                        cc.cycle_name, b.batch_name, c.create_time, c.update_time
                    FROM t_crop c
                    LEFT JOIN t_crop_cycle cc ON cc.id = c.cycle_id
                    LEFT JOIN t_crop_variety v ON c.variety_id = v.id
                    LEFT JOIN t_crop_batch b ON c.batch_id = b.id
                    ";
            return MSLaravelDB::queryAll($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function getCropInfo(CropModel $model, $where = null)
    {
        try {
            $sql = $model->where($where)->find();
            return MSLaravelDB::queryRow($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function insertCropInfo(CropModel $model, $where = null)
    {
        try {
            $sql = $model->where($where)->save();
            return MSLaravelDB::insert($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function updateCropById(CropModel $model, $where = null)
    {
        try {
            $sql = $model->where($where)->update();
            return MSLaravelDB::update($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function deleteCropById(CropModel $model, $where = null)
    {
        try {
            $sql = $model->where($where)->delete();
            return MSLaravelDB::delete($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}