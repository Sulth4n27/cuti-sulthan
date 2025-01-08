<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Cuti Pegawai</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

         {{-- <!-- User Management -->
         <li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Users</span>
            </a>
        </li> --}}

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Pegawai -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pegawai.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Pegawai</span>
        </a>
    </li>

    <!-- Nav Item - Cuti -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('cuti.index') }}">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>cuti</span>
        </a>
    </li>

        {{-- <!-- User Management -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('user.index') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>Data User</span>
            </a>
        </li> --}}

    <!-- Nav Item - Laporan -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('laporan.cuti') }}">
            <i class="fas fa-fw fa-file-pdf"></i>
            <span>laporan</span>
        </a>
    </li>


    <form method="POST" action="{{ route('logout') }}" class="nav-item">
        @csrf
        <button type="submit" class="nav-link btn btn-danger text-left">
            <i class="fas fa-sign-out-alt fa-fw"></i>
            Logout
        </button>
    </form>

</ul>
