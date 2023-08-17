<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use DB;
use Helper;

class FacultyController extends Controller
{
    public function list_faculty(Request $request)
    {
        return view("admin.pages.faculty.index",compact("request"));
    }
    public function add_faculty()
    {
        return view("admin.pages.faculty.create");
    }
    public function addFaculty(Request $request)
    {
        $table = new Faculty;
        $table->faculty_name=$request->faculty_name;
        $table->last_quali=$request->last_quali;
        $table->teaching=$request->teaching;
        $table->status="1";
        $table->save();
        toast("You have successfully submited","success");
        return back();
    }
    public function edit_faculty($id)
    {
        $data = Faculty::find($id);
        return view("admin.pages.faculty.edit",compact("data"));
    }
    public function editFaculty(Request $request,$id)
    {
        $data = Faculty::find($id);
        $data->faculty_name=$request->faculty_name;
        $data->last_quali=$request->last_quali;
        $data->teaching=$request->teaching;
        $data->status="1";
        $data->save();
        toast("You have successfully Updated","success");
        return back();
    }
    public function deleteFaculty($id)
    {
        $data = Faculty::find($id);
        $data->delete($id);
        toast("You have successfully deleted","success");
        return back();
    }
    public function facultystatuschanger(Request $request,$id)
    {
        $data = Faculty::find($request->id);
        $data->status = ($request->status == "0")? "1" : "0";
        $data->save();
        toast("You have successfully Updated","success");
        return back();
    }
    // public function getstate(Request $request)
    // {
    //    $cid = $request->post('cid');
    //    $state = DB::table('states')->where("cid",$cid)->orderBy("state","asc")->get();
    //    $html = "<option value=''>Select State</option>";
    //    foreach($state as $list){
    //     $html.='<option value="'.$list->id.'">'.$list->state.'</option>';
    //    }
    //    echo $html;
    // }
}
