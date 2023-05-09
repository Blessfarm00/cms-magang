@extends('layouts.main')

@section('container')
@if (session()->has('messageLogin'))
<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert"">
    {{ session('messageLogin') }}
    <button type=" button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            {{-- <li class="breadcrumb-item"><a href="index.html">Home</a></li> --}}
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">

                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Total Barang <span>| Hari ini</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cart"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$inventories}}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->
                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card revenue-card">

                        <div class="card-body">
                            <h5 class="card-title">Total Pengeluaran <span>| Bulan ini</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>Rp {{ number_format($pengeluarans, 0, ',', '.') }}</h6>


                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Revenue Card -->

                <!-- Customers Card -->
                <div class="col-xxl-4 col-xl-12">

                    <div class="card info-card customers-card">

                        <div class="card-body">
                            <h5 class="card-title">Total Pengambilan <span>| Hari ini</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$pengambilan_barangs}}</h6>

                                </div>
                            </div>

                        </div>
                    </div>

                </div><!-- End Customers Card -->

                <!-- Top Selling -->
                <div class="col-12">
                    <div class="card top-selling overflow-auto">
                        <div class="card-body pb-0">
                            <h5 class="card-title">Pengambilan Barang <span>| Hari ini</span></h5>
                            <table class="table table-striped">
                                <thead style="background-color:#0112FE">
                                    <tr>
                                        <th scope="col" style="color:white">No</th>
                                        <th scope="col" style="color:white">ID Inventori</th>
                                        <th scope="col" style="color:white">Jumlah</th>
                                        <th scope="col" style="color:white">Keterangan</th>
                                        <th scope="col" style="color:white">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengambilan->items as $pengambilans)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pengambilans->inventori_id }}</td>
                                        <td>{{ $pengambilans->jumlah }}</td>
                                        <td>{{ $pengambilans->keterangan }}</td>
                                        <td>{{ date('l, d-m-y', strtotime($pengambilans->created_at)) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card top-selling overflow-auto">
                        <div class="card-body pb-0">
                            <h5 class="card-title">Pengeluaran <span>| Hari ini</span></h5>

                            <table class="table table-striped">
                                <thead style="background-color:#0112FE">
                                    <tr>
                                        <th scope="col" style="color:white">No</th>
                                        <th scope="col" style="color:white">Pengeluaran</th>
                                        <th scope="col" style="color:white">Inventori ID</th>
                                        <th scope="col" style="color:white">jumlah</th>
                                        <th scope="col" style="color:white">Rincian</th>
                                        <th scope="col" style="color:white">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">

                                    @foreach ($pengeluaran->items as $pengeluarans)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td> Rp {{ number_format($pengeluarans->pengeluaran, 0, ',', '.')}}</td>
                                        <td>{{ $pengeluarans->inventori_id}}</td>
                                        <td>{{ $pengeluarans->jumlah }}</td>
                                        <td>{{ $pengeluarans->rincian }}</td>
                                        <td>{{ date('l, d-m-y', strtotime($pengeluarans->created_at)) }}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>

            </div>
        </div><!-- End Left side columns -->

    </div>
</section>

@endsection