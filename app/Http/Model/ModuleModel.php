<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/2/6
 * Time: 16:23
 */

namespace App\Http\Model;


use MoenSun\MSORM\MSBaseModel;

class ModuleModel extends MSBaseModel
{
	protected $_tableName = "tp_module";

	public $module_id;
	public $module_name;
	public $module_url;
	public $module_parent_id;
	public $module_matched_key;
	public $is_visible;
	public $module_sort;
	public $module_level;
	public $system_id;
	public $update_time;
	public $create_time;
}