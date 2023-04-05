@extends('layouts.main')

@section('container')
<div class="pagetitle">
    <h1>Absensi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Absensi</li>
        </ol>
    </nav>
</div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-header text-center">Table Absensi</h5><br>
        
                <div class="card-tools">
                    <a href="#" class="btn btn-success">Print<i class="fas fa-plus-square"></i></a>
                </div>
                <hr>
                <table class="table table-striped">
                    <thead style="background-color:#0112FE">
                        <tr>
                            <th scope="col" style="color:white">No</th>
                            <th scope="col" style="color:white">ID User</th>
                            <th scope="col" style="color:white">Jam Masuk</th>
                            <th scope="col" style="color:white">Jam Keluar</th>
                            <th colspan="2" scope="col" style="color:white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($absensis->items as $absensi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $absensi->user_id }}</td>
                            <td>{{ $absensi->jam_masuk }}</td>
                            <td>{{ $absensi->jam_keluar }}</td>
                            <td>
                                <form action="/absensi/{{ $absensi->id }}" method="post" class="d-inline">
                                    @csrf
                                    <button class="btn btn-danger" onclick="return confirm('Yakin Akan Menghapus Data..?')" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </>
                </div>
        </div><br><br><br><br><br><br>


@endsection