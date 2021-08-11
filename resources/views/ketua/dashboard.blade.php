

@extends('layout.master')
@section('content')
<!-- Sidebar Menu -->
<!-- konten utama -->
<section class="content">
   <div class="container-fluid">
   <!-- Small boxes (Stat box) -->
   <div class="row">
      <div class="col-lg-3 col-6">
         <!-- small box -->
         <div class="small-box bg-success">
            <div class="inner">
               <h3>50 Orang</h3>
               <p>Total Petani</p>
            </div>
            <div class="icon">
               <i class="ion ion-stats-bars"></i>
            </div>
         </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
         <!-- small box -->
         <div class="small-box bg-success">
            <div class="inner">
               <h3>50 Hektar</h3>
               <p>Luas Lahan</p>
            </div>
            <div class="icon">
               <i class="ion ion-stats-bars"></i>
            </div>
         </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
         <!-- small box -->
         <div class="small-box bg-success">
            <div class="inner">
               <h3>53 Kilo</h3>
               <p>Total Panen</p>
            </div>
            <div class="icon">
               <i class="ion ion-stats-bars"></i>
            </div>
         </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
         <!-- small box -->
         <div class="small-box bg-success">
            <div class="inner">
               <h3>50</h3>
               <p>Jumlah Lahan</p>
            </div>
            <div class="icon">
               <i class="ion ion-stats-bars"></i>
            </div>
         </div>
      </div>
      <!-- ./col -->
   </div>
   <!-- /.row -->
   <!-- Main row -->
   <div class="row">
      <!-- Left col -->
      <!-- <section class="col-lg-12 connectedSortable"> -->
      <!-- Custom tabs (Charts with tabs)-->
      <div class="col-md-6">
         <!-- GRAFIK -->
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
               <div class="chart">
                  <div id="barChart"></div>
               </div>
            </div>
            <!-- /.card-body -->
         </div>
         <!-- /.card -->
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
               <div id="pieChart"></div>
            </div>
            <!-- /.card-body -->
         </div>
      </div>
      <!-- </section> -->
   </div>
   <!-- /.Left col -->
   <!-- right col (We are only adding the ID to make the widgets sortable)-->
   <!-- <section class="col-lg-5 connectedSortable"> -->
      
   <!-- Tabel Data Panen Petani -->
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Data Panen Petani</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example2" class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th>Petani</th>
                              <th>Alamat</th>
                              <th>Tanggal Tanam</th>
                              <th>Tanggal Panen</th>
                              <th>Jumlah Panen</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>Midun</td>
                              <td>Wongsorejo
                              </td>
                              <td>14/02/2018</td>
                              <td>14/11/2020</td>
                              <td>10 kintal</td>
                           </tr>
                           <tr>
                              <td>Midun</td>
                              <td>Wongsorejo
                              </td>
                              <td>14/02/2018</td>
                              <td>14/11/2020</td>
                              <td>10 kintal</td>
                           </tr>
                           <tr>
                              <td>Midun</td>
                              <td>Wongsorejo
                              </td>
                              <td>14/02/2018</td>
                              <td>14/11/2020</td>
                              <td>10 kintal</td>
                           </tr>
                           <tr>
                              <td>Midun</td>
                              <td>Wongsorejo
                              </td>
                              <td>14/02/2018</td>
                              <td>14/11/2020</td>
                              <td>10 kintal</td>
                           </tr>
                           <tr>
                              <td>Midun</td>
                              <td>Wongsorejo
                              </td>
                              <td>14/02/2018</td>
                              <td>14/11/2020</td>
                              <td>10 kintal</td>
                           </tr>
                           <tr>
                              <td>Midun</td>
                              <td>Wongsorejo
                              </td>
                              <td>14/02/2018</td>
                              <td>14/11/2020</td>
                              <td>10 kintal</td>
                           </tr>
                           <tr>
                              <td>Midun</td>
                              <td>Wongsorejo
                              </td>
                              <td>14/02/2018</td>
                              <td>14/11/2020</td>
                              <td>10 kintal</td>
                           </tr>
                           <tr>
                              <td>Midun</td>
                              <td>Wongsorejo
                              </td>
                              <td>14/02/2018</td>
                              <td>14/11/2020</td>
                              <td>10 kintal</td>
                           </tr>
                           <tr>
                              <td>Midun</td>
                              <td>Wongsorejo
                              </td>
                              <td>14/02/2018</td>
                              <td>14/11/2020</td>
                              <td>10 kintal</td>
                           </tr>
                           <tr>
                              <td>Midun</td>
                              <td>Wongsorejo
                              </td>
                              <td>14/02/2018</td>
                              <td>14/11/2020</td>
                              <td>10 kintal</td>
                           </tr>
                        </tbody>
                        <tfoot>
                           <tr>
                              <th>Petani</th>
                              <th>Alamat</th>
                              <th>Tanggal Tanam</th>
                              <th>Tanggal Panen</th>
                              <th>Jumlah Panen</th>
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
     "searching": false,
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
<!-- js dari grafik piechart -->
<script>
   // Build the chart
   Highcharts.chart('pieChart', {
   chart: {
   plotBackgroundColor: null,
   plotBorderWidth: null,
   plotShadow: false,
   type: 'pie'
   },
   title: {
   text: 'Hasil Panen Porang Pertahun'
   },
   tooltip: {
   pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
   },
   accessibility: {
   point: {
       valueSuffix: '%'
   }
   },
   plotOptions: {
   pie: {
       allowPointSelect: true,
       cursor: 'pointer',
       dataLabels: {
           enabled: false
       },
       showInLegend: true
   }
   },
   series: [{
   name: 'Presentase Panen',
   colorByPoint: true,
   data: [{
       name: '2010',
       y: 61.41,
       sliced: true,
       selected: true
   }, {
       name: '2016',
       y: 11.84
   }, {
       name: '2017',
       y: 10.85
   }, {
       name: '2018',
       y: 4.67
   }, {
       name: '2019',
       y: 4.18
   }, {
       name: '2020',
       y: 7.05
   }]
   }]
   });
</script>
@endsection

