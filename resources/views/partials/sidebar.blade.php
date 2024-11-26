<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-user"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Cuti Pegawai</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">Menu</div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('pegawai.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Pegawai</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('cuti.index') }}">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Cuti</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('laporan.index') }}">
            <i class="fas fa-fw fa-file"></i>
            <span>Laporan</span>
        </a>
    </li>
</ul>
