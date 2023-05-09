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
                        <img src="../../images/rona.jpeg">
                        <i class="fas fa-globe"></i> KEDAI KOPI RONA
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
                            <th> ID Inventori </th>
                            <th> Jumlah </th>
                            <th> Keterangan </th>
                            <th> Tanggal </th>
                        </tr>
            
                        @foreach ($pengambilan_barangs->items as $pengambilan_barang)
            
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pengambilan_barang->inventori_id }}</td>
                            <td>{{ $pengambilan_barang->jumlah }}</td>
                            <td>{{ $pengambilan_barang->keterangan }}</td>
                            <td>{{ date('l, d-m-y', strtotime($pengambilan_barang->created_at)) }}</td>
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
       
