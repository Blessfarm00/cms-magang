<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        table.static {
            position: relative;
            border: 1px solid #543535;
        }
    </style>
    <title>Cetak data inventori</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Inventori</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>
                <th> No </th>
                <th> Kode barang </th>
                <th> Nama barang </th>
                <th> Harga barang </th>
                <th> Stock</th>
                <th> Satuan </th>
            </tr>
            @foreach ($inventoris->items as $inventori)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $inventori->kd_barang }}</td>
                <td>{{ $inventori->nama_barang}}</td>
                <td>{{ $inventori->harga }}</td>
                <td>{{ $inventori->stok }}</td>
                <td>{{ $inventori->satuan }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>

</html>