@extends('layouts.main')

@section('container')

        <div class="card">
            <div class="card-body">
                <h5 class="card-header text-center">Table Absensi</h5><br>
        
                <div class="card-tools">
                    <a href="absensi.create" class="btn btn-success">Tambah Data<i class="fas fa-plus-square"></i></a>
                    <a href="#" class="btn btn-success">Print<i class="fas fa-plus-square"></i></a>
                </div>
                <hr>
                <table class="table table-striped">
                    <thead style="background-color:#0112FE">
                        <tr>
                            <th scope="col" style="color:white">No</th>
                            <th scope="col" style="color:white">ID Absensi</th>
                            <th scope="col" style="color:white">Nama</th>
                            <th scope="col" style="color:white">Tanggal</th>
                            <th scope="col" style="color:white">Keterangan</th>
                            <th colspan="2" scope="col" style="color:white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr>
                            <th scope="row">1</th>
                            <td>1233</td>
                            <td>Faiz Ptk</td>
                            <td>22/02/2023</td>
                            <td>Hadir</td>
                            <td><a href="#" class="btn btn-warning">Edit</a>
                                <a href="#" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </>
                </div>
        </div><br><br><br><br><br><br>


@endsection