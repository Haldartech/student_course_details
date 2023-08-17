@push('styles')
<link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endpush
@extends('admin.resource.main')
@section('title', 'List Faculty')
@section('content')
<section class="content-header">
    <h1>
        @yield('title')
      <small><a href="{{url('/admin/add-faculty')}}" class="btn btn-success btn-xs btn-flat btn-sm" title="Create Testimonials"><i class="fa fa-plus"></i> CREATE</a></small>
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
                        <th style="text-align: center;">Faculty Name</th>
                        <th style="text-align: center;">Last Qualification</th>
                        <th style="text-align: center;">Teaching For</th>
                        <th >Status</th>
                        <th >Action</th>
                    </tr>
                </thead>
        <tbody>
        <?php
    $i=1;
    $datas = DB::table('faculties')->orderBy('id','desc')->paginate(10);
    if(empty($request->page) || $request->page=='1'){
        $i=1;
    }else{
        $i=(10*($request->page-1))+1;
    }
    foreach ($datas as $data) {
    ?>
        <tr>
            <td style="text-align: center;">{{$i}}</td>
            <td style="text-align: center;">{{$data->faculty_name}}</td>
            <td style="text-align: center;">{{$data->last_quali}}</td>
            <td style="text-align: center;">{{$data->teaching}}</td>
            <td style="text-align: center;">
                <div class="tab-pane active" id="kt_builder_toolbar">
                    <div class="row">
                    <div class="col-lg-3 col-xl-9">
                        <form action="{{ url('/admin/facultystatuschanger','id='.$data->id) }}" name="sstc{{$data->id}}" id="sstc{{$data->id}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <input type="hidden" name="status" value="{{$data->status}}">
                        <div class="form-check form-check-custom form-check-solid form-switch mt-2">
                        <input class="form-check-input" type="checkbox" id="status{{$data->id}}" value="{{$data->status}}" {{($data->status=='1')?'checked title=Active':'title=Inactive'}} onchange="statusActivInact('{{ $data->id }}');">
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
                </td>
            <td style="text-align: center;">
            <a title="Edit Faculty" href="{{url('/admin/edit-faculty',$data->id)}}" class="btn btn-icon btn-circle btn-sm btn-warning"><i class="fa fa-pencil-alt"></i></a>
            <a title="Delete Faculty" onclick="return confirm('Are you sure delete this item ?')" href="{{url('/admin/deleteFaculty',$data->id)}}" class="btn btn-icon btn-circle btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
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
