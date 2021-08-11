

@extends('layout.master')
@section('header')
konfirmasi Petani
@endsection
@section('content')
<section class="content">
   <div class="container-fluid">
      <div class="col-md-12">
         <!-- Widget: user widget style 1 -->
         <div class="card card-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-info"
               style="background: url('public/asset/dist/img/view.jpg') center center;">
            </div>
            <div class="widget-user-image" >
               <img class="img-circle elevation-2" style="width: 110px;" src="{{asset('public/asset/dist/img/bambang.jpg')}}" alt="User Avatar">
            </div>
            <div class="card-footer">
               <div class="row">
                  <div class="col-sm-6">
                     <div class="description-block">
                        <a href="#" class="text-success">
                           <h5 class="description-header">Terima</h5>
                        </a>
                     </div>
                     <!-- /.description-block -->
                  </div>
                  <!-- /.row -->
                  <div class="col-sm-6">
                     <div class="description-block">
                        <a href="#" class="text-danger">
                           <h5 class="description-header">Tolak</h5>
                        </a>
                     </div>
                     <!-- /.description-block -->
                  </div>
               </div>
               <!-- /.row -->
            </div>
         </div>
         <!-- /.widget-user -->
      </div>
   </div>
   <div class="container-fluid">
      <div class="col-md-12">
         <!-- Widget: user widget style 1 -->
         <div class="card card-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="card-footer">
               <div class="row">
                  <div class="col-sm-2 border-right">
                     <div class="description-block">
                        <h5 class="description-header">Tanggal Daftar</h5>
                        <span class="description-text">14/05/2018</span>
                     </div>
                     <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-2 border-right">
                     <div class="description-block">
                        <h5 class="description-header">Alamat</h5>
                        <span class="description-text">Sukojati</span>
                     </div>
                     <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                     <div class="description-block">
                        <h5 class="description-header">Nama</h5>
                        <span class="description-text">Bambang Setya Budi</span>
                     </div>
                     <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-2 border-left">
                     <div class="description-block">
                        <h5 class="description-header">Email</h5>
                        <span class="description-text">bambangsetyabudi75@gmail.com</span>
                     </div>
                     <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-2 border-left">
                     <div class="description-block">
                        <h5 class="description-header">Telepon</h5>
                        <span class="description-text">085213345678</span>
                     </div>
                     <!-- /.description-block -->
                  </div>
               </div>
               <!-- /.row -->
            </div>
         </div>
         <!-- /.widget-user -->
      </div>
   </div>
</section>
<!-- /.content -->
<!-- jQuery -->
<script src="{{asset('public/asset/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/asset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('public/asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/asset/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('public/asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/asset/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('public/asset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/asset/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('public/asset/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('public/asset/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('public/asset/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('public/asset/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('public/asset/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- js dari data table -->
<script>
   $('#example2').DataTable({
     "paging": true,
     "lengthChange": false,
     "searching": true,
     "ordering": true,
     "info": true,
     "autoWidth": false,
     "responsive": true,
   });
</script>
@endsection

