@extends('layout.master')

@section('header')
Lihat Agenda
@endsection

@section('content')
<section class="content">
   <div class="container-fluid">

   <div class="row">
      <div class="col-12">
         <div class="card card-outline card-warning">
            <div class="card-header">
               <h3 class="card-title">Riwayat Pesanan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <table id="example2" class="table table-bordered table-hover">
                  <thead>
                     <tr>
                        <th>no</th>
                        <th>Petani</th>
                        <th>Kelompok</th>
                        <th>Jumlah pesan</th>
                        <th>Jenis</th>
                        <th>Harga</th>
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
                        <td>{{$item->petani->kelompok->nama}}</td>
                        <td>{{$item->stok}} kilo</td>
                        <td>{{$item->bibit->jenis}}</td>
                        <td>Rp.{{$item->harga}} ,-</td>
                        <td>{{$item->total_bayar}} Ribu</td>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- js dari data table -->
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
         window.location = "{{route('batal_pesan',$item->id)}}"
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

