@extends('layout.master')

@section('header_kiri') 
Daftar Kelompok 
@endsection 

@section('header_kanan')
<a class="btn btn-success btn-md " data-toggle="modal" data-target="#tambah_kelompok" role="button">Tambah Kelompok</a>
<a class="btn btn-success btn-md float-right" data-toggle="modal" data-target="#tambah_ketua" role="button">Tambah Ketua</a>
@endsection 

@section('content')

<!-- Daftar Seluruh Kelompok -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Daftar Seluruh Kelompok</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<!-- ./col -->
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th></th>
								</tr>
							</thead>
							<tbody>@foreach ($kelompok as $item)
								<tr>
									<td>{{$item->id}}</td>
									<td>{{$item->nama}}</td>
									<td>{{$item->alamat}}</td>
									<td>
										<span class="badge bg-success"><a href="{{route('detail.kelompok',[$item->id])}}" class="text-dark">Detail<i class="far fa-eye"></i></a></span>
										<span class="badge bg-danger"><a href="{{route('kelompok.pdf',[$item->id])}}" class="text-dark"> Cetak Rekap <i class="fas fa-save"></i></a></span>       
                        			</td>
								</tr>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Alamat</th>
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
		</div>
		<!-- /.row -->
		<!-- /.container-fluid -->
</section>
<!-- END Daftar Seluruh Kelompok -->


<!-- Modal Tambah Kelompok-->
<div class="modal fade" id="tambah_kelompok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Kelompok Baru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{route('upload.tambah_kelompok')}}" method="post" enctype="multipart/form-data" class="form-horizontal">{{ csrf_field() }}
					<div class="card-body">
						<!-- Nama -->
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend"> <span class="input-group-text "><i class="far fa-user"></i></span>
								</div>
								<input type="Text" class="form-control" id="text-input" name="nama" placeholder="Nama Kelompok" required>
							</div>
							<!-- /.input group -->
						</div>
						<!-- /.form group -->
						<!-- IP mask -->
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
								</div>
								<input type="Text" class="form-control" id="text-input" name="alamat" placeholder="Alamat" required>
								<!-- /.input group -->
							</div>
						</div>
						<!-- /.form group -->
						<!-- IP mask -->
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
								</div>
								<input type="Text" class="form-control" id="text-input" name="kecamatan" placeholder="Wilayah Kecamatan" required>
								<!-- /.input group -->
							</div>
						</div>
						<!-- /.form group -->

						<div class="row">
      						<div class="col-md-7">
								<div class="card">
										<div id='map' style='height: 300px;'></div>
								</div>
							</div>
							<div class="col-md-5">
								<!--Longitude-->
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
										</div>
										<input type="Text" class="form-control" id="longitude" name="longitude" placeholder="longitude" required>
									</div>
								</div>
								<!-- /.Longitude -->
								<!-- /.Latitude -->
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
										</div>
										<input type="Text" class="form-control" id="latitude" name="latitude" placeholder="latitude" required>
								
									</div>
								</div>
								<!-- /.Latitude -->
							</div>
						</div>

						<div class="col-md-4 mx-auto text-center">
							<!-- small box -->
							<button type="submit" class="btn btn-success btn-block">Tambah</button>
						</div>
					</div>
					<!-- /.card-body -->
			</div>
			<!-- /.card -->
			</form>
		</div>
	</div>
</div>
      <!-- END Modal Tambah Kelompok -->


 <!-- Modal Tambah Ketua-->
<div class="modal fade" id="tambah_ketua" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Ketua Baru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<form action="{{route('upload.tambah_ketua')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
              {{ csrf_field() }}
               <div class="card-body">
                  <!-- Nama -->
                  <div class="form-group">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text "><i class="far fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" id="text-input" name="name" placeholder="Nama" required autocomplete="isi nama">
                     </div>
                     <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                  <!-- email -->
                  <div class="form-group">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" id="text-input" name="email" placeholder="Email" require required autocomplete="isi email">
                        <!-- /.input group -->
                     </div>
                  </div>
                  <!-- /.form group -->
                  <!-- password -->
                  <div class="form-group">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" id="password" name="password" placeholder="password" required autocomplete="jangan kosongkan password">
                        <!-- /.input group -->
                     </div>
                  </div>
                  <!-- /.form group -->

                  <!-- password -->
                  <div class="form-group">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="text" class="form-control" id="telepon" name="telepon" placeholder="telepon" required autocomplete="isi telepon">
                        <!-- /.input group -->
                     </div>
                  </div>
                  <!-- /.form group -->
                  <!-- password -->
                  <div class="form-group">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" required autocomplete="isi alamat">
                        <!-- /.input group -->
                     </div>
                  </div>
                  <!-- /.form group -->

				  
                  <div class="form-group">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                        </div>
                        <select id="kelompok_id" class="form-control text-darker" name="kelompok_id" required autocomplete="kelompok_id" autofocus>
                           @foreach ($kelompok as $item)
                              <option class="text-darker" value="{{ $item->id }}">{{ $item->nama }}</option>
                           @endforeach
                        </select>
                        <!-- /.input group -->
                     </div>
                  </div>
                  <!-- /.form group -->

                <div class="form-group col-md-4">
                        <label for="exampleInputFile">Unggah Foto</label>
                        <div class="input-group">
                           <div class="custom-file">
                           <input id="foto" type="file" class="form-control-file" name="foto" onchange="readURL(this);" autocomplete="foto" >
                           </div>
                        </div>
                     </div>
                  <!-- /.form group -->
                  <div class="col-md-4 mx-auto text-center">
                     <!-- small box -->
					 <button type="submit" class="btn btn-success btn-block"> Tambah</button>
                  </div>
               </div>
               <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </form>
		</div>
	</div>
</div>
      <!-- END Modal Tambah Kelompok -->

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
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css" type="text/css">
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
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
<script>
const defaultLocation = [114.2936452,-8.192552]
mapboxgl.accessToken = 'pk.eyJ1IjoiaHVzbnVsYWxmYWluaSIsImEiOiJja3hyYWE3bnU0bGMyMzBwemhianUwcHJyIn0.rIqlt6Y0SPRfiQglwkKHEw';
var map = new mapboxgl.Map({
container: 'map',
center: defaultLocation,
zoom: 11.15,
style: 'mapbox://styles/mapbox/outdoors-v9'
});

var geocoder = new MapboxGeocoder({
    accessToken: mapboxgl.accessToken,
    mapboxgl: mapboxgl,
    marker:false,
    placeholder: 'Masukan kata kunci...',
    zoom:20
});
  
  
map.addControl(
    geocoder
);

let marker = null
map.on('click', function(e) {
      if(marker == null){
          marker = new mapboxgl.Marker()
          .setLngLat(e.lngLat)
          .addTo(map);
      } else {
          marker.setLngLat(e.lngLat)
      }
      lk = e.lngLat
      document.getElementById("latitude").value = e.lngLat.lat;
      document.getElementById("longitude").value =e.lngLat.lng;
});
// map.addControl(new mapboxgl.NavigationControl())

// map.on('click',(e)=>{
// 	const longtitude = e.lnglat.lng
// 	const lattitude = e.lnglat.lat

// 	// @this.long = longtitude
// 	// @this.lat = lattitude
// 	consol.log({longtitude,lattitude});
	
// })
</script>
@endsection