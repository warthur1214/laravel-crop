<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/5/12
 * Time: 下午10:03
 */

namespace App\Http\Service;


use App\Http\Dao\AboutDao;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class AboutService
{
    public static function getAboutInfo()
    {
        try {
            return AboutDao::getAboutInfo();
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    public static function updateAboutInfo($data)
    {
        DB::beginTransaction();
        try {
            $aboutInfo = AboutDao::getAboutInfo();
            if ($aboutInfo) {
                AboutDao::updateAboutInfo(['about_id'=>$aboutInfo->about_id], $data);
            } else {
                AboutDao::insertAboutInfo($data);
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e);
        }
    }

}