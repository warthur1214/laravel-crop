<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/19
 * Time: 下午10:35
 */

namespace App\Http\Service;


use App\Http\Dao\VarietyDao;
use App\Http\Model\VarietyModel;

class VarietyService
{

    public static function getVarietyList(VarietyModel $model, $where=null)
    {
        try {
            return VarietyDao::getVarietyList($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function getVarietyInfoById(VarietyModel $model, $where=null)
    {
        try {
            return VarietyDao::getVarietyInfoById($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function insertVarietyInfo(VarietyModel $model, $where=null)
    {
        try {
            return VarietyDao::insertVarietyInfo($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function updateVarietyById(VarietyModel $model, $where=null)
    {
        try {
            return VarietyDao::updateVarietyById($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function deleteVarietyById(VarietyModel $model, $where=null)
    {
        try {
            return VarietyDao::deleteVarietyById($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}