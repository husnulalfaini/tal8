
@extends('layout.master')
@section('content')

<!-- konten utama -->
<section class="content">
   <div class="container-fluid">
   <!-- Small boxes (Stat box) -->
   <div class="row">
      <div class="col-lg-3 col-6 ">
         <!-- small box -->
         <div class="small-box bg-success">
            <div class="inner">
               <h3>{{$total_kelompok}} Kelompok</h3>
               <p>Total Kelompok</p>
            </div>
         </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
         <!-- small box -->
         <div class="small-box bg-success">
            <div class="inner">
               <h3>{{$jumlah_petani}} Orang</h3>
               <p>Total Petani</p>
            </div>
         </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
         <!-- small box -->
         <div class="small-box bg-success">
            <div class="inner">
               <h3>{{$luas_lahan}} Hektar</h3>
               <p>Luas Lahan</p>
            </div>
         </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
         <!-- small box -->
         <div class="small-box bg-success">
            <div class="inner">
            <h3>{{$total_panen}} Kilo</h3>
            <p>Total Panen</p>
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
      <div class="col-md-12">
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
                     <h3 class="card-title">Data Panen Kelompok</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                           <tr>
                              <th>Kelompok</th>
                              <th>Alamat</th>
                              <th>Tanggal Panen</th>
                              <th>Jumlah Panen</th>
                           </tr>
                        </thead>
                        <tbody>
                        @foreach($panens as $data)
                           <tr>
                           <td> 
                              {{$data->lahan->kelompok->nama}}
                           </td>
                           <td> 
                              {{$data->lahan->kelompok->alamat?:$empty}}
                           </td>
                           <td> 
                              {{$data->tanggal}}
                           </td>
                           <!-- panen diperbaiki -->
                           <td> 
                              {{$data->panen_katak}} kg
                           </td>
                           
                           </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                           <tr>
                              <th>Kelompok</th>
                              <th>Alamat</th>
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
<script src="{{asset('public/asset/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('public/asset/dist/js/demo.js')}}"></script>





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
     "buttons": ["csv", "excel", "pdf", "print"]
   }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
 
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
       categories: {!!json_encode($tgl_panen)!!},
       crosshair: true
   },
   yAxis: {
       min: 0,
       title: {
           text: 'Hasil Panen Porang (Ton)'
       }
   },
   tooltip: {
       headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
       pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
           '<td style="padding:0"><b>{point.y:.1f} Ton</b></td></tr>',
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
       data: {!!json_encode($panen_umbi)!!}
   }]
   });
</script>

@endsection

