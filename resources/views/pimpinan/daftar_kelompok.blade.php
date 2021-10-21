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
									<td><a href="{{route('detail.kelompok',[$item->id])}}" class="text-dark"><i class="far fa-eye"></i></a>
										<a href="{{route('edit.kelompok',[$item->id])}}" class="text-dark"><i class="far fa-edit"></i></a>
										<a href="#" class="text-dark"><i class="fas fa-trash-alt"></i></a>
									</td>
								</tr>@endforeach</tbody>
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
								<input type="Text" class="form-control" id="text-input" name="nama" placeholder="Nama Kelompok">
							</div>
							<!-- /.input group -->
						</div>
						<!-- /.form group -->
						<!-- IP mask -->
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
								</div>
								<input type="Text" class="form-control" id="text-input" name="alamat" placeholder="Alamat">
								<!-- /.input group -->
							</div>
						</div>
						<!-- /.form group -->
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
								</div>
								<select id="user_id" class="form-control text-darker" name="user_id" required autocomplete="user_id" autofocus>
									@foreach ($ketua as $item)
									<option class="text-darker" value="{{ $item->id }}">{{ $item->nama }}</option>
									@endforeach</select>
								<!-- /.input group -->
							</div>
						</div>
						<!-- /.form group -->
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