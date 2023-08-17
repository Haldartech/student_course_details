<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseDtl;
use DB;
use Helper;

class CourseController extends Controller
{
    public function list_course(Request $request)
    {
        return view("admin.pages.course.index",compact("request"));
    }
    public function add_course()
    {
        return view("admin.pages.course.create");
    }
    public function addCourse(Request $request)
    {
        $data=DB::table('courses')->orderBy('id','desc')->first();
        if(!empty($data->id) && $data->id>'0'){
            $prv_id=$data->course_code;
        }else{
            $prv_id='0';
        }
        $table = new Course;
        $table->course_code=Helper::genCodeNo($prv_id);
        $table->course_name=$request->course_name;
        $table->no_of_semester=$request->no_of_semester;
        $table->eligibility=$request->eligibility;
        $table->save();

        $table1 = new CourseDtl;
        $table1->course_id=$table->id;
        $table1->duration=$request->duration;
        $table1->details=$request->details;
        $table1->save();

        toast("You have successfully submited","success");
        return back();
    }
    public function edit_course($id)
    {
        // $data = Course::find($id);
        $data = DB::table('courses')
        ->leftJoin('course_dtls', 'course_dtls.course_id', '=', 'courses.id')
        ->where('courses.id', $id)
        ->first();
        return view("admin.pages.course.edit",compact("data"));
    }
    public function editCourse(Request $request,$id)
    {
        $data = Course::find($id);
        $data->course_name=$request->course_name;
        $data->no_of_semester=$request->no_of_semester;
        $data->eligibility=$request->eligibility;
        $data->save();

        $data1 = CourseDtl::find($id);
        $data1->course_id=$id;
        $data1->duration=$request->duration;
        $data1->details=$request->details;
        $data1->save();

        toast("You have successfully updated","success");
        return back();
    }
    public function deleteCourse($id)
    {
        // $data = Course::find($id);
        // $data->delete($id);
        Course::where('id', $id)->delete();
        CourseDtl::where('course_id', $id)->delete();
        toast("You have successfully deleted","success");
        return back();
    }
    public function coursestatuschanger(Request $request, $id)
    {
        $data = Course::find($request->id);
        $data->status=($request->status=="0") ? "1" : "0";
        $data->save();
        toast('You have successfully Updated','success');
        return back();
    }
}
