@extends('admin.resource.main')
@section('title', 'Edit Faculty')
@section('content')
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('summary-ckeditor' );
</script>
<section class="content-header">
    <h1>
        @yield('title')
      <small><a href="{{url('/admin/list-faculty')}}" class="btn btn-warning btn-xs btn-flat btn-sm" title="Back"><i class="fa fa-plus"></i> BACK</a></small>
    </h1>
  </section>
  <section class="content">
    <form action="{{url('/admin/editFaculty',$data->id)}}" onsubmit="btnDisable()" method="post" enctype="multipart/form-data">
        {{-- <input type="hidden" name="_method" value="PATCH"> --}}
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

              {{-- Faculty Name --}}
            <label class="required fw-bold fs-6 mb-2">Faculty Name</label>
            <div class="input-group mb-5">
            <input type="text" class="form-control" name="faculty_name" value="{{$data->faculty_name}}" placeholder="Faculty Name" required>
            </div>

            {{-- Last Qualification --}}
            <label class="fw-bold fs-6 mb-2">Last Qualification</label>
            <div class="input-group mb-5">
            <input type="text" class="form-control" name="last_quali" value="{{$data->last_quali}}" placeholder="Last Qualification">
            </div>

            {{-- No Of Semester --}}
            <label class="required fw-bold fs-6 mb-2">Teaching For</label>
            <div class="input-group mb-5">
            <select name="teaching" class="form-select"  data-control="select2">
                <option value="General Education" @selected($data->teaching=="General Education")>General Education</option>
                <option value="Technical Education" @selected($data->teaching=="Technical Education")>Technical Education</option>
            </select>
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
            <button type="submit" class="btn btn-primary btn-xs" id="submit">Submit</button>
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
