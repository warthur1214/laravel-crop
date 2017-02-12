<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/12
 * Time: 上午11:23
 */

namespace App\Http\Model;


use MoenSun\MSORM\MSBaseModel;

class AccountModel extends MSBaseModel
{
    protected $_tableName = "tp_account";

    public $account_id;
    public $account_name;
    public $password;
    public $is_available;
    public $login_time;
    public $display_name;
    public $organ_name;
    public $role_name;

}