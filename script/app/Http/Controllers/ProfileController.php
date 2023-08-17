<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Helper;

class ProfileController extends Controller
{
    public function profile()
    {
        $datas = Setting::all();
        return view("admin.pages.profile.profile",compact("datas"));
    }
    public function addProfile(Request $request,$id)
    {
        $data = Setting::find($id);
        if ($request->hasFile('logo')) {
            $image_path=('public/images/profile/'.$data->logo);
           if (file_exists($image_path) && !empty($data->logo))
            {
            unlink($image_path);
            }
            $image = $request->file('logo');
            $new_file_name=Helper::imageConvert("pro-",'profile',$image);
            $data->logo=$new_file_name;
            }
        $data->save();
        toast("You have successfully submitted","success");
        return back();
    }
}
