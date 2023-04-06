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
</body>

</html>