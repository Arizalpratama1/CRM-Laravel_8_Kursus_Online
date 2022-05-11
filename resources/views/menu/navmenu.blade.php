<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

    <li class=" nav-item"><a class="d-flex align-items-center" href="index.html"><i data-feather="home"></i></i><span class="menu-title text-truncate" data-i18n="Dashboards">DASHBOARD</span></a>
        <ul class="menu-content">
            <li class="{{ (request()->is('home*')) ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ url('/home') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">Index</span></a>
            </li>
        </ul>
    </li>
    @if(Auth::user()->level_id != 4 )
    <li class=" nav-item"><a class="d-flex align-items-center" href="index.html"><i data-feather="codesandbox"></i></i><span class="menu-title text-truncate" data-i18n="Dashboards">Master</span></a>   
        <ul class="menu-content">
            <li class="{{ (request()->is('admin/kategori*')) ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ url('/admin/kategori') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">Kategori Kelas</span></a>
            </li>
        </ul>
        <ul class="menu-content">
            <li class="{{ (request()->is('admin/tentor*')) ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ url('/admin/tentor') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">Master Tentor</span></a>
            </li>
        </ul>
        <ul class="menu-content">
            <li class="{{ (request()->is('admin/kelas*')) ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ url('/admin/kelas') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">Master Kelas</span></a>
            </li>
        </ul>
    </li>
    <li class="nav-item {{ (request()->is('admin/pembayaran*')) ? 'active' : '' }}" >
        <a href="{{ url('admin/pembayaran') }}" class="d-flex align-items-center">
        <i class="fas fa-money-check-alt"></i><span class="menu-title text-truncate">Pembelian Kelas</span></a>
    </li>
    @endif
    <li class="nav-item {{ (request()->is('siswa/list-kelas*')) ? 'active' : '' }}" >
        <a href="{{ url('siswa/list-kelas') }}" class="d-flex align-items-center">
        <i class="fas fa-store"></i><span class="menu-title text-truncate">Kelas</span></a>
    </li>
    <li class="nav-item {{ (request()->is('siswa/kelas-saya*')) ? 'active' : '' }}" >
        <a href="{{ url('siswa/kelas-saya') }}" class="d-flex align-items-center">
        <i class="fas fa-shopping-cart"></i><span class="menu-title text-truncate">Kelas Saya</span></a>
    </li>
    <li class="nav-item {{ (request()->is('siswa/pembayaran*')) ? 'active' : '' }}" >
        <a href="{{ url('siswa/pembayaran') }}" class="d-flex align-items-center">
        <i class="fas fa-money-bill-wave"></i><span class="menu-title text-truncate">Pembayaran</span></a>
    </li>
    <li class="navigation-header text-truncate">
        <span>Settings</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle>
            <circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle>
        </svg>
    </li>
    @if(Auth::user()->level_id != 4 )
    <li class="nav-item {{ (request()->is('admin/role-akses*')) ? 'active' : '' }}" >
        <a href="{{ url('admin/role-akses') }}" class="d-flex align-items-center">
        <i data-feather="settings"></i><span class="menu-title text-truncate">ROLE MANAGEMENT</span></a>
    </li>
    @endif
    <li class="nav-item {{ (request()->is('admin/profile*')) ? 'active' : '' }}" >
        <a href="{{ url('admin/profile') }}" class="d-flex align-items-center">
        <i data-feather="user"></i> <span class="menu-title text-truncate">Profile</span></a>
    </li>
</ul>