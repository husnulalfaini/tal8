<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
  <a class="brand-link">
    <img src="{{asset('public/asset/dist/img/API.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">PT. API Banyuwangi</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('public/storage/'.Auth::user()->foto)}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info"> 
         @if(auth()->user()->level=="admin") 
            <a href="{{url('/profile_admin')}}" class="d-block">{{ Auth::user()->name }}</a>
         @elseif (auth()->user()->level=="pimpinan") 
            <a href="{{url('/profile_pimpinan')}}" class="d-block">{{ Auth::user()->name }}</a> 
         @else <a href="{{url('/profile_ketua')}}" class="d-block">{{ Auth::user()->name }}</a> 
         @endif 
      </div>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library --> 
      @if(auth()->user()->level=="admin") 
      <li class="nav-item">
          <a href="{{url('/daftar_user')}}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p> Data User </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('/tambah_user')}}" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p> Tambah User </p>
          </a>
        </li>
        <li class="nav-item   menu-is-opening menu-open">
            <a class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Bibit
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: block;">
              <li class="nav-item">
                <a href="{{route('daftar_stok')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stok Bibit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('pesanan')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Penjualan</p>
                </a>
              </li>
            </ul>
          </li> 

        @elseif (auth()->user()->level=="pimpinan") 
        <li class="nav-item">
          <a href="{{url('/dashboard_pimpinan')}}" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p> Beranda </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('/daftar_kelompok')}}" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p> Daftar Kelompok </p>
          </a>
        </li>

        @else 
        <li class="nav-item">
          <a href="{{url('/dashboard_ketua')}}" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p> Beranda </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('/konfirmasi')}}" class="nav-link">
            <i class="nav-icon fas fa-bell"></i>
            <p> Konfirmasi </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('/daftar_petani')}}" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p> Daftar Petani </p>
          </a>
        </li> 
        @endif
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>