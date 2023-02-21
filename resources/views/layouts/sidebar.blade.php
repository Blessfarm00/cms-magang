<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">



<div class="text-center">
<img src="../images/profil.jpeg" alt="" width="100" height="100" class="center">
</div>

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ url('dashboard') }}">
                <i <span class="bi bi-house-door"></span></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('test') }}">
                <i <span class="bi bi-person"></span></i>
                <span>User</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-faq.html">
                <i <span class='bi bi-clipboard-check'></span></i>
                <span>Absensi</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-contact.html">
                <i <span class="bi bi-menu-up"></span></i>
                <span>Menu</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link {{ Request::is('inventori') ? 'active' : '' }}" href="{{ url('inventori') }}">
                <i <span class='bi bi-archive'></span></i>
                <span>Inventori</span>
            </a>
        </li><!-- End Register Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-login.html">
                <i <span class="bi bi-clipboard-data"></span></i>
                <span>Pengambilan Barang</span>
            </a>
        </li><!-- End Login Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-error-404.html">
                <i <span class="bi bi-plus-circle"></span></i>
                <span>Pemasukan</span>
            </a>
        </li><!-- End Error 404 Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-blank.html">
                <i <span class="bi bi-dash-circle"></span></i>
                <span>Pengeluaran</span>
            </a>
        </li><!-- End Blank Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-blank.html">
                <i <span class="bi bi-box-arrow-right"></span></span></i>
                <span>Logout</span>
            </a>
        </li>

    </ul>

</aside><!-- End Sidebar-->
