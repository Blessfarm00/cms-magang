@extends('layouts.main')

@section('container')

<h1>Tabel Iventory</h1>
<div>
    <h5>Melihat data Iventory</h5>
    <div class="card-tools">
        <a href="#" class="btn btn-success">Tambah Data<i class="fas fa-plus-square"></i></a>
        <a href="#" class="btn btn-success">Print<i class="fas fa-plus-square"></i></a>
    </div>
    <hr>
    <table class="table table-striped">
        <thead style="background-color:#0112FE">
            <tr>
                <th scope="col" style="color:white">No</th>
                <th scope="col" style="color:white">Kode Barang</th>
                <th scope="col" style="color:white">Nama Barang</th>
                <th scope="col" style="color:white">Harga</th>
                <th scope="col" style="color:white">Stok</th>
                <th scope="col" style="color:white">Satuan</th>
                <th scope="col" style="color:white">Gambar</th>
                <th colspan="2" scope="col" style="color:white">Aksi</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>12.00</td>
                <td>Hadir</td>
                <td>..</td>
                <td>..</td>
                <td>..</td>
                  <td><a href="#" class="btn btn-warning">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>08.00</td>
                <td>Hadir</td>
                <td>..</td>
                <td>..</td>
                <td>..</td>
                <td><a href="#" class="btn btn-warning">Edit</a>
                    <a href="#" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Syafik</td>
                <td>17.00</td>
                <td>Hadir</td>
                <td>..</td>
                <td>..</td>
                <td>..</td>
                <td><a href="#" class="btn btn-warning">Edit</a>
                    <a href="#" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection