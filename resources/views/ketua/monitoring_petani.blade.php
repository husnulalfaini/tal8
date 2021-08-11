

@extends('layout.master')
@section('header')
Monitoring Petani
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
               </div>
            </div>
            <!-- /.widget-user -->
         </div>
      </div>
         <div class="col-md-12">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
               <!-- Add the bg color to the header using any of the bg-* classes -->
               <div class="card-footer">
                  <div class="row">
                     <div class="col-sm-2 border-right">
                        <div class="description-block">
                           <h5 class="description-header">Kelompok Tani</h5>
                           <span class="description-text">Tani Jaya</span>
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
      <!-- /.content -->
      <!-- jQuery -->
            <div class="container-fluid">
            <div class="row">
            <div class="col-md-6">
            <div class="card">
            <div class="card-header">
            <h3 class="card-title">Riwayat Panen</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
            <th>Tanggal</th>
            <th>Jumlah Panen</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <td>14/11/2020</td>
            <td>10 kintal</td>
            </tr>
            <tr>
            <td>14/11/2020</td>
            <td>10 kintal</td>
            </tr>
            <tr>
            <td>14/11/2020</td>
            <td>10 kintal</td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
            <th>Tanggal</th>
            <th>Jumlah Panen</th>
            </tr>
            </tfoot>
            </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            <div class="col-md-6">
            <div class="card">
            <div class="card-header">
            <h3 class="card-title">Detail Lahan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="row">
            <div class="col-sm-4 border-right">
            <div class="description-block">
            <h5 class="description-header">Luas Lahan</h5>
            <span class="description-text">1 hektar</span>
            </div>
            <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4 border-right">
            <div class="description-block">
            <h5 class="description-header">Jumlah Lahan</h5>
            <span class="description-text">15 lahan</span>
            </div>
            <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4 border-right">
            <div class="description-block">
            <h5 class="description-header">Total Panen</h5>
            <span class="description-text">6 ton</span>
            </div>
            <!-- /.description-block -->
            </div>
            </div>
            <!-- /.row -->
            </div>    
            <div class="row">
            <!-- ./col -->
            <div class="col-md-6 offset-md-3 text-center">
            <!-- small box -->
            <a href="{{url('/konfirmasi')}}" class="text-light">
            <div class="small-box bg-success">
            <div class="inner">
            Monitoring Lahan
            </div>
            </div>
            </a>
            </div>
            </div>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            </div>
            </div>         
   </section>
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

