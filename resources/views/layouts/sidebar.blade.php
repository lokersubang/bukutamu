<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-fw fa-address-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Buku Tamu</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @auth
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-home"></i>
                <span>Dashboard</span></a>
        </li>
    @else
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-book"></i>
                <span>Buku Tamu</span></a>
        </li>
    @endauth



    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    @auth
        <div class="sidebar-heading">
            Menu
        </div>
        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('buku.index') }}">
                <i class="fas fa-fw fa-address-book"></i>
                <span>Data Buku Tamu</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('profile.edit') }}">
                <i class="fas fa-fw  fa-user"></i>
                <span>Profile</span></a>
        </li>
    @else
        <div class="sidebar-heading">
            Informasi
        </div>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('about') }}">
                <i class="fas fa-fw fa-info"></i>
                <span>About</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('contact') }}">
                <i class="fas fa-fw fa-phone"></i>
                <span>Contact</span></a>
        </li>
    @endauth




    <!-- Nav Item - Tables -->


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
