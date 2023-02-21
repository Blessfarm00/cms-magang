@extends('layouts.main')

@section('container')

    <h1>Table Inventory</h1>
    <div class="col-md-10 p-5 pt-2 ml-5">
                <h3> <i class="fas fa-techometer-alt mr-2"></i>Employee</h3>
                <hr>
                <table class="table table-striped table-bordered">
                    <thead class="table-#0112FE">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama </th>
                            <th scope="col">jam masuk</th>
                            <th scope="col">Absensi</th>
                            <th colspan="2" scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>12.00</td>
                            <td>Hadir</td>
                            <td><a href="#" class="btn btn-primary">Edit</a></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>08.00</td>
                            <td>Hadir</td>
                            <td>...</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Syafik</td>
                            <td>17.00</td>
                            <td>Hadir</td>
                            <td>...</td>
                        </tr>
                    </tbody>
                </table>
        </div>

@endsection