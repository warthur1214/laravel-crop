<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/26
 * Time: 下午1:58
 */

namespace App\Http\Model;


use MoenSun\MSORM\MSBaseModel;

class BatchModel extends MSBaseModel
{

    protected $_tableName = "t_crop_batch";

    public $id;
    public $batch_number;
    public $batch_name;
    public $batch_describe;
    public $create_time;
    public $update_time;

}