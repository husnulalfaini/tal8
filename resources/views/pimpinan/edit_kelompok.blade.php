@extends('layout.master') 

@section('header_kanan') 
<a class="btn btn-success btn-md float-right"  href="{{route('daftar_kelompok')}}" role="button">Kembali</a>
@endsection 

@section('content') 
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-white">
          <div class="card-header ">
            <h3 class="card-title-center">Edit Kelompok</h3>
          </div>
          <form action="{{route('update.kelompok',$kelompok->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
            {{ csrf_field() }}
            <div class="card-body">
            	<div class="row">
            		<div class="col-md-6">


            			<!-- Nama Kelompok-->
            			<div class="form-group">
            				<div class="input-group">
            					<div class="input-group-prepend">
            						<span class="input-group-text ">
            							<i class="far fa-user"></i>
            						</span>
            					</div>
            					<input type="Text" class="form-control" id="text-input" name="nama" value="{{ $kelompok->nama }}">
            				</div>
            				<!-- /.input group -->
            			</div>
            			<!-- end Nama Kelompok-->


            			<!-- alamat Kelompok-->
            			<div class="form-group">
            				<div class="input-group">
            					<div class="input-group-prepend">
            						<span class="input-group-text">
            							<i class="fas fa-map-marker-alt"></i>
            						</span>
            					</div>
            					<input type="Text" class="form-control" id="text-input" name="alamat" value="{{ $kelompok->alamat }}">
            					<!-- /.input group -->
            				</div>
            			</div>
            			<!-- end alamat Kelompok-->


            			<!-- kecamatan -->
            			<div class="form-group">
            				<div class="input-group">
            					<div class="input-group-prepend">
            						<span class="input-group-text">
            							<i class="fas fa-map-marker-alt"></i>
            						</span>
            					</div>
            					<input type="Text" class="form-control" id="text-input" name="kecamatan" value="{{ $kelompok->kecamatan }}">
            					<!-- /.input group -->
            				</div>
            			</div>
						<!-- end kecamatan -->

            			<!-- lokasi -->
            			<div class="row">
            				<div class="col-md-7">
            					<div class="card">
            						<div id='map' style='height: 250px;'></div>
            					</div>
            				</div>
            				<div class="col-md-5">
            					<!--Longitude-->
            					<div class="form-group">
            						<div class="input-group">
            							<div class="input-group-prepend">
            								<span class="input-group-text">
            									<i class="fas fa-map-marker-alt"></i>
            								</span>
            							</div>
            							<input type="Text" class="form-control" id="longitude" name="longitude" value="{{ $kelompok->longitude }}">
            						</div>
            					</div>
            					<!-- /.Longitude -->
            					<!-- /.Latitude -->
            					<div class="form-group">
            						<div class="input-group">
            							<div class="input-group-prepend">
            								<span class="input-group-text">
            									<i class="fas fa-map-marker-alt"></i>
            								</span>
            							</div>
            							<input type="Text" class="form-control" id="latitude" name="latitude" value="{{ $kelompok->latitude }}">
            						</div>
            					</div>
            					<!-- /.Latitude -->
            				</div>
            			</div>
						<!-- end lokasi -->

            		</div> @foreach ($ketua as $ket) <div class="col-md-6">
            			<!-- Nama ketua-->
            			<div class="form-group">
            				<div class="input-group">
            					<div class="input-group-prepend">
            						<span class="input-group-text ">
            							<i class="far fa-user"></i>
            						</span>
            					</div>
            					<input type="text" class="form-control" id="text-input" name="name" placeholder="nama" value="{{ $ket->name }}">
            				</div>
            				<!-- /.input group -->
            			</div>
            			<!-- end Nama ketua-->


            			<!-- email ketua -->
            			<div class="form-group">
            				<div class="input-group">
            					<div class="input-group-prepend">
            						<span class="input-group-text">
            							<i class="fas fa-envelope"></i>
            						</span>
            					</div>
            					<input type="email" class="form-control" id="text-input" name="email" value="{{ $ket->email }}">
            					<!-- /.input group -->
            				</div>
            			</div>
            			<!-- end email ketua -->



            			<!-- password ketua-->
            			<div class="form-group">
            				<div class="input-group">
            					<div class="input-group-prepend">
            						<span class="input-group-text">
            							<i class="fas fa-lock"></i>
            						</span>
            					</div>
            					<input type="password" class="form-control" id="password" name="password" value="{{ $ket->password }}">
            					<!-- /.input group -->
            				</div>
            			</div>
            			<!-- end password ketua-->


            			<!-- telepon ketua -->
            			<div class="form-group">
            				<div class="input-group">
            					<div class="input-group-prepend">
            						<span class="input-group-text">
            							<i class="fas fa-phone"></i>
            						</span>
            					</div>
            					<input type="text" class="form-control" id="telepon" name="telepon" value="{{ $ket->telepon }}">
            					<!-- /.input group -->
            				</div>
            			</div>
            			<!--end telepon ketua -->


            			<!-- alamat ketua-->
            			<div class="form-group">
            				<div class="input-group">
            					<div class="input-group-prepend">
            						<span class="input-group-text">
            							<i class="fas fa-map-marker-alt"></i>
            						</span>
            					</div>
            					<input type="text" class="form-control" id="alamat" name="alamat" value="{{ $ket->alamat }}">
            					<!-- /.input group -->
            				</div>
            			</div> 
						<!-- end alamat ketua-->
						@endforeach


						 <div class="col-md-4 mx-auto text-center">
            				<!-- small box -->
            				<button type="submit" class="btn btn-success btn-block"> Tambah</button>
            			</div>
            			<!-- /.form group -->
            		</div>
            	</div>
            	<!-- /.card-body -->
            </div>
            <!-- /.card -->
        </form>
      </div>
    </div>
  </div>


</section>
<!-- /.content -->
<!-- jQuery -->
<script src="{{asset('public/asset/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/asset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css" type="text/css">
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script> 
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