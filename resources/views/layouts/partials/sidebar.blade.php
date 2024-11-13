<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src= alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Sekolah</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src={{ asset('storage/images/pengguna/pengguna.png') }} class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">User</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/guru" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Guru</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/siswa" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Siswa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/jadwal" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Jadwal</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/kelas" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Kelas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/mapel" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Mata Pelajaran</p>
                    </a>
                </li>


                {{-- <li class="nav-item {{ request()->is('users') || request()->is('roles') || request()->is('roles/create') || request()->is('roles/*/edit') || request()->is('users/create') || request()->is('users/*/edit') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->is('users') || request()->is('roles') || request()->is('roles/create') || request()->is('roles/*/edit') || request()->is('users/create') || request()->is('users/*/edit') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Pengguna
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/roles" class="nav-link {{ request()->is('roles') || request()->is('roles/create') || request()->is('roles/*/edit') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/users" class="nav-link {{ request()->is('users') || request()->is('users/create') || request()->is('users/*/edit') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengguna</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}

                <li class="nav-header">MAIN MENU</li>




            </ul>
        </nav>

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

