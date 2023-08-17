    @extends('admin.resource.main')
    @section('title', 'Dashboard')
    {{-- <div style="background: #f5f5f5"> --}}
    @section('content')
    <style>

    .one
        {
            transition-duration: .5s;
            -webkit-transition-duration: 0.5s;
        }
        .one:hover
        {
            background: #e3e5ef;
            box-shadow: 5px 5px 12px #888888;
            transition-duration: .5s;
            -webkit-transition-duration: 0.5s;
        }

    </style>
  <!-- Sale & Revenue Start -->
  <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3 one">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Today Join Students</p>
                    <h6 class="mb-0">
                        <?php $join_stu = DB::table('students')->where('admission_date',date('Y-m-d'))->count();
                        echo $join_stu;
                        ?>
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 one">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-bar fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Students</p>
                    <h6 class="mb-0">
                        <?php $tot_stu = DB::table('students')->count();
                        echo $tot_stu;
                        ?>
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 one">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-area fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Today Courses</p>
                    <h6 class="mb-0">
                        <?php $tot_courses = DB::table('courses')->count();
                        echo $tot_courses;
                        ?>
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 one">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-pie fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Faculty</p>
                    <h6 class="mb-0">
                        <?php $tot_faculty = DB::table('faculties')->count();
                        echo $tot_faculty;
                        ?>
                    </h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sale & Revenue End -->
    @endsection
