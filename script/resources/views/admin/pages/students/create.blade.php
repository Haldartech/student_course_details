@extends('admin.resource.main')
@section('title', 'Add Student')
@section('content')
<style>
    .file {
    visibility: hidden;
        position: absolute;
    }
    .form{
        width: 200px !important;
    }
    .present{
    margin-top: 60px;
    background: green;
    color: #ffff;
    padding: 10px;
    width: 300px;
    border-radius: 3px;
    }
    .permanent{
    background: green;
    color: #ffff;
    padding: 10px;
    width: 300px;
    border-radius: 3px;
    }
</style>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    CKEDITOR.replace('summary-ckeditor' );
</script>
<section class="content-header">
    <h1>
        @yield('title')
      <small><a href="{{url('/admin/list-student')}}" class="btn btn-warning btn-flat btn-sm" title="Back"><i class="fa fa-plus"></i>BACK</a></small>
    </h1>
  </section>
  <section class="content">
    <form action="{{url('/admin/addStudent')}}" onsubmit="btnDisable()" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
  <!--begin::Row-->
  <div class="row gy-5 g-xl-8">
    <div class="col-xl-12">
      <!-- general form elements -->
      <div class="card">
        <!--begin::Header-->
        <div class="card-header border-0 bg-danger mb-5" style="min-height: 40px;">
            <h3 class="card-title fw-bolder text-white">@yield('title') </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body p-0">
              <!--begin::Input group-->

              {{-- container start --}}
            <div class="container">
                {{-- row start --}}
                <div class="row">
                    {{-- col-md-8 start --}}
                    <div class="col-md-8">

                        {{-- Fisrt Name --}}
                        <label class="required fw-bold fs-6 mb-2">Fisrt Name</label>
                        <div class="input-group mb-5">
                        <input type="text" class="form-control" name="f_name" value="{{old('f_name')}}" placeholder="Fisrt Name" required style="border-radius: 20px; border-color:rgb(177, 174, 174)">
                        </div>

                        {{-- Middle Name --}}
                        <label class="fw-bold fs-6 mb-2">Middle Name</label>
                        <div class="input-group mb-5">
                        <input type="text" class="form-control" name="m_name" value="{{old('m_name')}}" placeholder="Middle Name" style="border-radius: 20px; border-color:rgb(177, 174, 174)">
                        </div>

                        {{-- Last Name --}}
                        <label class="required fw-bold fs-6 mb-2">Last Name</label>
                        <div class="input-group mb-5">
                        <input type="text" class="form-control" name="l_name" value="{{old('l_name')}}" placeholder="Last Name" required style="border-radius: 20px; border-color:rgb(177, 174, 174)">
                        </div>
                    </div>
                    {{-- col-md-8 end --}}

                    {{-- col-md-4 start --}}
                    <div class="col-md-4">
                        {{-- Image --}}
                        <label class="required fw-bold fs-6 mb-2">Image</label>
                        <div class="input-group mb-5">
                        <img src="{{url("public/images/noimage.png")}}" class="browse text-center" id="preview" id="file" style="cursor:pointer; width:280px; height:230px; border: 1px solid #000;" title="Click Here To Choose You Picture">
                        <input type="file" name="image" class="form-control file" accept="image/x-png, image/jpeg" value="{{old('image')}}" required >
                        </div>
                    </div>
                    {{-- col-md-4 end --}}
                  </div>
                {{-- row end --}}


                {{-- row start --}}
                    <div class="row">

                      <div class="col-md-3">
                        <div class="form-group row">
                          <label class="col-md-7 required" style="font-weight: normal; font-size:16px">Date of Birth</label>
                          <input type="date" class="form-control col-md-6" name="dob" value="{{old("dob")}}" style="width:200px;" required>
                        </div>
                      </div>

                    <div class="col-md-3">
                      <div class="form-group row">
                          <label class="col-md-5 required" style="font-weight: normal; font-size:16px">Religion</label>
                          <select name="religion" class="form-select form" data-control="select2" required>
                            <option value="Hinduism">Hinduism</option>
                            <option value="Muslim">Muslim</option>
                          </select>
                      </div>
                    </div>

                  <div class="col-md-3">
                    <div class="form-group row">
                        <label class="col-md-5 required" style="font-weight: normal; font-size:16px">Caste</label>
                        <select name="cast" class="form-select form" data-control="select2" required>
                          <option value="General">General</option>
                          <option value="SC">SC</option>
                          <option value="ST">ST</option>
                          <option value="OBC-A">OBC-A</option>
                          <option value="OBC-B">OBC-B</option>
                        </select>
                    </div>
                   </div>

                   <div class="col-md-3">
                    <div class="form-group row">
                        <label class="col-md-5 required" style="font-weight: normal; font-size:16px">Gender</label>
                        <select name="gender" class="form-select form" data-control="select2" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                   </div>

                   <div class="col-md-3 mt-5" >
                    <div class="form-group row">
                        <label class="col-md-5 required" style="font-weight: normal; font-size:16px">Age</label>
                        <input type="text" class="form-control col-md-6" name="age" value="{{old("age")}}" style="width:200px;" placeholder="Enter Your Age" required>
                    </div>
                   </div>

                   <div class="col-md-3 mt-5">
                    <div class="form-group row">
                        <label class="col-md-5 required" style="font-weight: normal; font-size:16px">Class</label>
                        <input type="text" class="form-control col-md-6" name="class" value="{{old("class")}}" style="width:200px;" placeholder="Enter Your Class" required>
                    </div>
                   </div>

                   <div class="col-md-3 mt-5" >
                    <div class="form-group row">
                        <label class="col-md-7 required" style="font-weight: normal; font-size:16px">Aadhar No</label>
                        <input type="text" class="form-control col-md-6" name="aadhar" value="{{old("aadhar")}}" style="width:200px;" placeholder="Enter Aadhar No" maxLength="14" required data-type="adhaar-number">
                    </div>
                   </div>

                   <div class="col-md-3 mt-5">
                    <div class="form-group row">
                        <label class="col-md-5 required" style="font-weight: normal; font-size:16px">BPL</label>
                        <select name="bpl" class="form-select form" data-control="select2" required>
                            <option value="Yes">Yes</option>
                            <option value="No" selected>No</option>
                        </select>
                    </div>
                   </div>

                  </div>
                {{-- row end --}}

            </div>
            {{-- container end --}}


                <label class="present mb-3" style="font-weight: normal; font-size:16px;">Present Residential Address</label>

                {{-- container start --}}
                <div class="container">

                    {{-- row start --}}
                    <div class="row" style="margin-bottom: 15px;">

                        <div class="col-md-3">
                            <div class="form-group" style="margin-bottom: 10px">
                                <label style="font-weight: normal; font-size:16px"> Flat & Floor/Building No </label>
                                <input type="text" class="form-control" id="pre_building" name="pre_building" placeholder="FLAT & FLOOR/BUILDING NO">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group" style="margin-bottom: 10px">
                                <label style="font-weight: normal; font-size:16px"> Road / Lane Name & No </label>
                                <input type="text" class="form-control" id="pre_road" name="pre_road" placeholder="ROAD / LANE NAME & NO">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group" style="margin-bottom: 10px">
                                <label style="font-weight: normal; font-size:16px">Nearest Landmark</label>
                                <input type="text" class="form-control" id="pre_landmark" name="pre_landmark" placeholder="NEAREST LANDMARK">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group" style="margin-bottom: 10px">
                                <label style="font-weight: normal; font-size:16px">C/O. if Any</label>
                                <input type="text" class="form-control" id="pre_co" name="pre_co" placeholder="C/O. IF ANY">
                            </div>
                        </div>

                    </div>
                    {{-- row end --}}

                    {{-- row start --}}
                    <div class="row" style="margin-bottom: 25px;">

                        <div class="col-md-3">
                            <div class="form-group" style="margin-bottom: 10px">
                                <label style="font-weight: normal; font-size:16px"> Distric </label>
                                <input type="text" class="form-control" id="pre_district" name="pre_district" placeholder="DISTRIC">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group" style="margin-bottom: 10px">
                                <label style="font-weight: normal; font-size:16px"> State </label>
                                <input type="text" class="form-control" id="pre_state" name="pre_state" placeholder="STATE">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group" style="margin-bottom: 10px">
                                <label style="font-weight: normal; font-size:16px">Pin</label>
                                <input type="text" class="form-control" id="pre_pin" name="pre_pin" placeholder="PIN">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group" style="margin-bottom: 10px">
                                <label style="font-weight: normal; font-size:16px">Country</label>
                                <input type="text" class="form-control" id="pre_country" name="pre_country" placeholder="COUNTRY">
                            </div>
                        </div>

                    </div>
                    {{-- row end --}}
                </div>
                {{-- container end --}}


            {{-- permanent address same as current address start--}}
                <div class="row">
                    <div class="col-md-6" style="background-color:green; color: white; padding: 10px; border-radius: 3px; margin-left: 8px;">
                        <label style="font-weight: normal; font-size:16px;">Permanent Address Same as Current Address</label>
                    </div>

                    <div class="col-md-5" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <input type="checkbox" id="filltoo" style="padding: 5px 10px; width:15px; height:15px" onclick="filladd()" >
                            <label class="clickhere" for="same_address" style="font-weight: normal; font-size:16px;" title="If your present or permanent address are same then click this check box">Click Here</label>
                        </div>
                    </div>

                </div>
            {{-- permanent address same as current address end--}}


                <label class="permanent mb-3 mt-5" style="font-weight: normal; font-size:16px;">Permanent Residential Address</label>
                {{-- container start --}}
                <div class="container">
                    {{-- row start --}}
                    <div class="row" style="margin-bottom: 15px;">
                        <div class="col-md-3">
                            <label style="font-weight: normal; font-size:16px"> Flat & Floor/Building No </label>
                        <div class="form-group" style="margin-bottom: 10px">
                            <input type="text" class="form-control" id="per_building" name="per_building" placeholder="FLAT & FLOOR/BUILDING NO">
                        </div>
                        </div>

                        <div class="col-md-3">
                        <div class="form-group" style="margin-bottom: 10px">
                            <label style="font-weight: normal; font-size:16px"> Road / Lane Name & No </label>
                            <input type="text" class="form-control" id="per_road" name="per_road" placeholder="ROAD / LANE NAME & NO" >
                        </div>
                        </div>

                        <div class="col-md-3">
                        <div class="form-group" style="margin-bottom: 10px">
                            <label style="font-weight: normal; font-size:16px">Nearest Landmark</label>
                            <input type="text" class="form-control" id="per_landmark" name="per_landmark" placeholder="LOCALITY / NEAREST LANDMARK" >
                        </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group" style="margin-bottom: 10px">
                                <label style="font-weight: normal; font-size:16px">C/O. if Any</label>
                                <input type="text" class="form-control" id="per_co" name="per_co" placeholder="C/O. IF ANY" >
                        </div>
                        </div>
                    </div>

                    <div class="row" style="margin-bottom: 25px;">

                        <div class="col-md-3">
                        <div class="form-group" style="margin-bottom: 10px">
                            <label style="font-weight: normal; font-size:16px"> Distric </label>
                            <input type="text" class="form-control" id="per_district" name="per_district" placeholder="DISTRIC" >
                        </div>
                        </div>

                        <div class="col-md-3">
                        <div class="form-group" style="margin-bottom: 10px">
                            <label style="font-weight: normal; font-size:16px"> State </label>
                            <input type="text" class="form-control" id="per_state" name="per_state" placeholder="STATE" >
                        </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group" style="margin-bottom: 10px">
                                <label style="font-weight: normal; font-size:16px">Pin</label>
                                <input type="text" class="form-control" id="per_pin" name="per_pin" placeholder="PIN" maxlength="6">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group" style="margin-bottom: 10px">
                                <label style="font-weight: normal; font-size:16px">Country</label>
                                <input type="text" class="form-control" id="per_country" name="per_country" placeholder="COUNTRY" >
                            </div>
                        </div>

                    </div>
                    {{-- row end --}}
                </div>
                {{-- container end --}}


                <label class="permanent mb-3 mt-5" style="font-weight: normal; font-size:16px;">Personal Details</label>
                {{-- container start --}}
                <div class="container">
                <div class="row" style="margin-bottom: 15px;">

                    <div class="col-md-6">
                        <div class="form-group" style="margin-bottom: 10px">
                            <label class="required" style="font-weight: normal; font-size:16px"> Phone No </label>
                            <input type="text" class="form-control" name="phone" placeholder="Phone No">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group" style="margin-bottom: 10px">
                            <label style="font-weight: normal; font-size:16px"> Email ID </label>
                            <input type="email" class="form-control" name="email" placeholder="Enter Your Email Id">
                        </div>
                    </div>

                </div>
            </div>
                {{-- container end --}}


            <label class="permanent mb-3 mt-5" style="font-weight: normal; font-size:16px;">Course Details</label>
                {{-- container start --}}
                <div class="container">
                    {{-- row start --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-5 required" style="font-weight: normal; font-size:16px">Course</label>
                            <select name="course" id="course" class="form-select" data-control="select2" required>
                                <option value="General">Select Course</option>
                                <?php $courses = DB::table('courses')->orderBy("id","desc")->get(); ?>
                                @foreach ($courses as $course)
                                <option value="{{$course->id}}">{{$course->course_name}}</option>
                                @endforeach
                            </select>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group row">
                            <label class="col-md-6 required" style="font-weight: normal; font-size:16px">Duration</label>
                            <select name="duration" id="duration" class="form-select" style="background: #eff2f5">
                            <option value="" selected hidden></option>
                        </select>
                        </div>
                      </div>

                    <script>
                        $(document).ready(function(){
                            $("#course").change(function(){
                                let course_id = $(this).val();
                                $.ajax({
                                    url:"{{url('/getDuration')}}",
                                    type:'post',
                                    data:'course_id='+course_id+'&_token={{csrf_token()}}',
                                    success:function(result){
                                        $('#duration').html(result)
                                    }
                                });
                            });
                        });
                    </script>

                      <div class="col-md-3">
                        <div class="form-group row">
                            <label class="col-md-7 required" style="font-weight: normal; font-size:16px">Session Year</label>
                            <select name="session_year" class="form-select" data-control="select2" required>
                                <option value=""> Session Year </option>

                                   <?php $cur_year = date('Y') ;

                                   for($i=1;$i<=5;$i++){ ?>

                                   <option value="<?php echo(($cur_year+1).'-'.($cur_year+2)) ;?>"

                                    <?php if((($cur_year+1).'-'.($cur_year+2))== $request->session_year) echo 'selected' ?>>

                                    <?php echo(($cur_year+1).'-'.($cur_year+2)) ;?></option>

                                   <?php $cur_year -- ;  } ?>
                            </select>
                        </div>
                      </div>

                      <div class="col-md-12 mt-5" style="display: none">
                        <div class="form-group row">
                            <label class="col-md-12 required" style="font-weight: normal; font-size:16px">Course Details</label>
                            <textarea class="form-control" rows="10" name="details" placeholder="Course Details"  style="background: #eff2f5"></textarea>
                            <select name="details" id="details" class="form-select" style="background: #eff2f5">
                                <option value="" selected hidden></option>
                            </select>
                        </div>
                      </div>

                      <script>
                        $(document).ready(function(){
                            $("#course").change(function(){
                                let course_id = $(this).val();
                                $.ajax({
                                    url:"{{url('/getDetails')}}",
                                    type:'post',
                                    data:'course_id='+course_id+'&_token={{csrf_token()}}',
                                    success:function(result){
                                        $('#details').html(result)
                                    }
                                });
                            });
                        });
                    </script>

                    </div>
                    {{-- row end --}}
                </div>
                {{-- container end --}}


        <!--end::Input group-->
    </div>
    <!--end::Body-->
</div>
</div>
<div class="col-xl-12 text-right">
  <!-- general form elements -->
  <div class="card">
    <!--begin::Body-->
    <div class="card-body p-0 float-right">
          <!--begin::Input group-->

          <div style="text-align: right; margin-right: 20px">
            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
          </div>
          <!--end::Input group-->
    </div>
    <!--end::Body-->
</div>
</div>
</div>
<!--end::Row-->

</form>
<script>
 //image preview
 $(document).on("click", ".browse", function() {
  var file = $(this).parents().find(".file");
  file.trigger("click");
});
$('input[type="file"]').change(function(e) {
  var fileName = e.target.files[0].name;
  $("#file").val(fileName);

  var reader = new FileReader();
  reader.onload = function(e) {
    // get loaded data and render thumbnail.
    document.getElementById("preview").src = e.target.result;
  };
  // read the image file as a data URL.
  reader.readAsDataURL(this.files[0]);
});
</script>

<script>
    $('[data-type="adhaar-number"]').keyup(function() {
  var value = $(this).val();
  value = value.replace(/\D/g, "").split(/(?:([\d]{4}))/g).filter(s => s.length > 0).join("-");
  $(this).val(value);
});

$('[data-type="adhaar-number"]').on("change, blur", function() {
  var value = $(this).val();
  var maxLength = $(this).attr("maxLength");
  if (value.length != maxLength) {
    $(this).addClass("highlight-error");
  } else {
    $(this).removeClass("highlight-error");
  }
});
</script>

<script>
    $(function() {
        $("input[name='phone']").on('input', function(e) {
            $(this).val($(this).val().replace(/[^0-9]/g, ''));
        });
    });
</script>

<script>
    $(function() {
        $("input[name='per_pin']").on('input', function(e) {
            $(this).val($(this).val().replace(/[^0-9]/g, ''));
        });
    });
</script>

<script>
    $(function() {
        $("input[name='pre_pin']").on('input', function(e) {
            $(this).val($(this).val().replace(/[^0-9]/g, ''));
        });
    });
</script>

{{-- Tooltip --}}
<script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

<script>
    function filladd() {
        if (filltoo.checked == true) {
            document.getElementById("per_pin").value =document.getElementById("pre_pin").value;
            document.getElementById("per_road").value =document.getElementById("pre_road").value;
            document.getElementById("per_landmark").value =document.getElementById("pre_landmark").value;
            document.getElementById("per_state").value =document.getElementById("pre_state").value;
            document.getElementById("per_district").value =document.getElementById("pre_district").value;
            document.getElementById("per_building").value =document.getElementById("pre_building").value;
            document.getElementById("per_country").value =document.getElementById("pre_country").value;
            document.getElementById("per_co").value =document.getElementById("pre_co").value;
        } else if (filltoo.checked == false) {
            document.getElementById("per_pin").value = '';
            document.getElementById("per_road").value = '';
            document.getElementById("per_landmark").value = '';
            document.getElementById("per_state").value = '';
            document.getElementById("per_district").value = '';
            document.getElementById("per_building").value = '';
            document.getElementById("per_country").value = '';
            document.getElementById("per_co").value = '';
        }
    }
</script>
</section>
@endsection
