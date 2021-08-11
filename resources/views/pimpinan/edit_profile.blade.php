@extends('layout.master')
@section('content')
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md">
            <div class="card card-white">
               <div class="card-header ">
                  <h3 class="card-title">Perbaharui Info Anda</h3>
               </div>
               <div class="card-body">
                  <!-- Nama -->
                  <div class="form-group">
                     <label>Nama:</label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text "><i class="far fa-user"></i></span>
                        </div>
                        <input type="Text" class="form-control" id="exampleInputPassword1" placeholder="Nama">
                     </div>
                     <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                  <!-- Email -->
                  <div class="form-group">
                     <label>Email:</label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                     </div>
                     <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                  <!-- Password -->
                  <div class="form-group">
                     <label>Password:</label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                     </div>
                     <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                  <!-- Re Password -->
                  <div class="form-group">
                     <label>Re Password:</label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder=" Re Password">
                     </div>
                     <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                  <!-- phone mask -->
                  <div class="form-group ">
                     <label>Telepon:</label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="number" class="form-control" id="exampleInputPassword1" placeholder="088xxxxxxx">
                     </div>
                     <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                  <!-- IP mask -->
                  <div class="form-group">
                     <label>Alamat:</label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                        </div>
                        <input type="Text" class="form-control" id="exampleInputPassword1" placeholder="Alamat">
                        <!-- /.input group -->
                     </div>
                     <!-- /.form group -->
                     <div class="form-group col-md-4">
                        <label for="exampleInputFile">Unggah Foto</label>
                        <div class="input-group">
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" id="exampleInputFile">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                           </div>
                           <div class="input-group-append">
                              <span class="input-group-text">Upload</span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.form group -->
                  <div class="col-md-2 offset-md-5 text-center">
                     <!-- small box -->
                     <a href="#" class="text-light">
                        <div class="small-box bg-success">
                           <div class="inner">
                              Edit
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
@endsection

