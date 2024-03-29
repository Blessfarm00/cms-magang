<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Login Kedai Kopi Rona</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../images/rona.jpeg" rel="icon">
    <link href="NiceAdmin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="NiceAdmin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="NiceAdmin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="NiceAdmin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="NiceAdmin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="NiceAdmin/assets/css/style.css" rel="stylesheet">
</head>

<body>
    <form method="POST" action="{{ route('authenticate') }}">


        <main>
            <div class="container">

                <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                                @if (session()->has('notLogin'))
                                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert"">
                                Anda Harus Login Terlebih Dahulu
                                <button type=" button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif
                                <div class="d-flex justify-content-center py-3">
                                    <a class="logo d-flex align-items-center w-auto">
                                        <img src="../images/rona.jpeg" style="border-radius: 50%;" alt="avatar">
                                        <span class="d-none d-lg-block">Kedai Kopi Rona</span>
                                    </a>

                                </div><!-- End Logo -->
                                @if(session()->has('login_error'))
                                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                    {{ session('login_error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif

                                <div class="card mb-3">

                                    <div class="card-body">

                                        <div class="pt-4 pb-2">
                                            <h5 class="card-title text-center pb-0 fs-5">Silahkan Login Terlebih Dahulu</h5>
                                            <p class="text-center small">Masukan Email & Password kamu untuk Login</p>
                                        </div>

                                        <form class="row g-3 needs-validation" action="login" method="post" novalidate>
                                            @csrf
                                            <div class="col-12">
                                                <label for="yourEmail" class="form-label">Email</label>
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                    <input type="text" name="email" value="{{ Session::get('email') }}" class="form-control @error('email') is-invalid @enderror" id="yourEmail" required>
                                                    @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror

                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="yourPassword" class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="yourPassword" required>
                                                @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <br>
                                            {{-- <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    value="true" id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                        </div> --}}
                                            {{-- <div class="text-center">
                                            <button class="btn btn-primary center" type="submit">Login</button>
                                        </div> --}}

                                            <div class="d-grid gap-2">
                                                <button class="btn btn-primary" type="submit">Login</button>
                                            </div>
                                            {{-- <div class="col-12">
                                            <p class="small mb-0">Don't have account? <a
                                                    href="/register">Create an account</a></p>
                                        </div> --}}
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>

            </div>
        </main><!-- End #main -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js"></script>
        <script src="NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="NiceAdmin/assets/vendor/chart.js/chart.umd.js"></script>
        <script src="NiceAdmin/assets/vendor/echarts/echarts.min.js"></script>
        <script src="NiceAdmin/assets/vendor/quill/quill.min.js"></script>
        <script src="NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js"></script>
        <script src="NiceAdmin/assets/vendor/tinymce/tinymce.min.js"></script>
        <script src="NiceAdmin/assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="NiceAdmin/assets/js/main.js"></script>

</body>

</html>