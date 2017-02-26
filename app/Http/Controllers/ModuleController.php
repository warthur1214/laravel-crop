<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/12
 * Time: 下午1:04
 */

namespace App\Http\Controllers;


use App\Http\common\ReturnUtil;
use App\Http\Model\ModuleModel;
use App\Http\Service\ModuleService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\URL;
use Log;
use MoenSun\MSLog\MSLog;

class ModuleController extends Controller
{

    public function moduleList()
    {
        return view("module/moduleList");
    }

    public function moduleListAjax(Request $request)
    {
        $model = new ModuleModel();
        $moduleList = ModuleService::getModuleInfo($model);
        $result = array(
            "draw" => $request->input("draw"),
            "recordsTotal" => count($moduleList),
            "recordsFiltered" => count($moduleList),
            "data" => $moduleList
        );
        return response()->json($result);
    }

    public function getSonM($id)
    {
        $module = new ModuleModel();
        $module->module_parent_id = $id;

        $result['data'] = ModuleService::getSonModuleList($module, $module);
        return response()->json($result);
    }

    public function deleteModuleById($id)
    {

        $module = new ModuleModel();
        $module->module_id = $id;
        $result = ReturnUtil::success();
        try {
            ModuleService::deleteModuleById($module, $module);
        } catch (\Exception $e) {
            Log::ERROR($e);
            return ReturnUtil::error('删除失败，该模块存在子模块');
        }
        return $result;
    }

    public function updateModuleById($id)
    {
        $module = new ModuleModel();
        $module->module_id = $id;
        $info = ModuleService::selectModuleById($module, $module);
        $parent = ModuleService::getParentList();
        return view("module/editModule", [
            'info' => $info,
            'parent' => $parent
        ]);
    }

    public function updateModuleAjax(Request $request)
    {
        $moduleModel = new ModuleModel();
        $moduleModel->module_name = $request->input("module_name");
        $moduleModel->module_url = $request->input("module_url");
        $moduleModel->module_matched_key = $request->input("module_matched_key");
        $moduleModel->module_parent_id = $request->input("module_parent_id");

        $where['module_id'] = $request->input("module_id");
        $result = ReturnUtil::success();
        try {
            ModuleService::updateModuleById($moduleModel, $where);
        } catch (\Exception $e) {
            Log::ERROR($e);
            return ReturnUtil::error();
        }

        return $result;
    }

    public function editModuleSort(Request $request)
    {
        $model = new ModuleModel();
        $model->module_sort = $request->input("module_sort");
        $model->module_id = $request->input("module_id");

        $where['module_id'] = $request->input("module_id");
        $result = ReturnUtil::success();
        try {
            ModuleService::updateModuleSort($model, $where);
        } catch (\Exception $e) {
            Log::ERROR($e);
            return ReturnUtil::error();
        }

        return $result;
    }

    public function addModule()
    {
        $parent = ModuleService::getParentList();
        return view("module/addModule", [
            'parent' => $parent
        ]);
    }

    public function addModuleAjax(Request $request)
    {
        $module = new ModuleModel();
        $module->initByRequest();

        $result = ReturnUtil::success();
        try {
            ModuleService::insertModuleInfo($module);
        } catch (\Exception $e) {
            Log::ERROR($e);
            return ReturnUtil::error();
        }

        return $result;
    }
}