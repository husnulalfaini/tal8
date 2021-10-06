@extends('layout.master')

@section('header')
    konfirmasi Petani
@endsection

@section('content')
<section class="content">
<div class="container-fluid">
                  <section class="content">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-12">
                              <div class="card">
                                 

                        @if (session()->get('sukses'))
                            <div class="alert alert-success">
                                {{session()->get('sukses')}}
                            </div>
                        @endif
                        
                                 <div class="card-header">
                                    <h3 class="card-title">Petani Mendaftar</h3>
                                 </div>
                                 <!-- /.card-header -->
                                 <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                       <thead>
                                          <tr>
                                             <th>Nama</th>
                                             <th>Alamat</th>
                                             <th>Email</th>
                                             <th>Telepon</th>
                                             <th>aksi</th>
                                          </tr>
                                       </thead>
                                       <tbody> @foreach ($petani as $tani)
                                          <tr>
                                             <td>{{$tani->nama}}</td>
                                             <td>{{$tani->alamat}}</td>
                                             <td>{{$tani->email}}</td>
                                             <td>{{$tani->telepon}}</td>
                                             <td> 
                                                <span class="badge bg-success"><a href="{{route('ketua.konfirmasi_petani',[$tani->id])}}" class="text-dark"> Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a></span>
                                                <span class="badge bg-danger" ><a href="{{route('ketua.hapus',[$tani->id])}}">Hapus</a></span>
                                             </td>
                                          </tr>
                                       </tbody>@endforeach
                                       <tfoot> 
                                          <tr>
                                             <th>Nama</th>
                                             <th>Alamat</th>
                                             <th>Email</th>
                                             <th>Telepon</th>
                                             <th>aksi</th>
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
                     </div>
                     <!-- /.container-fluid -->
                     </section>
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