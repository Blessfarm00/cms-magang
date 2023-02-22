@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 mt-5">        
        <form> 
            <div class="card">
                <h5 class="card-header text-center">Inventori</h5><br>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Nama Barang</label>
                        <input type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Kode Barang</label>
                        <input type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Harga</label>
                        <input type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Stok</label>
                        <input type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-5">
                        <label for="exampleInputPassword1" class="form-label" style="text-align: center;">Satuan</label>
                        <input type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary" type="button">Button</button>
                    </div>

                </div>
            </div>

        </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div><br><br><br><br><br><br><br><br><br><br><br><br>


@endsection