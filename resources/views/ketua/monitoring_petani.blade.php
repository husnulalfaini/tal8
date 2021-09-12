@extends('layout.master') @section('header') Monitoring Petani @endsection @section('content')
<section class="content">
	<div class="container-fluid">
		<div class="col-md-12">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
				<!-- Add the bg color to the header using any of the bg-* classes -->
				<div class="widget-user-header bg-info" style="background: url('public/asset/dist/img/view.jpg') center center;"></div>
				<div class="widget-user-image">
					<img class="img-circle elevation-2" style="width: 110px;" src="{{asset('public/asset/dist/img/bambang.jpg')}}" alt="User Avatar">
				</div>
				<div class="card-footer">
					<div class="row"></div>
				</div>
				<!-- /.widget-user -->
			</div>
		</div>
		<div class="col-md-12">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
				<!-- Add the bg color to the header using any of the bg-* classes -->
				<div class="card-footer">
					<div class="row">
						<div class="col-sm-2 border-right">
							<div class="description-block">
								<h5 class="description-header">Kelompok Tani</h5>
								<span class="description-text">Tani Jaya</span>
							</div>
							<!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-2 border-right">
							<div class="description-block">
								<h5 class="description-header">Alamat</h5>
								<span class="description-text">{{$petani->alamat}}</span>
							</div>
							<!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4">
							<div class="description-block">
								<h5 class="description-header">Nama</h5>
								<span class="description-text">{{$petani->nama}}</span>
							</div>
							<!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-2 border-left">
							<div class="description-block">
								<h5 class="description-header">Email</h5>
								<span class="description-text">{{$petani->email}}</span>
							</div>
							<!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-2 border-left">
							<div class="description-block">
								<h5 class="description-header">Telepon</h5>
								<span class="description-text">{{$petani->telepon}}</span>
							</div>
							<!-- /.description-block -->
						</div>
					</div>
					<!-- /.row -->
				</div>
			</div>
			<!-- /.widget-user -->
		</div>
		<!-- /.content -->
		<!-- end informasi petani -->
		<!-- informasi lahan -->
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Detail Lahan</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<div class="row">
						<div class="col-sm-4 border-right">
							<div class="description-block">
								<h5 class="description-header">Luas Lahan</h5>
								<span class="description-text">{{$luas_lahan}}</span>
							</div>
							<!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4 border-right">
							<div class="description-block">
								<h5 class="description-header">Jumlah Lahan</h5>
								<span class="description-text">{{$jumlah_lahan}}</span>
							</div>
							<!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4 ">
							<div class="description-block">
								<h5 class="description-header">Total Panen</h5>
								<span class="description-text">{{$hasil}}</span>
							</div>
							<!-- /.description-block -->
						</div>
					</div>
					<!-- /.row -->
				</div>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- end informasi lahan -->


		<!-- tabel riwayat Panen -->
		<!-- jQuery -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Riwayat Panen</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Tanggal</th>
										<th>Jumlah Panen Katak</th>
										<th>Jumlah Panen Umbi</th>
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
            <!-- end riwayat panen -->

            <!-- info lahan -->
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Lahan</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example3" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>lahan</th>
										<th>luas</th>
										<th></th>
									</tr>
								</thead>
								<tbody>@foreach ($lahan as $item)
									<tr>
										<td>{{$item->id}}</td>
										<td>{{$item->luas_lahan}}</td>
                              <td><a href="{{route('ketua.monitoring_lahan',[$item->id])}}" class="text-dark"><i class=" fas fa-eye"></i></a>
                                                 <a href="#"  class="text-dark"><i class="far fa-edit"></i></a></td>
									</tr>@endforeach
                                </tbody>
								<tfoot>
                           <tr>
										<th>lahan</th>
										<th>luas</th>
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
	     "searching": true,
	     "ordering": true,
	     "info": true,
	     "autoWidth": false,
	     "responsive": true,
	   });
	
   $('#example3').DataTable({
	     "paging": true,
	     "lengthChange": false,
	     "searching": true,
	     "ordering": true,
	     "info": true,
	     "autoWidth": false,
	     "responsive": true,
	   });
</script>@endsection