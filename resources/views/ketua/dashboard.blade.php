@extends('layout.master') 

@section('content')

<!-- konten utama -->
<section class="content">
  <div class="container-fluid">
    <div class="row">

      <!-- total petani -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$anggota}} Orang</h3>
            <p>Total Petani</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </div>
      <!-- total petani -->


      <!-- luas lahan -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$luas_lahan}} Hektar</h3>
            <p>Luas Lahan</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </div>
      <!-- end luas lahan -->


      <!-- total panen -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$hasil}} Kilo</h3>
            <p>Total Panen</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </div>
      <!-- total panen -->


      <!-- jumlah lahan -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$jumlah_lahan}}</h3>
            <p>Jumlah Lahan</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </div>
      <!-- end jumlah lahan -->
    </div>
    <!-- /.row -->

    <!-- Main row -->
    <div class="row">
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
                  <th>Lahan</th>
                  <th>Tanggal Panen</th>
                  <th>Jumlah Panen Katak</th>
                  <th>Jumlah Panen Umbi</th>
                </tr>
              </thead>
              <tbody> @foreach ($data_panen as $item) <tr>
                  <td>{{$item->nama}}</td>
                  <td>{{$item->alamat?:$empty}}</td>
                  <td>{{$item->lahan}}</td>
                  <td>{{$item->tanggal}}</td>
                  <td>{{$item->katak}} KG</td>
                  <td>{{$item->umbi}} KG</td>
                </tr> @endforeach </tbody>
              <tfoot>
                <tr>
                  <th>Petani</th>
                  <th>Alamat</th>
                  <th>Lahan</th>
                  <th>Tanggal Panen</th>
                  <th>Jumlah Panen Katak</th>
                  <th>Jumlah Panen Umbi</th>
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
       categories: {!!json_encode($tgl_panen)!!},
       crosshair: true
   },
   yAxis: {
       min: 0,
       title: {
           text: 'Hasil Panen Porang (Kilo Gram)'
       }
   },
   tooltip: {
       headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
       pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
           '<td style="padding:0"><b>{point.y:.1f} KG</b></td></tr>',
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