<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/2/6
 * Time: 16:27
 */

namespace App\Http\Dao;


use App\Http\Model\ModuleModel;
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
					AND system_id={$model->system_id}
					ORDER BY module_sort DESC, module_id ASC";
			return MSLaravelDB::queryAll($sql);
		} catch (\Exception $e) {
			throw new \Exception($e);
		}
	}
}