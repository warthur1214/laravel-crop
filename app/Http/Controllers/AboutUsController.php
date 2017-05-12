<?php
/**
 * Created by PhpStorm.
 * User: warthur
 * Date: 17/5/11
 * Time: 下午10:40
 */

namespace App\Http\Controllers;


use App\Http\common\ReturnUtil;
use App\Http\Service\AboutService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Mockery\Exception;

class AboutUsController extends Controller
{

    public function aboutInfo()
    {
        $aboutInfo = AboutService::getAboutInfo();
        return view("public.addAbout", [
            'aboutInfo' => $aboutInfo
        ]);
    }

    public function addAboutInfo(Request $request)
    {
        $data['about_describe'] = $request->input("about_describe");

        try {
            if ($request->hasFile("about_img")) {
                $cropImg = $request->file("about_img");
                $ext = ['jpg', 'png'];
                if (in_array($cropImg->getClientOriginalExtension(), $ext)) {
                    $ext = $cropImg->getClientOriginalExtension();
                    $fileName = "about_".time().".".$ext;
                    $cropImg->move("uploads/", $fileName);
                    $data['about_img'] = config('app.url'). "uploads/" . $fileName;
                }
            }

            AboutService::updateAboutInfo($data);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ReturnUtil::error();
        }
        return ReturnUtil::success();
    }
}