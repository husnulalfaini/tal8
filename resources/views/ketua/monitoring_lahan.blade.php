

@extends('layout.master')
@section('content')
<!-- Sidebar Menu -->
<!-- konten utama -->
<section class="content">
   <div class="container-fluid">
   <div class="row">
      <!-- Left col -->
      <!-- <section class="col-lg-12 connectedSortable"> -->
      <!-- Custom tabs (Charts with tabs)-->
      <div class="col-md-6">
         <!-- Info Boxes Style 2 -->
         @section('header')
         Detail Lahan
         @endsection
         <div class="info-box mb-3 bg-white">
            <span class="info-box-icon"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
               <span class="info-box-text">Kelompok</span>
               <span class="info-box-number">Tani Jaya</span>
            </div>
            <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
         <div class="info-box mb-3 bg-white">
            <span class="info-box-icon"><i class="fa fa-user"></i></span>
            <div class="info-box-content">
               <span class="info-box-text">Petani</span>
               <span class="info-box-number">Bambang</span>
            </div>
            <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
         <div class="info-box mb-3 bg-white">
            <span class="info-box-icon"><i class="fas fa-tree"></i></span>
            <div class="info-box-content">
               <span class="info-box-text">Luas Lahan</span>
               <span class="info-box-number">15 Hektar</span>
            </div>
            <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
         <div class="info-box mb-3 bg-white">
            <span class="info-box-icon"><i class="fas fa-tree"></i></span>
            <div class="info-box-content">
               <span class="info-box-text">Jumlah Lahan</span>
               <span class="info-box-number">15 Lahan</span>
            </div>
            <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
         <div class="info-box mb-3 bg-white">
            <span class="info-box-icon"><i class="fas fa-archive"></i></span>
            <div class="info-box-content">
               <span class="info-box-text">Hasil Panen</span>
               <span class="info-box-number">16 Ton</span>
            </div>
            <!-- /.info-box-content -->
         </div>
      </div>
      <div class="col-md-6">
         <!-- PIE GRAFIK -->
         <div class="card card-success">
            <div class="card-header">
               <h3 class="card-title">GRAFIK</h3>
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                  </button>
               </div>
            </div>
            <div class="card-body">
               <div id="barChart"></div>
            </div>
            <!-- /.card-body -->
         </div>
      </div>
      <!-- </section> -->
   </div>
   <!-- /.Left col -->
   <!-- right col (We are only adding the ID to make the widgets sortable)-->
   <!-- <section class="col-lg-5 connectedSortable"> -->

   <!-- Tabel Aktifitas lahan -->
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Aktivitas Terbaru</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example2" class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th>No</th>
                              <th>Aktivitas</th>
                              <th>Tanggal</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>1</td>
                              <td>Menanam </td>
                              <td>14/02/2018</td>
                           </tr>
                           <tr>
                              <td>2</td>
                              <td>Memberi Pupuk </td>
                              <td>14/02/2018</td>
                           </tr>
                           <tr>
                              <td>3</td>
                              <td>Menyiram </td>
                              <td>14/02/2018</td>
                           </tr>
                        </tbody>
                        <tfoot>
                           <tr>
                              <th>No</th>
                              <th>Aktivitas</th>
                              <th>Tanggal</th>
                           </tr>
                        </tfoot>
                     </table>
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- /.card -->
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
   
      <!-- /.container-fluid -->
  
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
<!-- js dari grafik barchart -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
   Highcharts.chart('barChart', {
   chart: {
       type: 'column'
   },
   title: {
       text: 'Hasil Panen Porang Pertahun'
   },
   xAxis: {
       categories: [
           '2010',
           '2016',
           '2017',
           '2018',
           '2019',
           '2020'
       ],
       crosshair: true
   },
   yAxis: {
       min: 0,
       title: {
           text: 'Rainfall (mm)'
       }
   },
   tooltip: {
       headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
       pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
           '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
       footerFormat: '</table>',
       shared: true,
       useHTML: true
   },
   plotOptions: {
       column: {
           pointPadding: 0.2,
           borderWidth: 0
       }
   },
   series: [{
       name: 'Presentase Panen',
       data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0]
   }]
   });
</script>
@endsection

