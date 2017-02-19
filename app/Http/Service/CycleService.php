<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/19
 * Time: 下午2:46
 */

namespace App\Http\Service;


use App\Http\Dao\CycleDao;
use App\Http\Model\CycleModel;

class CycleService
{

    public static function getCycleList(CycleModel $model, $where=null)
    {
        try {
            return CycleDao::getCycleList($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function getCycleInfoById(CycleModel $model, $where=null)
    {
        try {
            return CycleDao::getCycleInfoById($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function insertCycleInfo(CycleModel $model, $where=null)
    {
        try {
            return CycleDao::insertCycleInfo($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function updateCycleById(CycleModel $model, $where=null)
    {
        try {
            return CycleDao::updateCycleById($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}