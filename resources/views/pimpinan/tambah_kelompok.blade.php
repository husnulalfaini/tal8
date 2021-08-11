@extends('layout.master')
@section('content')
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-4 offset-md-4">
            <div class="card card-white">
               <div class="card-header ">
                  <h3 class="card-title-center">Tambah Kelompok</h3>
               </div>
               <div class="card-body">
                  <!-- Nama -->
                  <div class="form-group">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text "><i class="far fa-user"></i></span>
                        </div>
                        <input type="Text" class="form-control" id="exampleInputPassword1" placeholder="Nama Kelompok">
                     </div>
                     <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                  <!-- IP mask -->
                  <div class="form-group">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                        </div>
                        <input type="Text" class="form-control" id="exampleInputPassword1" placeholder="Alamat">
                        <!-- /.input group -->
                     </div>
                  </div>
                  <!-- /.form group -->
                  <div class=" text-center">
                     <!-- small box -->
                     <a href="#" class="text-light">
                        <div class="small-box bg-success">
                           <div class="inner">
                             Tambah
                           </div>
                        </div>
                     </a>
                  </div>
               </div>
               <!-- /.card-body -->
            </div>
            <!-- /.card -->
         </div>
      </div>
   </div>
</section>
<!-- /.content -->
<!-- jQuery -->
<script src="{{asset('public/asset/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/asset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

@endsection

