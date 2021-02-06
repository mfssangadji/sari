<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <div class="" style="padding: 10px;">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="">
               <a href="{{route('dashboard')}}" class="nav-link active" style="background-color: #17a2b8">
                  <i class="nav-icon fas fa-user" style="float: right; margin-top: 5px"></i>
                  <p>
                  <span class="left badge badge-danger" style="margin-top: 5px;">Cpanel</span> <span>Dashboard</span> 
                  </p>
               </a>
             </li>
         </ul>
      </div>
   <!-- Sidebar -->
   <div class="sidebar" style="margin-top: 0px !important">
      <!-- Sidebar user panel (optional) -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            @if(auth()->user()->status == 1)
               <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                     <i class="nav-icon fas fa-th"></i>
                     <p>
                        Pengaturan
                        <i class="fas fa-angle-left right"></i>
                     </p>
                  </a>
                  <ul class="nav nav-treeview">
                     <li class="nav-item has-treeview">
                        <a href="{{route('users')}}" class="nav-link">
                           <i class="fa fa-circle nav-icon text-blue"></i>
                           <p>Pengguna</p>
                        </a>
                     </li>
                  </ul>
                  <ul class="nav nav-treeview">
                     <li class="nav-item has-treeview">
                        <a href="{{route('reklame')}}" class="nav-link">
                           <i class="fa fa-circle nav-icon text-green"></i>
                           <p>Data Reklame</p>
                        </a>
                     </li>
                  </ul>
                  <ul class="nav nav-treeview">
                     <li class="nav-item has-treeview">
                        <a href="{{route('titik')}}" class="nav-link">
                           <i class="fa fa-circle nav-icon text-red"></i>
                           <p>Titik Lokasi</p>
                        </a>
                     </li>
                  </ul>
               </li>
            @endif
            <li class="nav-item has-treeview">
               <a href="{{route('customer')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-yellow"></i>
                  <p>Data Customer</p>
               </a>
            </li>
            <li class="nav-item has-treeview">
               <a href="{{route('pemesanan')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-purple"></i>
                  <p>Review Pemesanan</p>
               </a>
            </li>
            <li class="nav-item has-treeview">
               <a href="{{route('pelaporan')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-red"></i>
                  <p>Pelaporan</p>
               </a>
            </li>
            <li class="nav-header">LAINNYA</li>
            <li class="nav-item">
               <a href="{{route('logout')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-info"></i>
                  <p class="text">Logout ({{auth()->user()->nama_lengkap}})</p>
               </a>
            </li>
            
         </ul>
      </nav>
      <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
</aside>