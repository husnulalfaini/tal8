@extends('layout.master') 
@section('content')
 <section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="card card-yellow card-outline">
               <div class="card-body box-profile">
                  <div class="card-body">

                     <div class="row">
                        <div class="col-12">
                           <table id="example2" class="table table-bordered table-hover">
                              <thead>
                                 <tr>
                                    <th>no</th>
                                    <th>Petani</th>
                                    <th>Pesan Katak</th>
                                    <th>Pesan Umbi</th>
                                    <th>Harga Katak</th>
                                    <th>Harga Umbi</th>
                                    <th>Total Bayar</th>
                                    <th>Catatan</th>
                                    <th>tanggal pesanan</th>
                                    <th>status</th>
                                    <th>aksi</th>
                                 </tr>
                              </thead>
                              @foreach ($pesanan as $item)
                              <tbody>
                                 <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->petani->nama}}</td>
                                    <td>{{$item->stok_katak?:'-'}} kilo</td>
                                    <td>{{$item->stok_umbi?:'-'}} kilo</td>
                                    <td>Rp.{{$item->harga_katak?:'-'}} ,-</td>
                                    <td>Rp.{{$item->harga_umbi?:'-'}} ,-</td>
                                    <td>Rp.{{$item->total_bayar}} ,-</td>
                                    <td>{{$item->catatan}}</td>
                                    <td>{{$item->created_at}}</td>

                                    <?php 
                                       $status = $item->status;
                                    ?>


                                    @if ($status==0) 
                                       <td>Belum Lunas
                                          <a class="badge bg-warning konfirmasi"  data-id="{{$item->id}}" data-nama="{{$item->petani->nama}}" role="button">Konfirmasi</a></td>
                                       <td><a class="badge bg-danger delete" data-id="{{$item->id}}" data-nama="{{$item->petani->nama}}"  role="button">Batalkan</a></td>
                                       
                                    @else 
                                    
                                       <td>Lunas</td>
                                       <td> <span class="badge bg-success">
                                          <a href="{{route('cetak_invoice',[$item->id])}}" class="text-dark">Invoice <i class="fas fa-save"></i>
                                          </a>
                                       </td>
                                    @endif
                                 </tr>
                              </tbody>
                              @endforeach
                           </table>
                        </div>
                        <!-- /.row -->
                        <!-- /.card-body -->
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.card -->
         </div>
      </div>
</section>


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
      "buttons": ["csv", "excel", "pdf", "print"]
   }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
</script> 
<script>
   $('.konfirmasi').click(function(){
      var nama=$(this).attr('data-nama');
      var id=$(this).attr('data-id');
      swal({
      title: "Apakah Status Setuju Dirubah?",
      text: "kamu akan mengonfirmasi transaksi. pastikan "+nama+" sudah menyelesaikan transaksi!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      })
      .then((willDelete) => {
      if (willDelete) {
         window.location = "{{route('update_status',$item->id)}}"
         swal("Selamat! Status transaksi berhasil dirubah!", {
            icon: "success",
         });
      } else {
         swal("data transaksi tetap aman!");
      }
      });
   });
</script>
<script>
   $('.delete').click(function(){
      var nama=$(this).attr('data-nama');
      var id=$(this).attr('data-id');
      swal({
      title: "Yakin Membatalkan Pesan?",
      text: "kamu akan membatalkan transaksi dari "+nama+" !",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      })
      .then((willDelete) => {
      if (willDelete) {
         window.location = "{{route('batal_pesan',$item->id)}}";
         swal("Selamat! Transaksi telah dibatalkan!", {
            icon: "success",
         });
      } else {
         swal("data transaksi tetap aman!");
      }
      });
   });
</script>
@endsection