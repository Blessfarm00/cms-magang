@extends('layouts.main')

@section('container')
<div class="pagetitle">
    <h1>Inventori</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Inventori</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-header text-center">Table Inventori</h5><br>
        <div class="card-tools">
            <a href="/inventori/create" class="btn btn-success">Tambah Data<i class="fas fa-plus-square"></i></a>
            <a href="/inventori/cetak" class="btn btn-success">Print<i class="fas fa-plus-square"></i></a>
        </div>
        <hr>
        <table class="table table-striped">
            <thead style="background-color:#0112FE">
                <tr>
                    <th scope="col" style="color:white">No</th>
                    <th scope="col" style="color:white">Kode Barang</th>
                    <th scope="col" style="color:white">Nama Barang</th>
                    <th scope="col" style="color:white">Harga Barang</th>
                    <th scope="col" style="color:white">Stok</th>
                    <th scope="col" style="color:white">Satuan</th>
                    <th colspan="2" scope="col" style="color:white">Aksi</th>
                </tr>
            </thead>
            <tbody>

                {{-- @php
                    dd($inventoris->items);
                @endphp --}}

                @foreach ($inventoris->items as $inventori)

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $inventori->kd_barang }}</td>
                    <td>{{ $inventori->nama_barang}}</td>
                    <td>{{ $inventori->harga }}</td>
                    <td>{{ $inventori->stok }}</td>
                    <td>{{ $inventori->satuan }}</td>
                    <td>
                        <a href="/inventori/{{ $inventori->id }}/edit" class="btn btn-warning">Edit</a>

                        <form action="/inventori/{{ $inventori->id }}" method="post" class="d-inline">
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