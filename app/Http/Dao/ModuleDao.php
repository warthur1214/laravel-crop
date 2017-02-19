<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/2/6
 * Time: 16:27
 */

namespace App\Http\Dao;


use App\Http\Model\ModuleModel;
use Illuminate\Database\Eloquent\Model;
use MoenSun\MSLaravelExtension\MSLaravelDB;

class ModuleDao
{
    public static function getModuleList(ModuleModel $model)
    {
        try {
            $sql = "SELECT module_id, module_name, module_url 
					FROM tp_module 
					WHERE module_parent_id={$model->module_parent_id} 
					AND is_visible={$model->is_visible}
					ORDER BY module_sort DESC, module_id ASC";
            return MSLaravelDB::queryAll($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function getModuleInfo(ModuleModel $model, $where = null, $order = null, $find = null)
    {
        try {
            $sql = $model->where($where)->orderby($order)->find($find);
            return MSLaravelDB::queryAll($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function getSonModuleList(ModuleModel $model, $where = null)
    {
        try {
            $sql = $model->where($where)->find();
            return MSLaravelDB::queryAll($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function deleteModuleById(ModuleModel $model, $where = null)
    {
        try {
            $sql = $model->where($where)->delete();
            return MSLaravelDB::delete($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function selectModuleById(ModuleModel $model, $where = null)
    {
        try {
            $sql = $model->where($where)->find();
            return MSLaravelDB::queryRow($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function getParentList()
    {
        try {
            $sql = "SELECT 
                        module_id, module_name 
                    FROM tp_module 
                    WHERE module_level < 2
                    ORDER BY module_sort DESC ,module_id ASC ";
            return MSLaravelDB::queryAll($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function updateModuleById(ModuleModel $model, $where=null)
    {
        try {
            $sql = $model->where($where)->update();
            return MSLaravelDB::update($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function updateModuleSort(ModuleModel $model, $where=null)
    {
        try {
            $sql = $model->where($where)->update();
            return MSLaravelDB::update($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function insertModuleInfo(ModuleModel $model, $where=null)
    {
        try {
            $sql = $model->where($where)->save();
            return MSLaravelDB::insert($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}