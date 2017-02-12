<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/12
 * Time: 下午6:18
 */

namespace App\Http\Controllers;


use App\Http\Model\CompanyModel;
use App\Http\Service\CompanyService;
use Illuminate\Routing\Controller;

class CompanyController extends Controller
{

    public function sonParentList()
    {
        $company = new CompanyModel($pid = null);
        $company->parent_organ_id = $pid;
        $parentList = CompanyService::getUserOrganInfo($company);

        return response()->json($parentList);
    }
}