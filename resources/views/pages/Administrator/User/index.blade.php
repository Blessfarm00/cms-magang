@extends('layouts.main')

@section('container')
<div class="container p-4">
    @if (session()->has('pesan_tambah'))
    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
        Data Berhasil di Tambah
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(session()->has('pesan_edit'))
    <div class="alert alert-primary alert-dismissible fade show mt-3" role="alert">
        {{ session('pesan_edit') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(session()->has('pesan_hapus'))
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        {{ session('pesan_hapus') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div>

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
                    <td><img width="60px" height="60px" src="{{ asset($user->avatar) }}" alt=""></td>
                    {{-- <td>{{ $user->avatar }}</td> --}}
                    <td>{{ $user->no_hp }}</td>
                    <td>{{ $user->posisi }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="/user/{{ $user->user_id }}/edit" class="btn btn-warning btn-sm inline-block">Edit</a>

                        <form action="/user/{{ $user->user_id }}" method="post" class="d-inline">
                        @csrf
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin Akan Menghapus Data..?')" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @endsection