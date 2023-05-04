<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ url('dashboard') }}">
                <i <span class="bi bi-house-door"></span></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->


        <li class="nav-item">
            <a class="nav-link {{ Request::is('user') ? 'active' : '' }}" href="{{ url('user') }}">
                <i <span class="bi bi-person"></span></i>
                <span>User</span>
            </a>
        </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Request::is('absensi') ? 'active' : '' }}" href="{{ url('absensi') }}">
                    <i <span class='bi bi-clipboard-check'></span></i>
                    <span>Absensi</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ Request::is('inventori') ? 'active' : '' }}" href="{{ url('inventori') }}">
                <i <span class='bi bi-archive'></span></i>
                <span>Inventori</span>
            </a>
        </li><!-- End Register Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ Request::is('pengambilan') ? 'active' : '' }}" href="{{ url('pengambilan') }}">
                <i <span class="bi bi-clipboard-data"></span></i>
                <span>Pengambilan Barang</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('pengeluaran') ? 'active' : '' }}" href="{{ url('pengeluaran') }}">
                <i <span class="bi bi-dash-circle"></span></i>
                <span>Pengeluaran</span>
            </a>
        </li><!-- End Blank Page Nav -->
        {{-- <li>
            <a class="nav-link {{ Request::is('logout') ? 'active' : '' }}" href="{{ url('logout') }}">
                <i <span class="bi bi-box-arrow-in-right"></span></i>
                <span>Sign Out</span>
            </a>
        </li> --}}

    </ul>

</aside><!-- End Sidebar-->