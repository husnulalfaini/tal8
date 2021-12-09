
@extends('layout.master')

@section('content')
<!-- Sidebar Menu -->

<!-- Grafik Kelembapan -->
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-6">
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">Grafik Kelembapan</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
                <canvas id="myChart1"></canvas>
            </div>
         </div>
      </div>
   <!-- /.Left col -->


<!-- Grafik PH -->
         <div class="col-md-6">
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">Grafik PH</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
                <canvas id="myChart2"></canvas>
            </div>
         </div>
      </div>
      </div>
   <!-- /.Left col -->
 

   <!-- Tabel Aktifitas lahan -->
         <div class="row">
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
               </div>
               </div>
               <!-- /.col -->
         <!-- </section> -->
         
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<script>
    var ctx = document.getElementById("myChart1");
    var myChart1 = new Chart(ctx, {
      type: 'line',
      data: {
        labels: [],
        datasets: [{
          fill: false,
          pointBorderColor: 'blue',
          borderColor: 'blue',
          label: 'kelembapan',
          data: [],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          xAxes: [],
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
    var updateChart = function() {
      $.ajax({
        url: "{{ route('chartKelembapan') }}",
        type: 'GET',
        dataType: 'json',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data_kelembapan) {
          myChart1.data.labels = data_kelembapan.labels;
          myChart1.data.datasets[0].data = data_kelembapan.data_kelembapan;
          myChart1.update();
        },
        error: function(data_kelembapan){
          console.log(data_kelembapan);
        }
      });
    }

    updateChart();
    setInterval(() => {
      updateChart();
    }, 1000); 
 
    var ctx = document.getElementById("myChart2");
    var myChart2 = new Chart(ctx, {
      type: 'line',
      data: {
        labels: [],
        datasets: [{
          fill: false,
          pointBorderColor: 'blue',
          borderColor: 'blue',
          label: 'ph',
          data: [],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          xAxes: [],
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
    var updateChart = function() {
      $.ajax({
        url: "{{ route('chartPH') }}",
        type: 'GET',
        dataType: 'json',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data_PH) {
          myChart2.data.labels = data_PH.labels;
          myChart2.data.datasets[0].data = data_PH.data_PH;
          myChart2.update();
        },
        error: function(data_PH){
          console.log(data_PH);
        }
      });
    }

    updateChart();
    setInterval(() => {
      updateChart();
    }, 1000); 
  </script>
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

