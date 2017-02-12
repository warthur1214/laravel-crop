<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/2/6
 * Time: 16:35
 */

namespace App\Http\Service;


use App\Http\Dao\ModuleDao;
use App\Http\Model\ModuleModel;

class ModuleService
{
	public static function getModuleList(ModuleModel $model)
	{
		try {
			return ModuleDao::getModuleList($model);
		} catch (\Exception $e) {
			throw new \Exception($e);
		}
	}

    public static function getModuleInfo(ModuleModel $model, $where=null, $order=null, $find=null)
    {
        try {
            return ModuleDao::getModuleInfo($model, $where, $order, $find);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function getSonModuleList(ModuleModel $model, $where=null)
    {
        try {
            return ModuleDao::getSonModuleList($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function deleteModuleById(ModuleModel $model, $where=null)
    {
        try {
            return ModuleDao::deleteModuleById($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function selectModuleById(ModuleModel $model, $where=null)
    {
        try {
            return ModuleDao::selectModuleById($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function getParentList()
    {
        try {
            return ModuleDao::getParentList();
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function updateModuleById(ModuleModel $model, $where=null)
    {
        try {
            return ModuleDao::updateModuleById($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function updateModuleSort(ModuleModel $model, $where=null)
    {
        try {
            return ModuleDao::updateModuleSort($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}