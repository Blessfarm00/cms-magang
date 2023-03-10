@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 mt-5">
            <form action="/inventori" method="post">
                @csrf
                <div class="card">
                    <h5 class="card-header text-center">Inventori</h5><br>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" value="{{ old('nama_barang') }}" autofocus placeholder="Nama Barang">
                            @error('nama_barang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Kode Barang</label>
                            <input type="text" name="kd_barang" class="form-control @error('kd_barang') is-invalid @enderror" id="kd_barang" value="{{ old('kd_barang') }}" autofocus placeholder="Kode Barang">
                            @error('kd_barang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Harga</label>
                            <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" value="{{ old('harga') }}" autofocus placeholder="Harga Barang">
                            @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Stok</label>
                            <input type="text" name="stok" class="form-control @error('stok') is-invalid @enderror" id="stok" value="{{ old('stok') }}" autofocus placeholder="stok Barang">
                            @error('stok')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Satuan</label>
                            <input type="text" name="satuan" class="form-control @error('satuan') is-invalid @enderror" id="satuan" value="{{ old('satuan') }}" autofocus placeholder="satuan Barang">
                            @error('satuan')
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