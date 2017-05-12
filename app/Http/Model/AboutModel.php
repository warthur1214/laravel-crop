<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/5/12
 * Time: 下午9:58
 */

namespace App\Http\Model;


use Illuminate\Database\Eloquent\Model;

class AboutModel extends Model
{
    public $timestamps = false;
    protected $table = "t_about_us";
    protected $primaryKey = "about_id";
    public $incrementing = true;
    protected $dateFormat = 'Y-m-d H:i:s';

}