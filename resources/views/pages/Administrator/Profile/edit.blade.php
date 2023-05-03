@extends('layouts.main')

@section('container')
@section('content_header_title',' Edit Profile')

<div class="container">

    {{-- @php
            dd($profile);
        @endphp --}}
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 mt-5">
            <form action="/profile/update/{{ $profile->data->user_id }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class=" card">
                <h5 class="card-header text-center">Edit Data Profile</h5><br>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Nama User</label>
                        <input type="text" name="nama_user" class="form-control @error('nama_user') is-invalid @enderror" id="nama_user" value="{{ $profile->data->nama_user }}" autofocus placeholder="Nama User">
                        @error('nama_user')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="staticEmail" class="form-label" style="text-align: center;">Email</label>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ $profile->data->email }}" autofocus placeholder="email">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Avatar</label>
                        <img src="{{ $profile->data->avatar }}" alt="" width="150px">
                        <input class="form-control" type="file" id="formFile" name="avatar" accept="image/profile">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label" style="text-align: center;">No Handphone</label>
                        <input type="number" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" value="{{ $profile->data->no_hp }}" autofocus placeholder="0812xxx">
                        @error('no_hp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Posisi</label>
                        <input type="text" name="posisi" class="form-control @error('posisi') is-invalid @enderror" id="posisi" value="{{ $profile->data->posisi }}" autofocus placeholder="posisi">
                        @error('posisi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Role</label>
                        <input type="text" name="role" class="form-control @error('role') is-invalid @enderror" id="role" value="{{ $profile->data->role }}" autofocus placeholder="role">
                        @error('role')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    {{-- <div class="mb-3 row">
                            <label for="exampleInputPassword1" class="col-sm-2 col-form-label">Posisi   :</label>
                            <div class="col-sm-10">
                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $profile->data->posisi }}">
                    @error('posisi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
        </div> --}}
        <div class="text-center">
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
@section('script')
@endsection