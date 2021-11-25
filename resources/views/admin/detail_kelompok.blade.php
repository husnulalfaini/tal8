@extends('layout.master') @section('content')
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<!-- Profile Image -->
				<div class="card card-yellow card-outline">
					<div class="card-body box-profile">					
                        <h3 class="profile-username text-center">{{$kelompok->nama}}</h3>
					<!-- /.card-header -->
					<div class="card-body"> 
						<hr> <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
						<p class="text-muted">{{$kelompok->alamat}}</p>
						<hr> <strong><i class="fas fa-user mr-1"></i> Ketua</strong>
						<br>
						<a class="text-muted">{{$ketua->name}}</a>
						<hr> <strong><i class="fas fa-users mr-1"></i> Petani Tergabung</strong>
						<br>
						<a class="text-muted">{{$anggota}}</a>
						<hr> <strong><i class="fas fa-ring mr-1"></i> Total Panen</strong>
						<br>
						<a class="text-muted">{{$hasil}}</a>
						<hr> <strong><i class="fas fa-leaf mr-1"></i> luas Lahan</strong>
						<br>
						<a class="text-muted">{{$luas_lahan}}</a>
						<hr> <strong><i class="fas fa-tree mr-1"></i> Jumlah Lahan</strong>
						<br>
						<a class="text-muted">{{$jumlah_lahan}}</a>
					</div>
					<!-- /.card-body -->
				</div>
			</div>
			</div>
			<!-- /.card -->

			<div class="col-md-8">
				<!-- Profile Image -->
				<div class="card card-yellow card-outline">
				<div class="card-body box-profile">
					<!-- /.card-header -->
					<div class="card-body"> 
					<div class="row">
            <div class="col-12">
                     <table id="example2" class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th>Petani</th>
                              <th>alamat</th>
                              <th>Tanggal Panen</th>
                              <th>Jumlah Panen Katak</th>
                              <th>Jumlah Panen Umbi</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($data_panen as $item)
                           <tr>
                           <td>{{$item->nama}}</td>
                           <td>{{$item->alamat}}</td>
                           <td>{{$item->tanggal}}</td>
                           <td>{{$item->katak}} kilo</td>
                           <td>{{$item->umbi}} kilo</td>
                        </tr>
                        @endforeach
                        </tbody>
                     </table>
         </div>
         <!-- /.row -->
					<!-- /.card-body -->
				</div>
			</div>
			<!-- About Me Box -->
			</div>
			</div>
			<!-- /.card -->
		</div>
	</div>
</section>

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
@endsection