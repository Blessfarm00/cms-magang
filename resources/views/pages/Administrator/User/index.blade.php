@extends('layouts.main')

@section('container')
<div class="pagetitle">
    <h1>User</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">User</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-header text-center">Table User</h5><br>
        <table class="table table-striped">
            <thead style="background-color:#0112FE">
                <tr>
                    <th scope="col" style="color:white">No</th>
                    <th scope="col" style="color:white">Nama</th>
                    <th scope="col" style="color:white">Email</th>
                    <th scope="col" style="color:white">Avatar</th>
                    <th scope="col" style="color:white">No HP</th>
                    <th scope="col" style="color:white">Posisi</th>
                    <th scope="col" style="color:white">Role</th>
                    <th colspan="2" scope="col" style="color:white">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->nama_user }}</td>
                    <td>{{ $user->email }}</td>
                    {{-- <td>{{ asset($profiles->avatar) }}</td> --}}
                    <td>{{ $user->avatar }}</td>
                    <td>{{ $user->no_hp }}</td>
                    <td>{{ $user->posisi }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="/user/{{ $user->user_id }}/edit" class="btn btn-warning">Edit</a>

                        <form action="/user/{{ $user->user_id }}" method="post" class="d-inline">
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