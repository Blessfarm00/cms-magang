@extends('layouts.main')

@section('container')

<div class="card">
    <div class="card-body">
        <h5 class="card-header text-center">Table Menu</h5><br>
        <div class="card-tools">
            <a href="menu.create" class="btn btn-success">Tambah Data<i class="fas fa-plus-square"></i></a>
            <a href="#" class="btn btn-success">Print<i class="fas fa-plus-square"></i></a>
        </div>
        <hr>
        <table class="table table-striped">
            <thead style="background-color:#0112FE">
                <tr>
                    <th scope="col" style="color:white">No</th>
                    <th scope="col" style="color:white">id Prooduk</th>
                    <th scope="col" style="color:white">Nama Produk</th>
                    <th scope="col" style="color:white">Harga</th>
                    <th scope="col" style="color:white">Gambar</th>
                    <th scope="col" style="color:white">Deskripsi</th>
                    <th colspan="2" scope="col" style="color:white">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="#" class="btn btn-warning">Edit</a>
                        <a href="#" class="btn btn-dark">Detail</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    @endsection