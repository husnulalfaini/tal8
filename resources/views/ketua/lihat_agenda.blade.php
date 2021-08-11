

@extends('layout.master')
@section('header')
Lihat Agenda
@endsection
@section('content')
<section class="content">
   <div class="container-fluid">
   <div class="row">
      <div class="col-md">
         <div class="card card-outline card-warning">
            <div class="card-header">
               <h3 class="card-title">Agenda Terbaru</h3>
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                  </button>
               </div>
               <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <div class="row">
                  <div class="col-sm-2">
                     <div class="description-block">
                        <div class="widget-user-image img-right" >
                           <img style="width: 100px; border-radius: 8px;" src="{{asset('public/asset/dist/img/menanam.jpg')}}" alt="User Avatar">
                        </div>
                     </div>
                     <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-9">
                     <div class="description-block">
                        <h5 class="description-header text-left">Menanam</h5>
                        <p class="text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam accusantium quasi, voluptatum at exercitationem qui impedit commodi architecto sit ex soluta delectus quia facere voluptas error ullam dolores sunt assumenda?</p>
                     </div>
                     <!-- /.description-block -->
                  </div>
               </div>
            </div>
            <!-- /.card-body -->
         </div>
         <!-- /.card -->
         <!-- /.col -->
      </div>
   </div>
   <div class="row">
      <div class="col-12">
         <div class="card card-outline card-warning">
            <div class="card-header">
               <h3 class="card-title">Lihat Agenda</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <table id="example2" class="table table-bordered table-hover">
                  <thead>
                     <tr>
                        <th>Agenda</th>
                        <th>Keterangan</th>
                        <th>Tanggal</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>Menanam</td>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel ducimus veniam fugit, laboriosam est necessitatibus ex dolorum laudantium, neque officiis quisquam ipsa non porro? Debitis non modi facere odit voluptatem.</td>
                        <td>14/02/2018</td>
                     </tr>
                     <tr>
                        <td>Menanam</td>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel ducimus veniam fugit, laboriosam est necessitatibus ex dolorum laudantium, neque officiis quisquam ipsa non porro? Debitis non modi facere odit voluptatem.</td>
                        <td>14/02/2018</td>
                     </tr>
                     <tr>
                        <td>Menanam</td>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel ducimus veniam fugit, laboriosam est necessitatibus ex dolorum laudantium, neque officiis quisquam ipsa non porro? Debitis non modi facere odit voluptatem.</td>
                        <td>14/02/2018</td>
                     </tr>
                     <tr>
                        <td>Menanam</td>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel ducimus veniam fugit, laboriosam est necessitatibus ex dolorum laudantium, neque officiis quisquam ipsa non porro? Debitis non modi facere odit voluptatem.</td>
                        <td>14/02/2018</td>
                     </tr>
                     <tr>
                        <td>Menanam</td>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel ducimus veniam fugit, laboriosam est necessitatibus ex dolorum laudantium, neque officiis quisquam ipsa non porro? Debitis non modi facere odit voluptatem.</td>
                        <td>14/02/2018</td>
                     </tr>
                     <tr>
                        <td>Menanam</td>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel ducimus veniam fugit, laboriosam est necessitatibus ex dolorum laudantium, neque officiis quisquam ipsa non porro? Debitis non modi facere odit voluptatem.</td>
                        <td>14/02/2018</td>
                     </tr>
                  </tbody>
                  <tfoot>
                     <tr>
                        <th>Agenda</th>
                        <th>Keterangan</th>
                        <th>Tanggal</th>
                     </tr>
                  </tfoot>
               </table>
            </div>
            <!-- /.card-body -->
         </div>
         <!-- /.card -->
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

