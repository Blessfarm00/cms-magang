@extends('layouts.main')

@section('container')
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>Dashboard - NiceAdmin Bootstrap Template</title>
<meta content="" name="description">
<meta content="" name="keywords">

<!-- Favicons -->
<link href="assets/img/favicon.png" rel="icon">
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
<link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
<link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="assets/css/style.css" rel="stylesheet">

<!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- Sales Card -->
    <div class="col-xxl-4 col-xl-12">

        <div class="card info-card customers-card">
            <div class="card-body">
                <h5 class="card-title">Tabel User</span></h5>
                <h6 class="card-subtitle mb-2 text-muted">User</h6>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                        <a href="/user" class="card-link">Go to Table</a>
                    </div>
                </div>

            </div>
        </div>

    </div><!-- End Sales Card -->

    <!-- Revenue Card -->
    <div class="col-xxl-4 col-xl-12">

        <div class="card info-card customers-card">
            <div class="card-body">
                <h5 class="card-title">Tabel Absensi</span></h5>
                <h6 class="card-subtitle mb-2 text-muted">Absensi</h6>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                        <a href="/absensi" class="card-link">Go to Table</a>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- Customers Card -->
    <div class="col-xxl-4 col-xl-12">
        <div class="card info-card customers-card">
            <div class="card-body">
                <h5 class="card-title">Tabel Inventori</span></h5>
                <h6 class="card-subtitle mb-2 text-muted">Inventori</h6>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                        <a href="/inventori" class="card-link">Go to Table</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xxl-4 col-xl-12">
        <div class="card info-card customers-card">
            <div class="card-body">
                <h5 class="card-title">Tabel Pengambilan</span></h5>
                <h6 class="card-subtitle mb-2 text-muted">Pengambilan</h6>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                        <a href="/pengambilan" class="card-link">Go to Table</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xxl-4 col-xl-12">
        <div class="card info-card customers-card">
            <div class="card-body">
                <h5 class="card-title">Tabel Pengeluaran</span></h5>
                <h6 class="card-subtitle mb-2 text-muted">Pengeluaran</h6>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                        <a href="/pengeluaran" class="card-link">Go to Table</a>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>






</body>

@endsection