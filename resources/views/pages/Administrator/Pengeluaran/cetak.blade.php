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
                <th> Pengeluaran </th>
                <th> ID Inventori </th>
                <th> Jumlah </th>
                <th> Rincian </th>
                <th> Tanggal </th>
            </tr>

            @foreach ($pengeluarans->items as $pengeluaran)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pengeluaran->pengeluaran }}</td>
                <td>{{ $pengeluaran->inventori_id}}</td>
                <td>{{ $pengeluaran->jumlah }}</td>
                <td>{{ $pengeluaran->rincian }}</td>
                <td>{{ date('l, d-m-y', strtotime($pengeluaran->created_at)) }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>

</html>