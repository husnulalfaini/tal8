@extends('layout.master') 
@section('content')

@section('header_kanan')
<a class="btn btn-success btn-md float-right" data-toggle="modal" data-target="#tambah_stok" role="button">Tambah Stok</a>
@endsection 

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-yellow card-outline">
					<div class="card-body box-profile">
						<div class="card-body">

							<div class="row">
								<div class="col-12">
									<table id="example1" class="table table-bordered table-hover">
										<thead>
											<tr>
												<th>no</th>
												<th>Stok katak</th>
												<th>Stok Umbi</th>
												<th>Harga Katak</th>
												<th>harga Umbi</th>
											</tr>
										</thead> @foreach ($bibit as $item) 
                              <tbody>
											<tr>
												<td>{{$item->id?:'0'}}</td>
												<td>{{$item->stok_katak?:'0'}} kilo</td>
												<td>{{$item->stok_umbi?:'0'}} kilo</td>
												<td>Rp.{{$item->harga_katak?:'0'}} ,-</td>
												<td>Rp.{{$item->harga_umbi?:'0'}} ,-</td>
											</tr>
										</tbody> 
                              @endforeach
									</table>
								</div>
								<!-- /.row -->
								<!-- /.card-body -->
							</div>
						</div>
					</div>
				</div>
				<!-- /.card -->
			</div>
		</div>


		<div class="row">
			<div class="col-md-12">
				<div class="card card-yellow card-outline">
					<div class="card-body box-profile">
						<!-- /.card-header -->
						<div class="card-body">
							<div class="row">
								<div class="col-12">
									<table id="example2" class="table table-bordered table-hover">
										<thead>
											<tr>
												<th>No</th>
												<th>Jumlah Katak</th>
												<th>Jumlah Umbi</th>
												<th>Harga beli Katak</th>
												<th>Harga beli Umbi</th>
												<th>Supplier</th>
												<th>Tanggal beli</th>
											</tr>
										</thead> @foreach ($tambah as $item) <tbody>
											<tr>
												<td>{{$item->id}}</td>
												<td>{{$item->stok_katak?:'-'}} kilo</td>
												<td>{{$item->stok_umbi?:'-'}} kilo</td>
												<td>Rp.{{$item->harga_katak?:'-'}} ,-</td>
												<td>Rp.{{$item->harga_umbi?:'-'}} ,-</td>
												<td>{{$item->supplier}}</td>
												<td>{{$item->created_at}}</td>
											</tr>
										</tbody> @endforeach
									</table>
								</div>
								<!-- /.row -->
								<!-- /.card-body -->
							</div>
						</div>
					</div>
				</div>
				<!-- /.card -->
			</div>
		</div>
</section>


<!-- Modal Tambah Stok-->
<div class="modal fade" id="tambah_stok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Stok Baru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="{{route('tambah_stok')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
					{{ csrf_field() }}
					<div class="card-body">
						<!-- katak -->
						<div class="form-group">
							<label for="">Stok katak</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text ">
										<i class="far fa-user"></i>
									</span>
								</div>
								<input type="text" class="form-control" id="text-input" name="stok_katak" placeholder="stok_katak" value="0">
							</div>
						</div>
						<!-- end katak -->

						<!-- umbi -->
						<div class="form-group">
							<label for="">Stok Umbi</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text ">
										<i class="far fa-user"></i>
									</span>
								</div>
								<input type="text" class="form-control" id="text-input" name="stok_umbi" placeholder="stok_umbi" value="0">
							</div>
						</div>
						<!-- end umbi -->

						<!-- harga umbi -->
						<div class="form-group">
							<label for="">harga katak</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="fas fa-envelope"></i>
									</span>
								</div>
								<input type="text" class="form-control" id="text-input" name="harga_katak" placeholder="harga_katak" value="0">
							</div>
						</div>
						<!-- end harga umbi -->

						<!-- harga katak -->
						<div class="form-group">
							<label for="">Harga Umbi</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="fas fa-envelope"></i>
									</span>
								</div>
								<input type="text" class="form-control" id="text-input" name="harga_umbi" placeholder="harga_umbi" value="0">
							</div>
						</div>
						<!-- end harga katak -->

						<!-- supllier -->
						<div class="form-group">
							<label for="">Supplier</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="fas fa-phone"></i>
									</span>
								</div>
								<input type="text" class="form-control" id="text-input" name="supplier" placeholder="supplier" required autocomplete="isi telepon">
							</div>
						</div>
						<!-- end supllier -->


						<!-- Tambah stok -->
						<div class="col-md-4 mx-auto text-center">
							<button type="submit" class="btn btn-success btn-block">Tambah Stok</button>
						</div>
					</div>
					<!-- /.card-body -->
			</div>
			<!-- /.card -->
			</form>
		</div>
	</div>
</div>
<!-- END Modal Tambah Stok -->


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
	$('#example1').DataTable({
		"paging": false,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": false,
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
</script> @endsection