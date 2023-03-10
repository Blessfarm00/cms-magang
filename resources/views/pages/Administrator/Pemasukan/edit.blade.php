@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 mt-5">
            <form action="/pemasukan" method="post">
                @csrf
                <div class="card">
                    <h5 class="card-header text-center">Edit Data Pemasukan</h5><br>
                    <div class="card-body">
                    @foreach($pemasukan as $pemasukans)
                    {{-- {{$pemasukans->id}}  --}}
                        <div class="mb-5">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Pemasukan</label>
                            <input type="number" name="pemasukan" class="form-control @error('pemasukan') is-invalid @enderror" id="pemasukan" value="{{ $pemasukan->pemasukan }}" autofocus placeholder="Rp. ">
                            @error('pemasukan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        @endforeach
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