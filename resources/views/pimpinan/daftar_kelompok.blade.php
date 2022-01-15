@extends('layout.master')

@section('header_kiri') 
Daftar Kelompok 
@endsection 

@section('header_kanan')

<a class="btn btn-success btn-md float-right"  href="{{route('tambah_ketua')}}" role="button">Tambah Kelompok</a>
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
									<td>{{$item->alamat?:$empty}}</td>
									<td>
										<span class="badge bg-success"><a href="{{route('detail.kelompok',[$item->id])}}" class="text-dark">Detail<i class="far fa-eye"></i></a></span>
										<span class="badge bg-danger"><a href="{{route('kelompok.pdf',[$item->id])}}" class="text-dark"> Cetak Rekap <i class="fas fa-save"></i></a></span>       
										<span class="badge bg-warning"><a href="{{route('edit.kelompok',[$item->id])}}" class="text-dark"> Edit <i class="fas fa-edit"></i></a></span>       
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
@endsection