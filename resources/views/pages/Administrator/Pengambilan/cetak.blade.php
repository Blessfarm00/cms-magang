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
    <title>Cetak data Pengambilan</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Pengambilan</b></p>
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
</body>

</html>