@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 mt-5">
            <form action="/produk" method="post">
                @csrf
                <div class="card">
                    <h5 class="card-header text-center">produk</h5><br>
                    <div class="card-body">
                        <div class="mb-5">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk" value="{{ old('nama_produk') }}" autofocus placeholder="Nama Produk">
                            @error('nama_produk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">harga</label>
                            <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" value="{{ old('harga') }}" autofocus placeholder="Rp. ">
                            @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Images</label>
                            <input type="text" name="gambar" class="form-control @error('gambar') is-invalid @enderror" id="gambar" value="{{ old('gambar') }}" autofocus placeholder="gambar">
                            @error('gambar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Deskrisi</label>
                            <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" value="{{ old('deskripsi') }}" autofocus placeholder="deskropsi ">
                            @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary" type="submit">Button</button>
                        </div>

                    </div>
                </div>

            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div><br><br><br><br><br><br><br><br><br><br><br><br>


@endsection