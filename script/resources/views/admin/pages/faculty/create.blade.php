@extends('admin.resource.main')
@section('title', 'Add Faculty')
@section('content')
{{-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://code.jquery.com/jquery-2.2.4.js"></script> --}}
<section class="content-header">
    <h1>
        @yield('title')
      <small><a href="{{url('/admin/list-faculty')}}" class="btn btn-warning btn-flat btn-sm" title="Back"><i class="fa fa-plus"></i>BACK</a></small>
    </h1>
  </section>
  <section class="content">
    <form action="{{url('/admin/addFaculty')}}" onsubmit="btnDisable()" method="post" enctype="multipart/form-data">
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
            <input type="text" class="form-control" name="faculty_name" value="{{old('faculty_name')}}" placeholder="Faculty Name" required>
            </div>

            {{-- Last Qualification --}}
            <label class="fw-bold fs-6 mb-2">Last Qualification</label>
            <div class="input-group mb-5">
            <input type="text" class="form-control" name="last_quali" value="{{old('last_quali')}}" placeholder="Last Qualification">
            </div>

            {{-- No Of Semester --}}
            <label class="required fw-bold fs-6 mb-2">Teaching For</label>
            <div class="input-group mb-5">
            <select name="teaching" class="form-select"  data-control="select2">
                <option value="General Education">General Education</option>
                <option value="Technical Education">Technical Education</option>
            </select>
            </div>

            {{-- country --}}
            {{-- <label class="required fw-bold fs-6 mb-2">Country</label>
            <div class="input-group mb-5">
            <?php //$countries = DB::table('countries')->orderBy("country","asc")->get(); ?>
            <select name="country" id="country" class="form-select" data-control="select2" >
                <option value="">Select Country</option>
                @foreach($countries as $country)
                    <option value="{{$country->id}}">{{$country->country}}</option>
                @endforeach
            </select>
            </div> --}}

            {{-- State --}}
            {{-- <label class="required fw-bold fs-6 mb-2">State</label>
            <div class="input-group mb-5">
                <select name="state" id="state" class="form-select" data-control="select2">
                <option value="">Select State</option>
            </select>
            </div> --}}

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

{{-- <script>
    $(document).ready(function(){
        $("#country").change(function(){
            let cid = $(this).val();
            $.ajax({
                url:"{{url('/getState')}}",
                type:'post',
                data:'cid='+cid+'&_token={{csrf_token()}}',
                success:function(result){
                    $('#state').html(result)
                }
            });
        });
    });
</script> --}}

</section>
@endsection
