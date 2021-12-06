@extends('layout.master') 

@section('content') 
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <div class="card card-white">
          <div class="card-header ">
            <h3 class="card-title-center">Edit Kelompok</h3>
          </div>
          <form action="{{route('update.petani',$petani->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
            {{ csrf_field() }}
            <div class="card-body">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-user-alt"></i>
                    </span>
                  </div>
                  <select id="kelompok_id" class="form-control text-darker" name="kelompok_id" required autocomplete="kelompok_id" autofocus> @foreach ($kelompok as $item) <option class="text-darker" value="{{ $item->id }}">{{ $item->nama }}</option> @endforeach </select>
                  <!-- /.input group -->
                </div>
              </div>
              <!-- /.form group -->
              <div class="col-md-4 mx-auto text-center">
                <!-- small box -->
                <button type="submit" class="btn btn-success btn-block"> Edit</button>
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