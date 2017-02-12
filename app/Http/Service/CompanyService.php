<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/12
 * Time: 下午6:19
 */

namespace App\Http\Service;


use App\Http\Dao\AccountDao;
use App\Http\Dao\CompanyDao;
use App\Http\Model\AccountModel;
use App\Http\Model\CompanyModel;
use Illuminate\Database\Eloquent\Model;

class CompanyService
{
    public static function sonParentList(CompanyModel $model, $where = null)
    {
        try {
            return CompanyDao::sonParentList($model, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function getUserOrganInfo(CompanyModel $model, $where=null)
    {
        try {
            $userInfo = AccountDao::getUserInfo(new AccountModel(), ['account_id'=>session('accountId')]);
            $where['organ_id'] = $userInfo['organ_id'];
            $organInfo = CompanyDao::getUserOrganInfo($model, $where);
            if ($organInfo['organ_bs']) {
                $where['organ_id'] = $userInfo['organ_id'];
            }
            return self::getSonList($model, $model->parent_organ_id, $where);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public static function getSonList(CompanyModel $model, $pid='0', $where=null)
    {
        $where['parent_organ_id'] = $pid;
        $where['is_available'] = 1;

        $list = CompanyDao::sonParentList($model, $where);
        $result = [];
        if ($list) {
            array_walk($list, function (&$v) use ($model, $pid, $where) {
               if ($v['organ_id']) {
                   $val['son'] = self::getSonList($model, $v['organ_id'], $where);
               }
               $result[] = $v;
            });
        }

        return $result;
    }
}