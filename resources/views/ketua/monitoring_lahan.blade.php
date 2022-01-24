
@extends('layout.master')
@section('content')
<!-- Sidebar Menu -->

<!-- Grafik Kelembapan -->
<section class="content">
   <div class="container-fluid">
    <div class="row">

      <!-- GRAFIK -->
      <div class="col-md-6">
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
              <div id="barChart1"></div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- end  GRAFIK -->


      
      <!-- GRAFIK -->
      <div class="col-md-6">
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
              <div id="barChart2"></div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- end GRAFIK -->

    </div>
    <!-- /.Left col -->
  
 

   <!-- Tabel monitoring lahan -->
   <div class="row">
         	<div class="col-md-12">
         		<div class="card">
         			<div class="card-header">
         				<h3 class="card-title">Monitoring Lahan</h3>
         			</div>

               
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
         							<td>{{$item->info_kelembapan}}</td>
         							<td>{{$item->info_ph}}</td>
         						</tr> 
                     @endforeach 
                    </tbody>
         					<tfoot>
         						<tr>
         							<th>Waktu</th>
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

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>

Highcharts.chart('barChart1', {

title: {
    text: 'Sensor Kelembapan'
},
chart: {
       type: 'line'
   },

subtitle: {
    text: ''
},

yAxis: {
    title: {
        text: 'Nilai Sensor'
    }
},

xAxis: {
   categories: {!!json_encode($tgl_sensor)!!},
       crosshair: true
    },

legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle'
},

plotOptions: {
   column: {
           pointPadding: 0.2,
           borderWidth: 0
       }
},


series: [{
        name: 'Kelembapan',
        data: {!!json_encode($data_kelembapan)!!}
    }],

responsive: {
    rules: [{
        condition: {
            maxWidth: 500
        },
        chartOptions: {
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
            }
        }
    }]
}
   });

   
</script>
<script>

Highcharts.chart('barChart2', {

title: {
    text: 'Sensor PH'
},
chart: {
       type: 'line'
   },

subtitle: {
    text: ''
},

yAxis: {
    title: {
        text: 'Nilai Sensor'
    }
},

xAxis: {
   categories: {!!json_encode($tgl_sensor)!!},
       crosshair: true
    },

legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle'
},

plotOptions: {
   column: {
           pointPadding: 0.2,
           borderWidth: 0
       }
},


series: [{
        name: 'PH',
        data: {!!json_encode($data_ph)!!}
    }],

responsive: {
    rules: [{
        condition: {
            maxWidth: 500
        },
        chartOptions: {
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
            }
        }
    }]
}
   });

   
</script>
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
@endsection

