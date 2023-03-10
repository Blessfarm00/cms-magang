@extends('layouts.main')

@section('container')

        <div class="card">
            <div class="card-body">
                <h5 class="card-header text-center">Table Pemasukan</h5><br>
        
                <div class="card-tools">
                    <a href="/pemasukan/create" class="btn btn-success">Tambah Data<i class="fas fa-plus-square"></i></a>
                    <a href="#" class="btn btn-success">Print<i class="fas fa-plus-square"></i></a>
                </div>
                <hr>
                <table class="table table-striped">
                    <thead style="background-color:#0112FE">
                        <tr>
                            <th scope="col" style="color:white">No</th>
                            <th scope="col" style="color:white">Pemasukan</th>
                            <th scope="col" style="color:white">Waktu</th>
                            <th colspan="2" scope="col" style="color:white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($pemasukans['data']['items'] as $pemasukan)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pemasukan['pemasukan'] }}</td>
                            <td>{{ date('l, d-m-y', strtotime($pemasukan['created_at'])) }}</td>
                            <td>
                                <a href="/pemasukan/{{ $pemasukan['id'] }}/edit" class="btn btn-warning">Edit</a>
        
                                <form action="/pemasukan/{{ $pemasukan['id'] }}" method="post" class="d-inline">
                                    @method('DELETE')
                                @csrf
                                    <button class="btn btn-danger" onclick="return confirm('Yakin Akan Menghapus Data..?')" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </>
                </div>
        </div><br><br><br><br><br><br>


@endsection