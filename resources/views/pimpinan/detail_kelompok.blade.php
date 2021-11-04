

@extends('layout.master')
@section('content')
<!-- Sidebar Menu -->
<!-- konten utama -->
<section class="content">
   <div class="container-fluid">
   <!-- Small boxes (Stat box) -->
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
               <h3 class="card-title">Detail Kelompok</h3>
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
               <div class="info-box mb-3 bg-white">
            <span class="info-box-icon"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
               <span class="info-box-text">Kelompok</span>
               <span class="info-box-number">{{$kelompok->nama}}</span>
            </div>
            <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
         <div class="info-box mb-3 bg-white">
            <span class="info-box-icon"><i class="fa fa-user"></i></span>
            <div class="info-box-content">
               <span class="info-box-text">Ketua</span>
               <span class="info-box-number">{{$ketua->name}}</span>
            </div>
            <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
         <div class="info-box mb-3 bg-white">
            <span class="info-box-icon"><i class="fas fa-tree"></i></span>
            <div class="info-box-content">
               <span class="info-box-text">Anggota Tani</span>
               <span class="info-box-number">{{$anggota}} orang</span>
            </div>
            <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
         <div class="info-box mb-3 bg-white">
            <span class="info-box-icon"><i class="fas fa-tree"></i></span>
            <div class="info-box-content">
               <span class="info-box-text">Jumlah Lahan</span>
               <span class="info-box-number">{{$jumlah_lahan}}</span>
            </div>
            <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
         <div class="info-box mb-3 bg-white">
            <span class="info-box-icon"><i class="fas fa-archive"></i></span>
            <div class="info-box-content">
               <span class="info-box-text">Hasil Panen</span>
               <span class="info-box-number">{{$hasil}} Ton</span>
            </div>
            <!-- /.info-box-content -->
         </div>
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
               <h3 class="card-title">Lokasi Kelompok</h3>
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
        <div id="lat" style="display:none;">-8.192552</div>
        <div id="long" style="display:none;">114.2936452</div>
        <div id="map" style="width:500px;height:480px;"></div>
    </div>

    <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>

    <script type="text/javascript">

        const platform = new H.service.Platform({ apikey: 'xwNRXhJjal0isNdGq1d3i8_OkbS3VA4z5UsGlpp3AwI' });
            const defaultLayers = platform.createDefaultLayers();
            const map = new H.Map(document.getElementById('map'),
                defaultLayers.vector.normal.map, {
                center: { lat: 0.000000, lng: 118.00000 },
                zoom: 5,
                pixelRatio: window.devicePixelRatio || 1
            });
            window.addEventListener('resize', () => map.getViewPort().resize());
            const behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));
            const ui = H.ui.UI.createDefault(map, defaultLayers);

            //Begin geocoding
            // const lat = '-8.23648';
            // const long = '114.35851';

            const lat = document.getElementById("lat").textContent;
            const long = document.getElementById("long").textContent;

            const service = platform.getSearchService();
                service.reverseGeocode({ at: lat+','+long}, (result) => {
                result.items.forEach((item) => {
                    map.addObject(new H.map.Marker(item.position));
                });
                }, alert);
                        
    </script>
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
                     <h3 class="card-title">Data Panen Anggota Tani</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example2" class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th>No</th>
                              <th>Petani</th>
                              <th>Lahan</th>
                              <th>Jumlah Panen Umbi</th>
                              <th>Jumlah Panen Katak</th>
                              <th>Tanggal Panen</th>
                           </tr>
                        </thead>
                        <tbody>
                        @php
                        $no = 1
                        @endphp
                        @foreach($panen as $item)
                           <tr>
                              <td>{{$no++}}</td>
                              <td>{{$item->nama}}</td>
                              <td>{{$item->lahan}}</td>
                              <td>{{$item->panen_umbi}}</td>
                              <td>{{$item->panen_katak}}</td>
                              <td>{{$item->tanggal}}</td>
                           </tr>
                           @endforeach
                        </tbody>
                        <tfoot>
                           <tr>
                              <th>No</th>
                              <th>Petani</th>
                              <th>Lahan</th>
                              <th>Jumlah Panen Umbi</th>
                              <th>Jumlah Panen Katak</th>
                              <th>Tanggal Panen</th>
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
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASox_2NLl5RJMlnzAr1vrFaQhjUOv6s4Q&callback=initialize"
  type="text/javascript"></script>
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

@endsection

