<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/2/12
 * Time: 下午5:58
 */

namespace App\Http\Controllers;


use App\Http\Model\RoleModel;
use App\Http\Service\RoleService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RoleController extends Controller
{

    public function roleList()
    {
        return view("role/roleList");
    }

    public function roleListAjax(Request $request)
    {
        $role = new RoleModel();
        $where['organ_id'] = $request->input("organ_id");
        $data = RoleService::getRoleList($role, $where);

        return response()->json(['data'=>$data]);
    }
}