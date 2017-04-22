<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/4/22
 * Time: 上午11:13
 */

namespace App\Http\Model;


use MoenSun\MSORM\MSBaseModel;

class CyclePropertyModel extends MSBaseModel
{
    protected $_tableName = "t_cycle_property";

    public $crop_id;
    public $cycle_id;
    public $cycle_section;
    public $cycle_img;
    public $cycle_describe;

}