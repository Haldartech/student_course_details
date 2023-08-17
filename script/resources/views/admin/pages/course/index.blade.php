@push('styles')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endpush
@extends('admin.resource.main')
@section('title', 'List Course')
@section('content')
<section class="content-header">
    <h1>
        @yield('title')
      <small><a href="{{url('/admin/add-course')}}" class="btn btn-success btn-xs btn-flat btn-sm" title="Create Testimonials"><i class="fa fa-plus"></i> CREATE</a></small>
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
<div class="box">
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">

            <table id="example1" class="table table-striped table-bordered border gy-4 gs-4">
                <thead>
                    <tr class="fw-bold fs-6">
                        <th style="text-align: center;">Sl No.</th>
                        <th style="text-align: center;">Course Code</th>
                        <th style="text-align: center;">Course Name</th>
                        <th style="text-align: center;">Duration</th>
                        <th style="text-align: center;">No. Of Semester</th>
                        <th style="text-align: center;">Eligibility</th>
                        <th style="text-align: center;">Details</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
        <tbody>
        <?php
    $i=1;
    $datas = DB::table('courses')
    ->leftjoin("course_dtls","courses.id", "=", "course_dtls.course_id")
    ->orderBy('courses.id','desc')->paginate(10);
    if(empty($request->page) || $request->page=='1'){
    }else{
        $i=(10*($request->page-1))+1;
    }
    foreach ($datas as $data) {
    ?>
        <tr>
            <td style="text-align: center;">{{$i}}</td>
            <td style="text-align: center; width: 120px;">{{$data->course_code}}</td>
            <td style="text-align: center;">{{$data->course_name}}</td>
            <td style="text-align: center; width: 84px; ">{{$data->duration}}</td>
            <td style="text-align: center;">{{$data->no_of_semester}}</td>
            <td style="text-align: center;">{{$data->eligibility}}</td>
            <td style="text-align: center;">
              <button type="button" title="Modal Message" class="btn btn-icon btn-circle btn-sm btn-success" data-toggle="modal" data-target="#EnquiryModal{{$data->id}}">
                <i class="fa fa-eye"></i>
            </button>
            </td>
            <td style="display: flex">
            <a title="Edit Course" href="{{url('/admin/edit-course',$data->id)}}" class="btn btn-icon btn-circle btn-sm btn-warning"><i class="fa fa-pencil-alt"></i></a> &nbsp;
            <a title="Delete Course" onclick="return confirm('Are you sure delete this item ?')" href="{{url('/admin/deleteCourse',$data->id)}}" class="btn btn-icon btn-circle btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>

        <!-- EnquiryModal -->
        <div class="modal fade" id="EnquiryModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="EnquiryModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="EnquiryModalLabel">Message</h5>
              <button type="button" class="close rounded-circle" data-dismiss="modal" aria-label="Close" style="border: none">
                  <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <div class="modal-body">
                  <?php echo $data->details; ?>
              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
          </div>
          </div>
      </div>
      <!-- EnquiryModal End -->


        <?php
    $i++;
    } ?>
    </tbody>
      </table>
      {{ $datas->links() }}
    </div>
</div>
</div>
</div>
</section>
<script>
    // var ischecked=document.getElementById('status2').checked;
    function statusActivInact(id) {
      var ischecked=document.getElementById('status'+id);
     //alert(ischecked.checked);
      var fid="sstc"+id;
      var result = confirm("Are you want to change the status?");
        if (result) {
          document.getElementById(fid).submit();
        }else{
          if(ischecked.checked==false){
            document.getElementById('status'+id).checked=true;
          }else{
            document.getElementById('status'+id).checked=false;
          }
        }
    }
  </script>
@endsection
@push('script')
<!-- DataTables -->
<script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
@endpush
@push('script-write')
<script>
  $(function () {
    // $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endpush
