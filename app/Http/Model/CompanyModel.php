<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/12
 * Time: 下午6:19
 */

namespace App\Http\Model;


use MoenSun\MSORM\MSBaseModel;

class CompanyModel extends MSBaseModel
{
    protected $_tableName="tp_organ";

    public $organ_id;
    public $organ_name;
    public $abbreviated_name;
    public $organ_type;
    public $organ_level;
    public $organ_bs;
    public $parent_organ_id;
    public $is_available;

}