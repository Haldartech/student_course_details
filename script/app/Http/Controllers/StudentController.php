<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use DB;
use Helper;

class StudentController extends Controller
{
    public function list_student(Request $request)
    {
        return view("admin.pages.students.index",compact("request"));
    }
    public function add_student(Request $request)
    {
        return view("admin.pages.students.create",compact("request"));
    }
    public function addStudent(Request $request)
    {
        $data=DB::table('students')->orderBy('id','desc')->first();
        if(!empty($data->id) && $data->id>'0'){
            $prv_id=$data->stu_code;
        }else{
            $prv_id='0';
        }
        $table = new Student;
        $table->stu_code=Helper::genCodeNo($prv_id);
        $table->f_name=$request->f_name;
        $table->m_name=$request->m_name;
        $table->l_name=$request->l_name;
        $table->dob=$request->dob;
        $table->gender=$request->gender;
        $table->age=$request->age;
        $table->religion=$request->religion;
        $table->cast=$request->cast;
        $table->bpl=$request->bpl;
        $table->aadhar=$request->aadhar;
        $table->class=$request->class;
        $table->pre_road=$request->pre_road;
        $table->pre_landmark=$request->pre_landmark;
        $table->pre_pin=$request->pre_pin;
        $table->pre_state=$request->pre_state;
        $table->pre_district=$request->pre_district;
        $table->pre_building=$request->pre_building;
        $table->pre_country=$request->pre_country;
        $table->pre_co=$request->pre_co;
        $table->per_road=$request->per_road;
        $table->per_pin=$request->per_pin;
        $table->per_state=$request->per_state;
        $table->per_district=$request->per_district;
        $table->per_building=$request->per_building;
        $table->per_country=$request->per_country;
        $table->per_co=$request->per_co;
        $table->email=$request->email;
        $table->phone=$request->phone;
        $table->course=$request->course;
        $table->duration=$request->duration;
        $table->details=$request->details;
        $table->session_year=$request->session_year;
        $table->admission_date=$request->admission_date;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $new_file_name=Helper::imageConvert("Stu-",'student',$image);
            $table->image=$new_file_name;
            }
        $table->status="1";
        $table->save();
        toast("You Have Successfully Submitted","success");
        return back();
    }
    public function edit_student(Request $request,$id)
    {
        $data = Student::find($id);
        return view("admin.pages.students.edit",compact("data"));
    }
    public function editStudent(Request $request,$id)
    {
        $data = Student::find($id);
        $data->f_name=$request->f_name;
        $data->m_name=$request->m_name;
        $data->l_name=$request->l_name;
        $data->dob=$request->dob;
        $data->gender=$request->gender;
        $data->age=$request->age;
        $data->religion=$request->religion;
        $data->cast=$request->cast;
        $data->bpl=$request->bpl;
        $data->aadhar=$request->aadhar;
        $data->class=$request->class;
        $data->pre_road=$request->pre_road;
        $data->pre_landmark=$request->pre_landmark;
        $data->pre_pin=$request->pre_pin;
        $data->pre_state=$request->pre_state;
        $data->pre_district=$request->pre_district;
        $data->pre_building=$request->pre_building;
        $data->pre_country=$request->pre_country;
        $data->pre_co=$request->pre_co;
        $data->per_road=$request->per_road;
        $data->per_pin=$request->per_pin;
        $data->per_state=$request->per_state;
        $data->per_district=$request->per_district;
        $data->per_building=$request->per_building;
        $data->per_country=$request->per_country;
        $data->per_co=$request->per_co;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->course=$request->course;
        $data->duration=$request->duration;
        $data->details=$request->details;
        $data->session_year=$request->session_year;
        if ($request->hasFile('image')) {
            $image_path=('public/images/student/'.$data->image);
           if (file_exists($image_path) && !empty($data->image))
            {
            unlink($image_path);
            }
            $image = $request->file('image');
            $new_file_name=Helper::imageConvert("Stu-",'student',$image);
            $data->image=$new_file_name;
            }
        $data->save();
        toast("You Have Successfully Updated","success");
        return back();
    }
    public function deleteStudent($id)
    {
        $data = Student::find($id);
        $data->delete($id);
        toast("You have successfullu delted","success");
        return back();
    }
    public function studentstatuschanger(Request $request,$id)
    {
        $data = Student::find($request->id);
        $data->status=($request->status=="0") ? "1" : "0";
        $data->save();
        toast('You have successfully Updated','success');
        return back();
    }
    public function getduration(Request $request)
    {
       $course_id = $request->post('course_id');
       $duration = DB::table('course_dtls')->where("course_id",$course_id)->get();
       $html = "<option value='' hidden>Select duration</option>";
       foreach($duration as $list){
        $html.='<option value="'.$list->id.'" selected>'.$list->duration.'</option>';
       }
       echo $html;
    }

    public function getdetails(Request $request)
    {
       $course_id = $request->post('course_id');
       $duration = DB::table('course_dtls')->where("course_id",$course_id)->get();
       $html = "<option value='' hidden>Select Details</option>";
       foreach($duration as $list){
        $html.='<option value="'.$list->id.'" selected>'.$list->details.'</option>';
       }
       echo $html;
    }

}
