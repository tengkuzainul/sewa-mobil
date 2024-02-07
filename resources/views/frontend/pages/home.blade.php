@extends('frontend.layouts.index')
@section('title', 'Home')
@section('content')
    <h3 class="text-center mb-5">Daftar Mobil</h3>
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        @foreach ($car as $cars)
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    <div class="badge badge-custom {{ $cars->status == 'Tersedia' ? 'bg-success' : 'bg-warning' }} text-white position-absolute"
                        style="top: 0; right: 0">
                        {{ $cars->status }}
                    </div>
                    <!-- Product image-->
                    <img class="card-img-top" src="{{ asset(Storage::url($cars->gambar)) }}" alt="Gambar Mobil" />
                    <!-- Product details-->
                    <div class="card-body card-body-custom pt-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{ $cars->nama_mobil }}</h5>
                            <!-- Product price-->
                            <div class="rent-price mb-3">
                                <span class="text-primary">Rp {{ number_format($cars->harga_sewa) }}/</span>day
                            </div>
                            <ul class="list-unstyled list-style-group">
                                <li class="border-bottom p-2 d-flex justify-content-between">
                                    <span>Bahan bakar</span>
                                    <span style="font-weight: 600">{{ $cars->bahan_bakar }}</span>
                                </li>
                                <li class="border-bottom p-2 d-flex justify-content-between">
                                    <span>Jumlah Kursi</span>
                                    <span style="font-weight: 600">{{ $cars->jumlah_kursi }}</span>
                                </li>
                                <li class="border-bottom p-2 d-flex justify-content-between">
                                    <span>Transmisi</span>
                                    <span style="font-weight: 600">{{ $cars->jumlah_kursi }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer border-top-0 bg-transparent">
                        <div class="text-center">
                            <a class="btn btn-primary mt-auto" href="#">Sewa</a>
                            <a class="btn btn-info mt-auto text-white"
                                href="{{ route('cars.detail', $cars->id) }}">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
