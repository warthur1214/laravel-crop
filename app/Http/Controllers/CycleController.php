<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/19
 * Time: 下午2:40
 */

namespace App\Http\Controllers;


use App\Http\common\ReturnUtil;
use App\Http\Model\CycleModel;
use App\Http\Service\CycleService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Log;

class CycleController extends Controller
{

    public function cycleList()
    {
        return view("cycle/cycleList");
    }

    public function getCycleList(Request $request)
    {
        $model = new CycleModel();
        $cycleList = CycleService::getCycleList($model);
        $result = array(
            "draw" => $request->input("draw"),
            "recordsTotal" => count($cycleList),
            "recordsFiltered" => count($cycleList),
            "data" => $cycleList
        );
        return response()->json($result);
    }

    public function addCycle()
    {
        return view("cycle/addCycle");
    }

    public function insertCycle(Request $request)
    {
        $account = new CycleModel();
        $account->initByRequest();

        $result = ReturnUtil::success();
        try {
            CycleService::insertCycleInfo($account);
        } catch (\Exception $e) {
            return ReturnUtil::error($e);
        }

        return $result;
    }

    public function editCycle($cycleId)
    {
        $cycle = new CycleModel();
        $where['id'] = $cycleId;
        $cycleInfo = CycleService::getCycleInfoById($cycle, $where);
        return view("cycle/editCycle", [
            'cycleInfo' => $cycleInfo
        ]);
    }

    public function updateCycleById(Request $request)
    {
        $cycle = new CycleModel();
        $cycle->initByRequest();
        $where['id'] = $request->input("cycle_id");

        $result = ReturnUtil::success();
        try {
            CycleService::updateCycleById($cycle, $where);
        } catch (\Exception $e) {
            return ReturnUtil::error($e);
        }
        return $result;
    }

    public function deleteCycleById($cycleId)
    {
        $cycle = new CycleModel();
        $where['id'] = $cycleId;

        $result = ReturnUtil::success();
        try {
            CycleService::deleteCycleById($cycle, $where);
        } catch (\Exception $e) {
            return ReturnUtil::error($e);
        }
        return $result;
    }
}