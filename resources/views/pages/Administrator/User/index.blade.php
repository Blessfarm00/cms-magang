@extends('layouts.main')

@section('container')

<div class="card">
    <div class="card-body">
        <h5 class="card-header text-center">Table User</h5><br>
        <div class="card-tools">
            <a href="#" class="btn btn-success">Print Data User<i class="fas fa-plus-square"></i></a>
        </div>
        <hr>
        <table class="table table-striped">
            <thead style="background-color:#0112FE">
                <tr>
                    <th scope="col" style="color:white">No</th>
                    <th scope="col" style="color:white">ID User</th>
                    <th scope="col" style="color:white">Nama User</th>
                    <th scope="col" style="color:white">Email</th>
                    <th scope="col" style="color:white">Gambar</th>
                    <th scope="col" style="color:white">No HP</th>
                    <th scope="col" style="color:white">Posisi</th>
                    <th colspan="2" scope="col" style="color:white">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->nama_user }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->avatar }}</td>
                    <td>{{ $user->no_hp }}</td>
                    <td>{{ $user->posisi }}</td>
                    <td>
                        <a href="/user/{{ $user->user_id }}/edit" class="btn btn-warning">Edit</a>

                        <form action="/user/{{ $user->user_id}" method="post" class="d-inline">
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