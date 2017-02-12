<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/12
 * Time: 下午6:06
 */

namespace App\Http\Model;


use MoenSun\MSORM\MSBaseModel;

class RoleModel extends MSBaseModel
{
    protected $_tableName="tp_role";

    public $role_id;
    public $role_name;
    public $role_depict;
    public $organ_id;

}