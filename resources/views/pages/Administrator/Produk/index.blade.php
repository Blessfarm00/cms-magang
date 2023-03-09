@extends('layouts.main')

@section('container')

<div class="card">
    <div class="card-body">
        <h5 class="card-header text-center">Table Menu</h5><br>
        <div class="card-tools">
            <a href="/produk/create" class="btn btn-success">Tambah Data<i class="fas fa-plus-square"></i></a>
            <a href="#" class="btn btn-success">Print<i class="fas fa-plus-square"></i></a>
        </div>
        <hr>
        <table class="table table-striped">
            <thead style="background-color:#0112FE">
                <tr>
                    <th scope="col" style="color:white">No</th>
                    <th scope="col" style="color:white">Nama Produk</th>
                    <th scope="col" style="color:white">Harga</th>
                    <th scope="col" style="color:white">Deskripsi</th>
                    <th scope="col" style="color:white">Gambar</th>
                    <th colspan="2" scope="col" style="color:white">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($produks['data']['items'] as $produk)

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $produk['nama_produk'] }}</td>
                    <td>{{ $produk['harga'] }}</td>
                    <td>{{ $produk['deskripsi'] }}</td>
                    <td>
                        @if ($produk['gambar'])
                        <img id="myImg" src="{{ url('images') . '/' . $produk['gambar'] }}" alt="{{ $produk ['nama_produk'] }}" style="max-width:80px">
                        
                        @endif
                    </td>
                    <td>
                        <a href="/produks/{{ $produk['id'] }}/edit" class="btn btn-warning">Edit</a>

                        <form action="/produks/{{ $produk['id'] }}" method="post" class="d-inline">
                            @method('DELETE')
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