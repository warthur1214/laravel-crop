<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/12
 * Time: 下午6:08
 */

namespace App\Http\Service;


use App\Http\Dao\RoleDao;
use App\Http\Model\RoleModel;

class RoleService
{

    public static function getRoleList(RoleModel $model, $where=null)
    {
        try {
            return RoleDao::getRoleList($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}