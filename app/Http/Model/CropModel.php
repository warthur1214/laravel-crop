<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/26
 * Time: 下午8:19
 */

namespace App\Http\Model;


use MoenSun\MSORM\MSBaseModel;

class CropModel extends MSBaseModel
{
    protected $_tableName = "t_crop";

    public $id;
    public $crop_name;
    public $crop_describe;
    public $crop_weight;
    public $batch_id;
    public $variety_id;
    public $cycle_id;
    public $create_time;
    public $update_time;
    public $crop_img;
    public $crop_bin_code;
    public $crop_number;

}