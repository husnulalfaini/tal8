<!DOCTYPE html>
<html lang="en">
   <head>
      @include('master_layout.top')
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
         <!-- Navbar -->
         @include('master_layout.header')
         <!-- /.navbar -->
         <!-- Main Sidebar Container -->
         @include('pimpinan.layout.sidebar')
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-11">
                        <h1 class="m-0">@yield('header_kiri')</h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-1">
                        <div class="center">@yield('header_kanan')
                        </div>
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->
               </div>
               <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            @yield('content_pimpinan')
            <!-- right col -->
            </div>
            <!-- /.row (main row) -->
         </div>
         <!-- /.container-fluid -->
         <!-- </section> -->
         <!-- /.content -->
        @include('master_layout.footer')
      </div>
      <!-- /.Bottom -->
      @include('master_layout.bottom')
      <!-- /.Bottom -->
      
   </body>
</html>

