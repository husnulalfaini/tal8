@extends('layout.master') @section('content')
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<!-- Profile Image -->
				<div class="card card-yellow card-outline">
					<div class="card-body box-profile">
						<div class="text-center">
							<img class="profile-user-img img-fluid img-circle" style="width: 110px;" src="{{ asset('public/storage/'.$user->foto)}}" alt="Belum ada foto">
						</div>						
                        <h3 class="profile-username text-center">{{$user->name}}</h3>
                        <p class="text-muted text-center">{{$user->level}}</p>
					<!-- /.card-header -->
					<div class="card-body"> 
						<hr> <strong><i class="fas fa-envelope mr-1"></i>Email</strong>
						<p class="text-muted">{{$user->email}}</p>
						<hr> <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
						<p class="text-muted">{{$user->alamat}}</p>
						<hr> <strong><i class="fas fa-phone-alt mr-1"></i> Telepon</strong>
						<br>
						<a class="text-muted">{{$user->telepon}}</a>
					<!-- /.card-body -->
				</div>
			<!-- /.card -->
			<!-- About Me Box -->
			
		</div>
	</div>
</section>
@endsection