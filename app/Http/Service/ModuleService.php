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
}