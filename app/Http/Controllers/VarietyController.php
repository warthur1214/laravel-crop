<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/19
 * Time: 下午10:32
 */

namespace App\Http\Controllers;


use App\Http\common\ReturnUtil;
use App\Http\Model\VarietyModel;
use App\Http\Service\VarietyService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class VarietyController extends Controller
{
    public function varietyList()
    {
        return view("variety/varietyList");
    }

    public function getVarietyList(Request $request)
    {
        $model = new VarietyModel();
        $varietyList = VarietyService::getVarietyList($model);
        $result = array(
            "draw" => $request->input("draw"),
            "recordsTotal" => count($varietyList),
            "recordsFiltered" => count($varietyList),
            "data" => $varietyList
        );
        return response()->json($result);
    }

    public function addVariety()
    {
        return view("variety/addVariety");
    }

    public function insertVariety(Request $request)
    {
        $account = new VarietyModel();
        $account->initByRequest();

        $result = ReturnUtil::success();
        try {
            VarietyService::insertVarietyInfo($account);
        } catch (\Exception $e) {
            return ReturnUtil::error($e);
        }

        return $result;
    }

    public function editVariety($varietyId)
    {
        $cycle = new VarietyModel();
        $where['id'] = $varietyId;
        $varietyInfo = VarietyService::getVarietyInfoById($cycle, $where);
        return view("variety/editVariety", [
            'varietyInfo' => $varietyInfo
        ]);
    }

    public function updateVarietyById(Request $request)
    {
        $cycle = new VarietyModel();
        $cycle->initByRequest();
        $where['id'] = $request->input("cycle_id");

        $result = ReturnUtil::success();
        try {
            VarietyService::updateVarietyById($cycle, $where);
        } catch (\Exception $e) {
            return ReturnUtil::error($e);
        }
        return $result;
    }

    public function deleteVarietyById($varietyId)
    {
        $cycle = new VarietyModel();
        $where['id'] = $varietyId;

        $result = ReturnUtil::success();
        try {
            VarietyService::deleteVarietyById($cycle, $where);
        } catch (\Exception $e) {
            return ReturnUtil::error($e);
        }
        return $result;
    }
}