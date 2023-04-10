@extends('layouts.main')

@section('container')
<div class="pagetitle">
    <h1>Pengambilan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Pengambilan</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-header text-center">Table pengambilan barang</h5><br>
        <div class="card-tools">
            <a href="/pengambilan/create" class="btn btn-success">Tambah Data<i class="fas fa-plus-square"></i></a>
            <a href="/pengambilan/cetak" class="btn btn-success">Print<i class="fas fa-plus-square"></i></a>
        </div>
        <form action="{{ url('/pengambilan') }}" method="GET" >
            <div class="input-group mt-4 ">
                <input type="text" name="search" class="form-control" placeholder="Search by ID Inventori " value="{{ $search }}">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
        <hr>
        <table class="table table-striped">
            <thead style="background-color:#0112FE">
                <tr>
                    <th scope="col" style="color:white">No</th>
                    <th scope="col" style="color:white">ID Inventori</th>
                    <th scope="col" style="color:white">Jumlah</th>
                    <th scope="col" style="color:white">Keterangan</th>
                    <th scope="col" style="color:white">Tanggal</th>
                    <th colspan="2" scope="col" style="color:white">Aksi</th>
                </tr>
            </thead>


            @foreach ($pengambilans as $pengambilan)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pengambilan->inventori_id }}</td>
                <td>{{ $pengambilan->jumlah }}</td>
                <td>{{ $pengambilan->keterangan }}</td>
                <td>{{ date('l, d-m-y', strtotime($pengambilan->created_at)) }}</td>
                <td>
                    <a href="/pengambilan/{{ $pengambilan->id }}/edit" class="btn btn-warning">Edit</a>

                    <form action="/pengambilan/{{ $pengambilan->id }}" method="post" class="d-inline">
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