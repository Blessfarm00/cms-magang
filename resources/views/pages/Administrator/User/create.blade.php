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
                            <input type="text" class="form-control" @error('nama_user') is-invalid @enderror" id="nama_user" value="{{ old('nama_user') }}" autofocus placeholder="Nama User">
                            @error('nama_user')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Email</label>
                            <input type="text" class="form-control"  @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" autofocus placeholder="Email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Password</label>
                            <input type="text" class="form-control" @error('password') is-invalid @enderror" id="password" value="{{ old('password') }}" autofocus placeholder="Password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Gambar</label>
                            <input type="text" class="form-control" @error('gambar') is-invalid @enderror" id="gambar" value="{{ old('gambar') }}" autofocus placeholder="Gambar">
                            @error('gambar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">No HP</label>
                            <input type="text" class="form-control" @error('no_hp') is-invalid @enderror" id="no_hp" value="{{ old('no_hp') }}" autofocus placeholder="No Hp">
                            @error('no_hp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Role Id</label>
                            <input type="text" class="form-control" @error('role_id') is-invalid @enderror" id="role_id" value="{{ old('role_id') }}" autofocus placeholder="role_id">
                            @error('role_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        <div class="mb-5">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Posisi</label>
                            <input type="text" class="form-control" @error('posisi') is-invalid @enderror" id="posisi" value="{{ old('posisi') }}" autofocus placeholder="Posisi">
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