<nav class="main-header navbar navbar-expand navbar-success navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
               </li>
            </ul>
            <ul class="navbar-nav">
               <!-- <li class="breadcrumb-item text-light">Beranda</li>
               <li class="breadcrumb-item active">Dashboard v1</li> -->
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                  <a class="nav-link" href="{{ route('logout')}}">
                  <i class="fas fa-sign-out-alt" ></i>
                  <form id="logout-form" action="#" method="POST" class="d-none">
                      @csrf
                 </form>
                  </a>
            </ul>
         </nav>