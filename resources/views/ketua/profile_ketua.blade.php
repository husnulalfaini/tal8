@extends('layout.master')

@section('content') 
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-5">
        <!-- Profile Image -->
        <div class="card card-success card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" style="width: 110px;" src="{{ asset('public/storage/'.Auth::user()->foto)}}" alt="Belum ada foto">
            </div>
            <form action="{{route('updateFoto.profile_ketua', Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                  <div class="form-group col-md-12">
                      <label for="exampleInputFile">Unggah Foto</label>
                      <div class="input-group">
                        <div class="custom-file">
                            <input id="foto" type="file" class="form-control-file" name="foto" onchange="readURL(this);" autocomplete="foto">
                        </div>
                        <div class="col-md-4  text-center">
                            <button type="submit" class="btn btn-warning btn-block"> Update Foto </button>
                        </div>
                      </div>
                  </div>
            </form>
                     <!-- /.form group -->

            <!-- /.card-header -->
            <div class="card-body">
              <strong>
                <i class="fas fa-user mr-1"></i> Nama </strong>
              <p class="text-muted">{{ Auth::user()->name }}</p>
              <hr>
              <strong>
                <i class="fas fa-envelope mr-1"></i>Email </strong>
              <p class="text-muted">{{ Auth::user()->email }}</p>
              <hr>
              <strong>
                <i class="fas fa-briefcase mr-1"></i>Jabatan </strong>
              <p class="text-muted">{{ Auth::user()->level }}</p>
              <hr>
              <strong>
                <i class="fas fa-users mr-1"></i> Wilayah Kelompok </strong>
              <p class="text-muted">Giri</p>
              <hr>
              <strong>
                <i class="fas fa-map-marker-alt mr-1"></i> Alamat </strong>
              <p class="text-muted">{{ Auth::user()->alamat?:'-- Data Tidak Ditemukan --' }}</p>
              <hr>
              <strong>
                <i class="fas fa-phone-alt mr-1"></i> Telepon </strong>
              <br>
              <a class="text-muted">{{ Auth::user()->telepon?:'-- Data Tidak Ditemukan --' }}</a>
            </div>
            <!-- /.card-body -->
            <!-- /.card -->
          </div>
          <!-- /.card-body -->
        </div>
      </div>
      <!-- /.card -->

      <!-- About Me Box -->
      <div class="col-md-7">
        <div class="card card-success">
          <div class="card-header ">
            <h3 class="card-title">Perbaharui Info Anda</h3>
          </div>
          <div class="card-body">
            <form action="{{route('update.profile', Auth::user()->id)}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <!-- Nama -->
              <div class="form-group">
                <label>Nama:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text ">
                      <i class="far fa-user"></i>
                    </span>
                  </div>
                  <input type="Text" class="form-control" name="name" id="name" value="{{ Auth::user()->name }}" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <!-- Email -->
              <div class="form-group">
                <label>Email:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-envelope"></i>
                    </span>
                  </div>
                  <input type="email" class="form-control" name="email" id="email" value="{{ Auth::user()->email }}">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <!-- Password -->
              <div class="form-group">
                <label>Password:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-lock"></i>
                    </span>
                  </div>
                  <input type="password" class="form-control" name="password" id="password" value="{{ Auth::user()->password }}">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <!-- Re Password -->
              <div class="form-group ">
                <label>Telepon:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-phone"></i>
                    </span>
                  </div>
                  <input type="number" class="form-control" name="telepon" id="telepon" value="{{ Auth::user()->telepon }}">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <!-- IP mask -->
              <div class="form-group">
                        <label>Alamat:</label>
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <span class="input-group-text">
                                 <i class="fas fa-map-marker-alt"></i>
                              </span>
                           </div>
                           <input type="Text" class="form-control" name="alamat" id="alamat" value="{{ Auth::user()->alamat }}">
                           <!-- /.input group -->
                        </div>
                     </div>
                        <!-- /.form group -->
                     <div class="col-md-4 mx-auto text-center">
                        <!-- small box -->
                        <button type="submit" class="btn btn-warning btn-block"> Update</button>
                     </div>
               </div>
               <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </form>
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