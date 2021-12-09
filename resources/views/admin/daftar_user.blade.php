@extends('layout.master') 

@section('header_kiri') 
Data User 
@endsection 

@section('header_kanan') 
<a class="btn btn-success btn-lg " href="#" role="button">
   <i class="fa fa-plus"></i>
</a> 
@endsection 

@section('content') 
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header card-tools">
                  <ul class="nav nav-pills mr-auto">
                     <li class="nav-item">
                        <a class="nav-link active" href="#user" data-toggle="tab">User</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#petani" data-toggle="tab">Petani</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#kelompok" data-toggle="tab">Kelompok</a>
                     </li>
                  </ul>
               </div>
               <!-- /.card-header -->

               <div class="card-body">
                  <div class="tab-content p-0">
                     <!-- Morris chart - Sales -->

                     <!-- Seluruh User -->
                     <div class="chart tab-pane success" id="user" style="position: relative;">
                        <table id="example1" class="table table-bordered table-hover">
                           <thead>
                              <tr>
                                 <th>No</th>
                                 <th>Nama</th>
                                 <th>Alamat</th>
                                 <th>jabatan</th>
                                 <th></th>
                              </tr>
                           </thead>

                           @php 
                           $no=1; 
                           @endphp

                           <tbody> 
                              @foreach ($user as $item) 
                              <tr>
                                 <td>{{$no++}}</td>
                                 <td>{{$item->name}}</td>
                                 <td>{{$item->alamat}}</td>
                                 <td>{{$item->level}}</td>
                                 <td>
                                    <a href="{{route('show_user',[$item->id])}}" class="text-dark">
                                       <i class="far fa-eye"></i>
                                    </a>
                              </tr> 
                              @endforeach 
                           </tbody>
                           <tfoot>
                              <tr>
                                 <th>No</th>
                                 <th>Nama</th>
                                 <th>Alamat</th>
                                 <th>jabatan</th>
                                 <th></th>
                              </tr>
                           </tfoot>
                        </table>
                     </div>
                     <!-- END Seluruh User -->

                     <!-- Seluruh Petani -->
                     <div class="chart tab-pane" id="petani" style="position: relative;">
                        <table id="example2" class="table table-bordered table-hover">
                           <thead>

                              @php 
                              $num=1; 
                              @endphp
                              
                              <tr>
                                 <th>No</th>
                                 <th>Nama</th>
                                 <th>Alamat</th>
                                 <th>Kelompok</th>
                                 <th></th>
                              </tr>
                           </thead>
                           <tbody> 

                              @foreach ($petani as $item) 
                              <tr>
                                 <td>{{$num++}}</td>
                                 <td>{{$item->nama}}</td>
                                 <td>{{$item->alamat}}</td>
                                 <td>{{$item->kelompok->nama}}</td>
                                 <td>
                                    <span class="badge bg-success">
                                       <a href="{{route('show_petani',[$item->id])}}" class="text-dark">Detail <i class="far fa-eye"></i>
                                       </a>
                                    </span>
                                    <span class="badge bg-danger">
                                       <a href="{{route('cetak_petani',[$item->id])}}" class="text-dark"> Cetak Rekap <i class="fas fa-save"></i>
                                       </a>
                                    </span>
                                 </td>
                              </tr> 
                              @endforeach

                           </tbody>
                           <tfoot>
                              <tr>
                                 <th>No</th>
                                 <th>Nama Kelompok</th>
                                 <th>Alamat</th>
                                 <th>Kelompok</th>
                                 <th></th>
                              </tr>
                           </tfoot>
                        </table>
                     </div>
                     <!-- END Seluruh Petani -->

                     <!-- Seluruh Kelompok -->
                     <div class="chart tab-pane" id="kelompok" style="position: relative;">
                        <table id="example3" class="table table-bordered table-hover">
                           <thead>
                              <tr>
                                 <th>No</th>
                                 <th>Kelompok</th>
                                 <th>Alamat</th>
                                 <th></th>
                              </tr>
                           </thead>
                           <tbody> 
                              @php 
                              $ang=1; 
                              @endphp 

                              @foreach ($kelompok as $item) 
                              <tr>
                                 <td>{{$ang++}}</td>
                                 <td>{{$item->nama}}</td>
                                 <td>{{$item->alamat}}</td>
                                 <td>
                                    <span class="badge bg-success">
                                       <a href="{{route('show_kelompok',[$item->id])}}" class="text-dark">Detail <i class="far fa-eye"></i>
                                       </a>
                                    </span>
                                    <span class="badge bg-danger">
                                       <a href="{{route('cetak_kelompok',[$item->id])}}" class="text-dark"> Cetak Rekap <i class="fas fa-save"></i>
                                       </a>
                                    </span>
                                 </td>
                              </tr> 
                              @endforeach 
                              
                           </tbody>
                           <tfoot>
                              <tr>
                                 <th>No</th>
                                 <th>Kelompok</th>
                                 <th>Alamat</th>
                                 <th></th>
                              </tr>
                           </tfoot>
                        </table>
                     </div>
                     <!-- END Seluruh Kelompok -->
                  </div>
               </div>
               <!-- /.card-body -->
            </div>
            <!-- /.card -->
         </div>
         <!-- /.card -->
      </div>
      <!-- /.col -->
   </div>
   <!-- /.row -->
   <!-- /.container-fluid -->
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
   $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "buttons": ["csv", "excel", "pdf", "print"]
   }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
   $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "buttons": ["csv", "excel", "pdf", "print"]
   }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
   $('#example3').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "buttons": ["csv", "excel", "pdf", "print"]
   }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
</script>
@include('sweetalert::alert')
 @endsection