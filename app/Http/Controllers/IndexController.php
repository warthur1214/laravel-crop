<?php

namespace App\Http\Controllers;

use App\Http\Model\AccountModel;
use App\Http\Model\ModuleModel;
use App\Http\Service\AccountService;
use App\Http\Service\ModuleService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class IndexController extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function test()
    {
        dump(config('app.url'));
    }

	public function top()
	{
		return view("index/top");
	}

	public function index()
	{
        if (session('accountId')) {
            return view("index/index");
        } else {
            return view("index/login");
        }
	}

	public function menu()
	{
		$module = new ModuleModel();
		$module->module_parent_id = 0;
		$module->is_visible = 1;
		$menu = ModuleService::getModuleList($module);
		foreach ($menu as $k=>&$v) {
			$module->module_parent_id = $v['module_id'];
			$module->is_visible = 1;
			$menu[$k]['menu_two'] = ModuleService::getModuleList($module);
		}
		return view("index/menu", [
			'menu' => $menu
		]);
	}

	public function main()
	{
		//获得当前时间
		$week = array("日", "一", "二", "三", "四", "五", "六");
		$date = date('Y年m月d日', time()) . '，星期' . $week[date('w')] . ' 北京时间：' . date('H:i:s', time());
		//获取当前角色

		return view("index/main", [
			'date' => $date,
			'display_name' => session("displayName")
		]);
	}

}
