<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/19
 * Time: 下午10:32
 */

namespace App\Http\Model;


use MoenSun\MSORM\MSBaseModel;

class VarietyModel extends MSBaseModel
{
    protected $_tableName = "t_crop_variety";

    public $id;
    public $variety_name;
    public $variety_describe;
    public $variety_status;
    public $create_time;
    public $update_time;

}