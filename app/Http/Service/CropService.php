<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/26
 * Time: 下午8:22
 */

namespace App\Http\Service;


use App\Http\common\ReturnUtil;
use App\Http\Dao\CropDao;
use App\Http\Dao\CyclePropertyDao;
use App\Http\Model\CropModel;
use App\Http\Model\CyclePropertyModel;
use MoenSun\MSLaravelExtension\MSLaravelDB;

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
            $arr = CropDao::getCropList($model, $where);
            $cropInfo = $arr[0];
            $cropInfo['cycleList'] = CyclePropertyDao::getPropertyListByWechat($cropInfo['id']);
            return $cropInfo;
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

    public static function getCyclePropertyList($crop_id)
    {
        try {
            return CyclePropertyDao::getPropertyListBySql($crop_id);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function insertCycleProperty($reqData) {
        try {
            MSLaravelDB::beginTransaction();

            CyclePropertyDao::deletePropertyInfo(new CyclePropertyModel(), ['crop_id'=>$reqData[0]['crop_id']]);

            foreach ($reqData as $v) {
                if (!$v['crop_id'] || !$v['cycle_id'] || !$v['cycle_section']) {
                    continue;
                }
                $propertyModel = new CyclePropertyModel();
                $where['crop_id'] = $v['crop_id'];

                $propertyModel->crop_id = $v['crop_id'];
                $propertyModel->cycle_describe = $v['cycle_describe'];
                $propertyModel->cycle_id = $v['cycle_id'];
                $propertyModel->cycle_section = $v['cycle_section'];
                $propertyModel->cycle_img = $v['cycle_img'];

                CyclePropertyDao::insertPropertyInfo($propertyModel, $where);
            }
            MSLaravelDB::commit();
        } catch (\Exception $e) {
            MSLaravelDB::rollback();
            throw new \Exception($e);
        }
        return ReturnUtil::success();
    }
}