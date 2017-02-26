<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/26
 * Time: 下午8:22
 */

namespace App\Http\Service;


use App\Http\Dao\CropDao;
use App\Http\Model\CropModel;

class CropService
{

    public static function getCropList(CropModel $model, $where = null)
    {
        try {
            return CropDao::getCropList($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function getCropInfoById(CropModel $model, $where=null) {
        try {
            $result = CropDao::getCropList($model, $where);
            return $result[0];
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function getCropInfo(CropModel $model, $where=null)
    {
        try {
            return CropDao::getCropInfo($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function insertCropInfo(CropModel $model, $where=null)
    {
        try {
            return CropDao::insertCropInfo($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function updateCropById(CropModel $model, $where=null)
    {
        try {
            return CropDao::updateCropById($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function deleteCropById(CropModel $model, $where=null)
    {
        try {
            return CropDao::deleteCropById($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}