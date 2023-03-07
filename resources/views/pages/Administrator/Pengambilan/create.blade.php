@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 mt-5">
            <form action="/pengambilan" method="post">
                @csrf
                <div class="card">
                    <h5 class="card-header text-center">Pengambilan</h5><br>
                    <div class="card-body">
                        <div class="mb-5">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">ID Invontori</label>
                            <select class="form-select" name="inventori_id" aria-label="Default select example">
                                <option selected></option>
                                    @foreach($inventoris as $inventori)
                                        @if (old('inventori_id') == $inventori['id'])
                                            <option value="{{ $inventori['id'] }}" selected>{{ $inventori['id'] }}</option>
                                        @else
                                            <option value="{{ $inventori['id'] }}">{{ $inventori['id'] }}</option>
                                        @endif
                                @endforeach
                            </select>
                            @error('inventori_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">jumlah</label>
                            <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" value="{{ old('jumlah') }}" autofocus placeholder="jumlah">
                            @error('jumlah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" value="{{ old('keterangan') }}" autofocus placeholder="keterangan">
                            @error('keterangan')
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