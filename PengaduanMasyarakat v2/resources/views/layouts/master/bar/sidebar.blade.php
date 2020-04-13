<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
    <img src="/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <i class="nav-icon fas frame-comment"></i>
    <span class="brand-text font-weight-light">Complainesia</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview menu-open">
            <a href="{{ route('home') }}" class="nav-link active bg-info">
            <i class="nav-icon fas fa-home"></i>
            <p>
                Home
            </p>
            </a>
        </li>
        @hasrole('petugas')
        <li class="nav-item">
            <a href="" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
                Profile
            </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('petugas.pengaduan.index') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
                Data Aduan
            </p>
            </a>
        </li>
        @endhasrole
        @hasrole('admin')
        <li class="nav-item">
            <a href="{{ route('admin.profil.index') }}" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
                Profil
            </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.pengaduan.index') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
                Data Aduan
            </p>
            </a>
        </li>
        @endhasrole
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>