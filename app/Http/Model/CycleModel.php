<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/19
 * Time: 下午2:40
 */

namespace App\Http\Model;


use MoenSun\MSORM\MSBaseModel;

class CycleModel extends MSBaseModel
{
    protected $_tableName = "t_crop_cycle";

    public $id;
    public $cycle_name;
    public $cycle_describe;
    public $cycle_status;
    public $create_time;
    public $update_time;
    public $cycle_img;
    public $cycle_sort;

}