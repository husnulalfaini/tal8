@extends('layout.master')

@section('header_kiri')
   Daftar Kelompok
@endsection
@section('header_kanan')
<a class="btn btn-success btn-lg " href="#" role="button"><i class="fa fa-plus"></i></a>
@endsection

@section('content')
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
                                       <tbody>
                                          <tr>
                                             <td>1</td>
                                             <td>Tani Jaya</td>
                                             <td>Wongsorejo</td>
                                             <td><a href="#" class="text-dark"><i class="far fa-eye"></i></a>
                                                 <a href="#" class="text-dark"><i class="far fa-edit"></i></a>
                                                 <a href="#"  class="text-dark"><i class="fas fa-trash-alt"></i></a></td>
                                          </tr>
                                          <tr>
                                             <td>2</td>
                                             <td>Tani Jaya</td>
                                             <td>Wongsorejo</td>
                                             <td><a href="#" class="text-dark"><i class="far fa-eye"></i></a>
                                                 <a href="#" class="text-dark"><i class="far fa-edit"></i></a>
                                                 <a href="#"  class="text-dark"><i class="fas fa-trash-alt"></i></a></td>
                                          </tr>
                                          <tr>
                                             <td>3</td>
                                             <td>Tani Jaya</td>
                                             <td>Wongsorejo</td>
                                             <td><a href="#" class="text-dark"><i class="far fa-eye"></i></a>
                                                 <a href="#" class="text-dark"><i class="far fa-edit"></i></a>
                                                 <a href="#"  class="text-dark"><i class="fas fa-trash-alt"></i></a></td>
                                          </tr>
                                          <tr>
                                             <td>4</td>
                                             <td>Tani Jaya</td>
                                             <td>Wongsorejo</td>
                                             <td><a href="#" class="text-dark"><i class="far fa-eye"></i></a>
                                                 <a href="#" class="text-dark"><i class="far fa-edit"></i></a>
                                                 <a href="#"  class="text-dark"><i class="fas fa-trash-alt"></i></a></td>
                                          </tr>
                                          <tr>
                                             <td>5</td>
                                             <td>Tani Jaya</td>
                                             <td>Wongsorejo</td>
                                             <td><a href="#" class="text-dark"><i class="far fa-eye"></i></a>
                                                 <a href="#" class="text-dark"><i class="far fa-edit"></i></a>
                                                 <a href="#"  class="text-dark"><i class="fas fa-trash-alt"></i></a></td>
                                          </tr>
                                       </tbody>
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