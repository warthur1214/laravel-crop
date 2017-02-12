<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/12
 * Time: 下午6:08
 */

namespace App\Http\Dao;


use App\Http\Model\RoleModel;
use MoenSun\MSLaravelExtension\MSLaravelDB;

class RoleDao
{

    public static function getRoleList(RoleModel $model, $where = null)
    {
        try {
            $sql = "SELECT 
                        r.role_name, r.role_depict, o.organ_name 
                    FROM tp_role r
                    RIGHT JOIN tp_organ o ON o.organ_id = r.organ_id
                    WHERE 1=1
                    ";
            if ($where['organ_id']) {
                $sql .= " and r.organ_id={$where['organ_id']}";
            }
            return MSLaravelDB::queryAll($sql);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}