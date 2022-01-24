

@extends('layout.master')

@section('header_kanan') 
<a class="btn btn-success btn-md float-right"  href="{{route('petani.daftar')}}" role="button">Kembali</a>
@endsection 

@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="card card-widget widget-user">
				<div class="widget-user-header bg-info" style="background: url('public/asset/dist/img/view.jpg') center center;"></div>
				<div class="widget-user-image">
					<img class="img-circle elevation-2" style="width: 110px;" src="{{ asset('public/storage/'.$petani->foto)}}" alt="User Avatar">
				</div>
				<div class="card-footer">
					<div class="row">


                  <!-- terima -->
						<div class="col-sm-6">
							<div class="description-block">
								<a class="btn btn-success terima" role="button">Terima</a>
								</td>
							</div>
						</div>
						<!-- end terima-->


						<!-- edit -->
						<div class="col-sm-6">
							<div class="description-block">
								<a class="btn btn-warning" href="{{route('edit.petani',$petani->id)}}" role="button">edit</a>
								</td>
							</div>
						</div>
                  <!-- end edit -->

					</div>
					<!-- /.row -->
				</div>
			</div>
			<!-- /.widget-user -->
		</div>
	</div>


	<div class="container-fluid">
		<div class="col-md-12">
			<div class="card card-widget widget-user">
				<div class="card-footer">
					<div class="row">

                  <!-- tanggal -->
						<div class="col-sm-2 border-right">
                     <div class="description-block">
                        <h5 class="description-header">Tanggal Daftar</h5>
								<span class="description-text"> {{\Carbon\Carbon::parse($petani->created_at)->isoFormat('L')}}</span>
							</div>
						</div>
                  <!-- end tanggal -->


						<!-- alamat -->
						<div class="col-sm-2 border-right">
                     <div class="description-block">
                        <h5 class="description-header">Alamat</h5>
								<span class="description-text">{{$petani->alamat?:$empty}}</span>
							</div>
						</div>
                  <!-- end alamat -->


						<!-- nama -->
						<div class="col-sm-4">
                     <div class="description-block">
                        <h5 class="description-header">Nama</h5>
								<span class="description-text">{{$petani->nama}}</span>
							</div>
						</div>
                  <!-- end nama -->

               
						<!-- email -->
						<div class="col-sm-2 border-left">
                     <div class="description-block">
                        <h5 class="description-header">Email</h5>
								<span class="description-text">{{$petani->email}}</span>
							</div>
						</div>
                  <!-- end email -->


						<!-- telepon -->
						<div class="col-sm-2 border-left">
                     <div class="description-block">
                        <h5 class="description-header">Telepon</h5>
								<span class="description-text">{{$petani->telepon?:$empty}}</span>
							</div>
						</div>
                  <!-- end telepon -->


					</div>
					<!-- /.row -->
				</div>
			</div>
		</div>
	</div>
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
   $('.terima').click(function(){
      swal({
      title: "Terima Petani?",
      text: "kamu akan mengonfirmasi petani. pastikan domisili sudah sesuai!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      })
      .then((willDelete) => {
      if (willDelete) {
         window.location = "{{ route('konfirmasiterima', $petani->id) }}"
         swal("Selamat! Petani diterima!", {
            icon: "success",
         });
      } else {
         swal("segera konfirmasi petani!");
      }
      });
   });
</script>
@endsection

