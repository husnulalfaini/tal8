@extends('layout.master')
@section('content')
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-6 offset-md-4">
            <div class="card card-white">
               <div class="card-header ">
                  <h3 class="card-title-center">Tambah Kelompok</h3>
               </div>
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
</section>
<!-- /.content -->
<!-- jQuery -->
<script src="{{asset('public/asset/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/asset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

@endsection

