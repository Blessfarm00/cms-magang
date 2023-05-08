@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 mt-5">
            <form action="/pengeluaran" method="post">
                @csrf
                <div class="card">
                    <h5 class="card-header text-center">Tambah Data Pengeluaran</h5><br>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Pengeluaran</label>
                            <input type="number" name="pengeluaran" class="form-control @error('pengeluaran') is-invalid @enderror" id="pengeluaran" value="{{ old('pengeluaran') }}" autofocus placeholder="Rp. ">
                            @error('pengeluaran')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inventory" class="form-label">Barang</label>
                            <select class="form-control" name="inventori_id" aria-label="Default select example">
                                <option selected>- Pilih -</option>
                                @foreach($inventory->data->items as $p)
                                @if (old('id') == $p->id)
                                <option value="{{ $p->id }}">{{ $p->nama_barang }}</option>
                                @else
                                <option value="{{ $p->id }}">{{ $p->kd_barang }} - {{ $p->nama_barang }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Rincian</label>
                            <input type="text" name="rincian" class="form-control @error('rincian') is-invalid @enderror" id="rincian" value="{{ old('rincian') }}" autofocus placeholder="Rincian">
                            @error('rincian')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Jumlah</label>
                            <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" value="{{ old('jumlah') }}" autofocus placeholder="Jumlah">
                            @error('jumlah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" value="{{ old('tanggal') }}" autofocus placeholder="tanggal">
                            @error('tanggal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>

                    </div>
                </div>

            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div><br><br><br><br><br><br><br><br><br><br><br><br>


@endsection