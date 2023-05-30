<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kedai Kopi Rona</title>
{{-- 
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css"> --}}
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                      <img src="data:image/png;base64, {{ base64_encode(file_get_contents(public_path('images/rona.jpeg'))) }}" style="width: 150px; height: 150px">
                    </h2>           
                </div>

                <div class="col-12">
                    <h2 class="page-header" style="text-align: center;">
                        <i class="center"></i> KEDAI KOPI RONA
                    </h2>
                </div>


                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>Admin</strong><br>
                        Jl. Rasuna Said No.81 C-1, Ujung Gurun, <br>
                        Kec. Padang Bar., Kota Padang, Sumatera Barat<br>
                        Phone: (804) 123-5432<br><br>
                    </address>
                </div>
                <!-- /.col -->
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                        <tr>
                            <th> No </th>
                            <th> ID User </th>
                            <th> Jam masuk </th>
                            <th> jam keluar </th>
                        </tr>
                        @foreach ($absensis->items as $absensi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $absensi->user_id }}</td>
                            <td>{{ $absensi->jam_masuk }}</td>
                            <td>{{ $absensi->jam_keluar }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.col -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>

        
 