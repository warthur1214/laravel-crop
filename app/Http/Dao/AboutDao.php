<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/5/12
 * Time: 下午10:00
 */

namespace App\Http\Dao;


use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class AboutDao
{
    public static function getAboutInfo()
    {
        try {
            return DB::table("t_about_us")->orderBy("about_id", "desc")->limit(1)->first();
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    public static function updateAboutInfo($where, $data)
    {
        try {
            return DB::table("t_about_us")->where($where)->update($data);
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    public static function insertAboutInfo($data)
    {
        try {
            return DB::table("t_about_us")->insert($data);
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
}