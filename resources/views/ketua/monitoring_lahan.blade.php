

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
      <div class="col-md-12">
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Monitoring Lahan</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th>Tanggal</th>
                              <th>Kelembapan</th>
                              <th>Ph</th>
                              <th>Keterangan</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($monitoring_lahan as $item)
                           <tr>
                              <td>{{$item->created_at}}</td>
                              <td>{{$item->kelembapan}}</td>
                              <td>{{$item->ph}}</td>
                              <td>kelembapan tinggi</td>
                              <td>ph normal</td>
                           </tr>
                           @endforeach
                        </tbody>
                        <tfoot>
                           <tr>
                              <th>Tanggal</th>
                              <th>Kelembapan</th>
                              <th>Ph</th>
                              <th>Keterangan</th>
                              <th></th>
                           </tr>
                        </tfoot>
                     </table>
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- /.card -->
            </div>
            <!-- /.col -->
      <!-- </section> -->
   </div>
   <!-- /.Left col -->
   <!-- right col (We are only adding the ID to make the widgets sortable)-->
   <!-- <section class="col-lg-5 connectedSortable"> -->

   <!-- Tabel Aktifitas lahan -->
         <div class="row">
            <div class="col-md-6">
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Aktivitas Tanam</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example2" class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th>Tanggal</th>
                              <th>jumlah Bibit</th>
                           </tr>
                        </thead>
                        <tbody>@foreach ($tanam_petani as $item)
									<tr>
										<td>{{$item->tanggal}}</td>
										<td>{{$item->jumlah_bibit}}</td>
									</tr>@endforeach
                        </tbody>
                        <tfoot>
                           <tr>
                              <th>Tanggal</th>
                              <th>jumlah Bibit</th>
                           </tr>
                        </tfoot>
                     </table>
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- /.card -->
            </div>
            <!-- /.col -->

            <div class="col-md-6">
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Aktivitas Panen</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example3" class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th>Tanggal</th>
                              <th>Panen Katak</th>
                              <th>Panen Umbi</th>
                           </tr>
                        </thead>
                        <tbody>@foreach ($panen_petani as $item)
									<tr>
										<td>{{$item->tanggal}}</td>
										<td>{{$item->panen_katak}}</td>
										<td>{{$item->panen_umbi}}</td>
									</tr>@endforeach
                        </tbody>
                        <tfoot>
                           <tr>
                              <th>Tanggal</th>
                              <th>Panen Katak</th>
                              <th>Panen Umbi</th>
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
   $('#example1').DataTable({
     "paging": true,
     "lengthChange": false,
     "searching": true,
     "ordering": true,
     "info": true,
     "autoWidth": false,
     "responsive": true,
   });
</script>

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

<script>
   $('#example3').DataTable({
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

