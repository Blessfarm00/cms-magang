@extends('layouts.main')

@section('container')

<div class="card">
    <div class="card-body">
        <h5 class="card-header text-center">Table pengambilan barang</h5><br>
        <div class="card-tools">
            <a href="/pengambilan/create" class="btn btn-success">Tambah Data<i class="fas fa-plus-square"></i></a>
            <a href="#" class="btn btn-success">Print<i class="fas fa-plus-square"></i></a>
        </div>
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
            @foreach ($pengambilan_barangs['data']['items'] as $pengambilan_barang)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pengambilan_barang['inventori_id'] }}</td>
                <td>{{ $pengambilan_barang['jumlah'] }}</td>
                <td>{{ $pengambilan_barang['keterangan'] }}</td>
                <td>{{ date('l, d-m-y', strtotime($pengambilan_barang['created_at'])) }}</td>
                <td>
                    <a href="/pengambilan_barang/{{ $pengambilan_barang['id'] }}/edit" class="btn btn-warning">Edit</a>

                    <form action="/pengambilan_barang/{{ $pengambilan_barang['id'] }}" method="post" class="d-inline">
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