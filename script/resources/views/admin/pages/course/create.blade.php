@extends('admin.resource.main')
@section('title', 'Add Course')
@section('content')
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('summary-ckeditor' );
</script>
<section class="content-header">
    <h1>
        @yield('title')
      <small><a href="{{url('/admin/list-course')}}" class="btn btn-warning btn-flat btn-sm" title="Back"><i class="fa fa-plus"></i>BACK</a></small>
    </h1>
  </section>
  <section class="content">
    <form action="{{url('/admin/addCourse')}}" onsubmit="btnDisable()" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
  <!--begin::Row-->
  <div class="row gy-5 g-xl-8">
    <div class="col-xl-8">
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

            {{-- Course Name --}}
            <label class="required fw-bold fs-6 mb-2">Course Name</label>
            <div class="input-group mb-5">
            <input type="text" class="form-control" name="course_name" value="{{old('course_name')}}" placeholder="Course Name" required>
            </div>

            {{-- Duration --}}
            <label class="required fw-bold fs-6 mb-2">Duration</label>
            <div class="input-group mb-5">
            <input type="text" class="form-control" name="duration" value="{{old('duration')}}" placeholder="Duration" required>
            </div>

            {{-- No Of Semester --}}
            <label class="required fw-bold fs-6 mb-2">No Of Semester</label>
            <div class="input-group mb-5">
            <input type="text" class="form-control" name="no_of_semester" value="{{old('no_of_semester')}}" placeholder="No Of Semester" required>
            </div>

            {{-- Eligibility --}}
            <label class="required fw-bold fs-6 mb-2">Eligibility</label>
            <div class="input-group mb-5">
            <input type="text" class="form-control" name="eligibility" value="{{old('eligibility')}}" placeholder="Eligibility" required>
            </div>

            {{-- Details --}}
            <label class="required fw-bold fs-6 mb-2">Details</label>
            <div class="mb-5">
            <textarea class="form-control" id="kt_docs_tinymce_basic" name="details" required>{{old('details')}}</textarea>
            </div>

        <!--end::Input group-->
    </div>
    <!--end::Body-->
</div>
</div>
<div class="col-xl-4">
  <!-- general form elements -->
  <div class="card">
    <!--begin::Header-->
    <div class="card-header border-0 bg-danger mb-5" style="min-height: 40px;">
        <h3 class="card-title fw-bolder text-white">Action</h3>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body p-0">
          <!--begin::Input group-->

          <div class="input-group mt-8">
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
    CKEDITOR.replace( 'kt_docs_tinymce_basic',
    {
    customConfig : 'config.js',
    toolbar : 'simple'
    })
</script>
</section>
@endsection
