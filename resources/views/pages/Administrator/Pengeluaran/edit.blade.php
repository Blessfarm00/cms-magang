@extends('layouts.main')

@section('container')
@section('content_header_title',' Edit Pengeluaran')

<div class="container">

    {{-- @php
        dd($pengeluaran);
    @endphp --}}
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 mt-5">
            <form action="/pengeluaran/update/{{ $pengeluaran->data->id }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <h5 class="card-header text-center">Edit Data Pengeluaran</h5><br>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Pengeluaran</label>
                            <input type="number" name="pengeluaran" class="form-control @error('pengeluaran') is-invalid @enderror" id="pengeluaran" value="{{  $pengeluaran->data->pengeluaran }}" autofocus placeholder="Rp. ">
                            @error('pengeluaran')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Id Inventori</label>
                            <input type="text" name="inventori_id" class="form-control @error('inventori_id') is-invalid @enderror" id="inventori_id" value="{{ $pengeluaran->data->inventori_id }}" autofocus placeholder="inventori_id">
                            @error('inventori_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Rincian</label>
                            <input type="text" name="rincian" class="form-control @error('rincian') is-invalid @enderror" id="rincian" value="{{ $pengeluaran->data->rincian }}" autofocus placeholder="Rincian">
                            @error('rincian')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Jumlah</label>
                            <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" value="{{ $pengeluaran->data->jumlah }}" autofocus placeholder="Jumlah">
                            @error('jumlah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" value="{{ $pengeluaran->data->tanggal }}" autofocus placeholder="tanggal">
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
@section('script')
@endsection