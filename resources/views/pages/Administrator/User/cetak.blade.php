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
                <th> ID User </th>
                <th> Nama User </th>
                <th> Email </th>
                <th> Gambar </th>
                <th> No Hp </th>
                <th> posisi </th>
            </tr>
            <!-- @php
                dd($users)
            @endphp -->

            @foreach ($users as $user)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->nama_user }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->avatar }}</td>
                <td>{{ $user->no_hp }}</td>
                <td>{{ $user->posisi }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>

</html>