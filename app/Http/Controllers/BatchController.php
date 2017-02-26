<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/19
 * Time: 下午2:36
 */

namespace App\Http\Controllers;


use App\Http\common\NumberUtil;
use App\Http\common\ReturnUtil;
use App\Http\Model\BatchModel;
use App\Http\Service\BatchService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Log;

class BatchController extends Controller
{

    public function batchList()
    {
        return view("batch/batchList");
    }

    public function getBatchList(Request $request)
    {
        $model = new BatchModel();
        $batchList = BatchService::getBatchList($model);
        if (!$batchList) {
            $batchList = [];
        }
        $result = array(
            "draw" => $request->input("draw"),
            "recordsTotal" => count($batchList),
            "recordsFiltered" => count($batchList),
            "data" => $batchList
        );
        return response()->json($result);
    }

    public function addBatch()
    {
        return view("batch/addBatch", [
            'batchNumber' => "BNC".date("Ymd").NumberUtil::getNonceStr(6)
        ]);
    }

    public function insertBatch()
    {
        $batch = new BatchModel();
        $batch->initByRequest();

        $result = ReturnUtil::success();
        try {
            BatchService::insertBatchInfo($batch);
        } catch (\Exception $e) {
            Log::ERROR($e);
            return ReturnUtil::error();
        }

        return $result;
    }

    public function editBatch($batchId)
    {
        $batch = new BatchModel();
        $where['id'] = $batchId;
        $batchInfo = BatchService::getBatchInfoById($batch, $where);
        return view("batch/editBatch", [
            'batchInfo' => $batchInfo
        ]);
    }

    public function updateBatchById(Request $request)
    {
        $batch = new BatchModel();
        $batch->initByRequest();
        $where['id'] = $request->input("batch_id");

        $result = ReturnUtil::success();
        try {
            if ($where['id']) {
                BatchService::updateBatchById($batch, $where);
            }
        } catch (\Exception $e) {
            Log::ERROR($e);
            return ReturnUtil::error();
        }
        return $result;
    }

    public function deleteBatchById($batchId)
    {
        $batch = new BatchModel();
        $where['id'] = $batchId;

        $result = ReturnUtil::success();
        try {
            BatchService::deleteBatchById($batch, $where);
        } catch (\Exception $e) {
            Log::ERROR($e);
            return ReturnUtil::error();
        }
        return $result;
    }
}