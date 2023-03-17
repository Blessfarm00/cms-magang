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
                            <th scope="col" style="color:white">ID User</th>
                            <th scope="col" style="color:white">Jam Masuk</th>
                            <th scope="col" style="color:white">Jam Pulang</th>
                            <th scope="col" style="color:white">Tanggal</th>
                            <th scope="col" style="color:white">Rincian</th>
                            <th colspan="2" scope="col" style="color:white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $absensi['id_user'] }}</td>
                            <td>{{ $absensi['jam_masuk'] }}</td>
                            <td>{{ $absensi['jam_pulang'] }}</td>
                            <td>{{ date('l, d-m-y', strtotime($absensi['created_at'])) }}</td>
                            <td>{{ $absensi['keterangan'] }}</td>
                            <td>
                                <a href="/absensi/{{ $absensi['id'] }}/edit" class="btn btn-warning">Edit</a>
        
                                <form action="/absensi/{{ $absensi['id'] }}" method="post" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" onclick="return confirm('Yakin Akan Menghapus Data..?')" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </>
                </div>
        </div><br><br><br><br><br><br>


@endsection