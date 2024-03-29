@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 mt-5">
            <form>
                <div class="card">
                    <h5 class="card-header text-center">User</h5><br>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Nama User</label>
                            <input type="text" class="form-control" @error('nama_user') is-invalid @enderror" name="nama_user" value="{{ old('nama_user') }}" autofocus placeholder="Nama User">
                            @error('nama_user')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Email</label>
                            <input type="text" class="form-control"  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autofocus placeholder="Email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Gambar</label>
                            <input type="text" class="form-control" @error('gambar') is-invalid @enderror" name="avatar" value="{{ old('gambar') }}" autofocus placeholder="Gambar">
                            @error('gambar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">No HP</label>
                            <input type="text" class="form-control" @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}" autofocus placeholder="No Hp">
                            @error('no_hp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        <div class="mb-5">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Posisi</label>
                            <input type="text" class="form-control" @error('posisi') is-invalid @enderror" name="posisi" value="{{ old('posisi') }}" autofocus placeholder="Posisi">
                            @error('posisi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary" type="button">Simpan</button>
                        </div>

                    </div>
                </div>

            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div><br><br><br><br><br><br><br><br><br><br><br><br>


@endsection