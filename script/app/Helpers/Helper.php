<?php

namespace App\Helpers;
use Session;
use DB;
use Illuminate\Support\Facades\Http;
use App\Models\Course;
use App\Models\CourseDtl;
class Helper
{

    public static function imageConvert($abb,$path="",$data)
    {
      if ($data!=null) {
        $image = $data;
        $new_file_name = $abb.rand('0000','9999').'_'.time().'.'.$image->getClientOriginalExtension();
        $destinationPath = 'public/images/'.$path;
         if ( !file_exists( $destinationPath ) && !is_dir( $destinationPath ) ) {
            mkdir( $destinationPath );
        }
        $image->move($destinationPath,$new_file_name);
         return $new_file_name;
         }
    }

    public static function course_name($id)
    {
        $data = Course::find($id);
        return (!empty($data->id) ? $data->course_name : "");
    }
    public static function course_duration($id)
    {
        $data = CourseDtl::find($id);
        return (!empty($data->course_id) ? $data->duration : "");
    }

    public static function course_details($id)
    {
        $data = CourseDtl::find($id);
        return (!empty($data->id) ? $data->details : "");
    }
    public static function asso_year()
    {
        $year = date('y');
         $month = date('m');
         if($month>'3'){
           $fyear = $year.'-'.($year+1);
         }else{
          $fyear = ($year-1).'-'.$year;
         }
         return $fyear ;
        }
        public static function now_session_year()
    {
        $year = date('Y');
         $month = date('m');
         if($month>'3'){
           $fyear = $year.'-'.($year+1);
         }else{
          $fyear = ($year-1).'-'.$year;
         }
         return $fyear ;
        }

        public static function generateCode($lcode="",$len="")
        {
            $ccode     = $lcode + 1 ;
           // echo $ccode;
            $ccode_len = strlen($ccode);
           // echo $ccode_len;
           // die;
            $add_zero='';
            for($i=0;$i<($len-$ccode_len);$i++){
              $add_zero .= '0';
            }
            // echo $add_zero.$ccode;
            // die;
           return $final_code = $add_zero.$ccode  ;
          }
           public static function genCodeNo($inv_no='')
           {
                 $year =  self::asso_year();
               if($inv_no>'0'){
               $arrdata=explode('/',$inv_no);
            //    print_r($arrdata);
            //    die;
               $data1=$arrdata[1];
                if($year==$data1){
                $id=$arrdata[2];
                }else{
                    $id='0';
                }
               }else{
                   $id=$inv_no;
               }
            $len=3;
            $id_len=strlen($id);
            //echo $id_len;
            if($id_len>$len)
            {
                $len1=$id_len+1;
            }else{
                $len1=$len;
            }
            return  'KSK/'.$year.'/'.self::generateCode($id,$len1);
           }

}
