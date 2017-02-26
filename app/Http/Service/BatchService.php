<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/26
 * Time: 下午2:04
 */

namespace App\Http\Service;


use App\Http\Dao\BatchDao;
use App\Http\Model\BatchModel;

class BatchService
{

    public static function getBatchList(BatchModel $model, $where = null)
    {
        try {
            return BatchDao::getBatchList($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function getBatchInfoById(BatchModel $model, $where=null)
    {
        try {
            return BatchDao::getBatchInfoById($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function insertBatchInfo(BatchModel $model, $where=null)
    {
        try {
            return BatchDao::insertBatchInfo($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function updateBatchById(BatchModel $model, $where=null)
    {
        try {
            return BatchDao::updateBatchById($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function deleteBatchById(BatchModel $model, $where=null)
    {
        try {
            return BatchDao::deleteBatchById($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}