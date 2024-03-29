@extends('layouts.main')

@section('container')
<div class="container p-4">
    @if (session()->has('pesan_tambah'))
    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
        Data Berhasil di Tambah
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(session()->has('pesan_edit'))
    <div class="alert alert-primary alert-dismissible fade show mt-3" role="alert">
        {{ session('pesan_edit') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(session()->has('pesan_hapus'))
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        {{ session('pesan_hapus') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div>

    <div class="pagetitle">
        <h1>Pengeluaran</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Pengeluaran</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-header text-center">Table Pengeluaran</h5><br>
            <div class="card-tools">
                <a href="/test/create" class="btn btn-success">Tambah Data<i class="fas fa-plus-square"></i></a>
                <a href="/pengeluaran/cetak" class="btn btn-success">PDF<i class="fas fa-plus-square"></i></a>
            </div>
            <form action="{{ url('/pengeluaran') }}" method="GET">

                <div class="input-group mt-4">
                    <input type="text" name="search" class="form-control" placeholder="Search by ID Inventori " value="{{ $search }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
            <hr>
            <table class="table table-striped">
                <thead style="background-color:#0112FE">
                    <tr>
                        <th scope="col" style="color:white">No</th>
                        <th scope="col" style="color:white">Pengeluaran</th>
                        <th scope="col" style="color:white">Inventori ID</th>
                        <th scope="col" style="color:white">jumlah</th>
                        <th scope="col" style="color:white">Rincian</th>
                        <th scope="col" style="color:white">Tanggal</th>
                        <th colspan="2" scope="col" style="color:white">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    {{-- @php
                    dd($pengeluarans->items);
                @endphp --}}

                    @foreach ($pengeluarans as $pengeluaran)


                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td> Rp {{ number_format($pengeluaran->pengeluaran, 0, ',', '.')}}</td>
                        <td>{{ $pengeluaran->inventori_id}}</td>
                        <td>{{ $pengeluaran->jumlah }}</td>
                        <td>{{ $pengeluaran->rincian }}</td>
                        <td>{{ date('l, d-m-y', strtotime($pengeluaran->created_at)) }}</td>
                        <td>
                            <a href="/pengeluaran/{{ $pengeluaran->id }}/edit" class="btn btn-warning">Edit</a>

                            <form action="/pengeluaran/{{ $pengeluaran->id }}" method="post" class="d-inline">
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Yakin Akan Menghapus Data..?')" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @endsection