<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/26
 * Time: 下午8:23
 */

namespace App\Http\Controllers;


use App\Http\common\ReturnUtil;
use App\Http\Model\BatchModel;
use App\Http\Model\CropModel;
use App\Http\Model\CycleModel;
use App\Http\Model\VarietyModel;
use App\Http\Service\AboutService;
use App\Http\Service\BatchService;
use App\Http\Service\CropService;
use App\Http\Service\CycleService;
use App\Http\Service\VarietyService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Log;
use Mockery\Exception;

class CropController extends Controller
{

    public function cropList()
    {
        return view("crop/cropList");
    }

    public function getCropList(Request $request)
    {
        $model = new CropModel();
        $cropList = CropService::getCropList($model);
        if (!$cropList) {
            $cropList = [];
        }
        $result = array(
            "draw" => $request->input("draw"),
            "recordsTotal" => count($cropList),
            "recordsFiltered" => count($cropList),
            "data" => $cropList
        );
        return response()->json($result);
    }

    public function addCrop()
    {
        $crop = new CropModel();
        $today = date("Y-m-d 00:00:00");
        $where['create_time'] = "c.create_time >'{$today}'";
        $cropInfo = CropService::getCropList($crop, $where);

        $cropNumber = "CPN".date("Ymd")."0001";
        if ($cropInfo && count($cropInfo) > 0) {
            $cropNumber = "CPN".date("Ymd").sprintf("%04s", count($cropInfo)+1);
        }

        $cycleInfo = CycleService::getCycleList(new CycleModel(), "cycle_status=1");
        $batchInfo = BatchService::getBatchList(new BatchModel());
        $varietyInfo = VarietyService::getVarietyList(new VarietyModel(), "variety_status=1");

        return view("crop/addCrop", [
            'cropNumber' => $cropNumber,
            'cycleInfo' => $cycleInfo,
            'batchInfo' => $batchInfo,
            'varietyInfo' => $varietyInfo
        ]);
    }

    public function insertCrop(Request $request)
    {
        $crop = new CropModel();
        $crop->initByRequest();

        $result = ReturnUtil::success();
        try {
            if ($request->hasFile("crop_img")) {
                $cropImg = $request->file("crop_img");
                $ext = ['jpg', 'png'];
                if (in_array($cropImg->getClientOriginalExtension(), $ext)) {
                    $ext = $cropImg->getClientOriginalExtension();
                    $fileName = "crop_".date("YmdH:i:s.").$ext;
                    $cropImg->move("uploads/", $fileName);
                    $crop->crop_img = config('app.url'). "/uploads/" . $fileName;
                }
            }
            $crop->create_time = date("Y-m-d H:i:s");
            $crop->update_time = date("Y-m-d H:i:s");
            CropService::insertCropInfo($crop);
        } catch (\Exception $e) {
            Log::ERROR($e);
            return ReturnUtil::error();
        }

        return $result;
    }

    public function editCrop($cropId)
    {
        $crop = new CropModel();
        $where['id'] = $cropId;
        $cropInfo = CropService::getCropInfo($crop, $where);

        $cycleInfo = CycleService::getCycleList(new CycleModel(), "cycle_status=1");
        $batchInfo = BatchService::getBatchList(new BatchModel());
        $varietyInfo = VarietyService::getVarietyList(new VarietyModel(), "variety_status=1");

        return view("crop/editCrop", [
            'cropInfo' => $cropInfo,
            'cycleInfo' => $cycleInfo,
            'batchInfo' => $batchInfo,
            'varietyInfo' => $varietyInfo
        ]);
    }

    public function updateCropById(Request $request)
    {
        $crop = new CropModel();
        $crop->initByRequest();
        $where['id'] = $request->input("crop_id");

        $result = ReturnUtil::success();
        try {
            if ($where['id']) {
                if ($request->hasFile("crop_img")) {
                    $cropImg = $request->file("crop_img");
                    $ext = ['jpg', 'png'];
                    if (in_array($cropImg->getClientOriginalExtension(), $ext)) {
                        $ext = $cropImg->getClientOriginalExtension();
                        $fileName = "crop_".date("YmdH:i:s.").$ext;
                        $cropImg->move("uploads/", $fileName);
                        $crop->crop_img = config('app.url'). "/uploads/" . $fileName;
                    }
                }

                $crop->update_time = date("Y-m-d H:i:s");
                CropService::updateCropById($crop, $where);
            }
        } catch (\Exception $e) {
            Log::ERROR($e);
            return ReturnUtil::error();
        }
        return $result;
    }

    public function deleteCropById($cropId)
    {
        $crop = new CropModel();
        $where['id'] = $cropId;

        $result = ReturnUtil::success();
        try {
            CropService::deleteCropById($crop, $where);
        } catch (\Exception $e) {
            Log::ERROR($e);
            return ReturnUtil::error();
        }
        return $result;
    }

    public function scanBinCode($cropId)
    {
        $crop = new CropModel();
        $where['id'] = $cropId;
        $cropInfo = CropService::getCropInfoById($crop, $where);
        $aboutInfo = AboutService::getAboutInfo();

        return view("public/wechatWeb", [
            'cropInfo' => $cropInfo,
            'aboutInfo' => $aboutInfo
        ]);
    }

    public function cropCycle($crop_id)
    {
        $where['cycle_status'] = 1;

        if ($crop_id) {
            $where['crop_id'] = $crop_id;
        }

        $cycleInfo = CropService::getCyclePropertyList($crop_id);

        return view("crop.cropCyle", [
           'cycleInfo' => $cycleInfo,
            "crop_id" => $crop_id
        ]);
    }

    public function uploadCycleImg(Request $request)
    {

        try {
            if (!$request->hasFile("cycle_img")) {
                return ReturnUtil::error("空图片");
            }

            $cropImg = $request->file("cycle_img");
            $ext = ['jpg', 'png'];
            if (!in_array($cropImg->getClientOriginalExtension(), $ext)) {
                return ReturnUtil::error("非法图片格式");
            }
            $ext = $cropImg->getClientOriginalExtension();
            $fileName = "cycle_".date("YmdH:i:s.").$ext;
            $cropImg->move("uploads/", $fileName);

            $data = config('app.url'). "/uploads/" . $fileName;
        } catch (\Exception $e) {
            Log::ERROR($e);
            return ReturnUtil::error();
        }
        return ReturnUtil::success("上传成功", $data);
    }

    public function savePropertyInfo(Request $request)
    {
        $data = $request->all();

        try {
            return CropService::insertCycleProperty($data);
        } catch (Exception $e) {
            Log::ERROR($e);
            return ReturnUtil::error();
        }
    }
}