@extends('admin.resource.main')
@section('title', 'Profile')
@section('content')
<section class="content-header">
    <h1>
        @yield('title')
    </h1>
  </section>

  <section class="content">
    @foreach ($datas as $data)
    <form action="{{url('/admin/addProfile',$data->id)}}" onsubmit="btnDisable()" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
   <!--begin::Row-->
  <div class="row gy-5 g-xl-8">
    <div class="col-xl-12">
      <!-- general form elements -->
      <div class="card">
        <center>
            {{-- @if (empty($data->image)) --}}
            <img class="browse rounded-circle" name="logo" id="preview" id="file" src="{{url("public/images/profile/".$data->logo)}}" alt="Picture" style="width:150px; height:150px; cursor:pointer;"/>
            <input type="file" class="file" name="logo"  accept="image/x-png, image/gif, image/jpeg" hidden required=""><br><br>
            {{-- @endif --}}

            <button class="btn btn-success">Update Picture</button>

        </center>
      </div>
{{-- end card --}}
</div>
{{-- col-xl-12 end --}}
</div>
<!--end::Row-->

</form>
@endforeach
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

</section>
@endsection
