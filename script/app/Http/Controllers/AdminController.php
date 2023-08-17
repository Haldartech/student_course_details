<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Helper;
use DB;
use Session;

class AdminController extends Controller
{
    private $adminPath = 'admin';
    public function adminLogin(Request $request)
    {
        $result=DB::table('admins')->whereRaw("md5(email)='".md5($request->email)."' and password='".md5($request->password)."'")->first();

        // $remember = $request->has('remember') ? true : false;

         if($result==null){
             toast('Enter Wrong User ID Or Password.','error');
            return redirect($this->adminPath);
         }else{
             Session::put('admin_id',$result->id);
             Session::put('admin_name',$result->name);
             Session::put('admin_email',$result->email);
             toast('You have successfully logged in','success');
             return redirect($this->adminPath.'/dashboard');
         }
    }

    public function logout()
    {
        Session::flush();
        toast('You have successfully logged out.','success');
        return redirect('/admin');
    }

    public function change_password()
    {
        return view("admin.pages.change-password");
    }

    public function changepassword(Request $request)
    {
      $table=Admin::find(Session::get('admin_id'));
      $table->email=$request->email;
      if(!empty($request->password)){
      $table->password=md5($request->password);
      }
      Session::put('admin_id',$table->id);
      Session::put('admin_email',$table->email);
      Session::put('admin_password',$table->password);
      toast('You password have successfully updated.','success');
      $table->save();
     return back();
    }
}
