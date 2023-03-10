@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 mt-5">
            <form action="/pengeluaran" method="post">
                @csrf
                <div class="card">
                    <h5 class="card-header text-center">Edit Data Pengeluaran</h5><br>
                    <div class="card-body">
                    @foreach($pengeluaran as $pengeluarans)
                        <div class="mb-5">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">pengeluaran</label>
                            <input type="number" name="pengeluaran" class="form-control @error('pengeluaran') is-invalid @enderror" id="pengeluaran" value="{{ $pengeluaran->pengeluaran }}" autofocus placeholder="Rp. ">
                            @error('pengeluaran')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Rincian</label>
                            <input type="text" name="rincian" class="form-control @error('rincian') is-invalid @enderror" id="rincian" value="{{ $rincian->rincian }}" autofocus placeholder="Rincian">
                            @error('rincian')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        @endforeach
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