<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use DB;
use Helper;

class SettingController extends Controller
{
    public function list_setting()
    {
        $datas  = Setting::all();
        return view("admin.pages.setting.edit",compact("datas"));
    }
    public function editSetting(Request $request,$id)
    {
        $data = Setting::find($id);
        if ($request->hasFile('logo')) {
            $image_path=('public/images/logo/'.$data->logo);
           if (file_exists($image_path) && !empty($data->logo))
            {
            unlink($image_path);
            }
            $image = $request->file('logo');
            $new_file_name=Helper::imageConvert("logo-",'logo',$image);
            $data->logo=$new_file_name;
            }
        $data->save();
        toast("You have successfully Updated","success");
        return back();
    }
}
