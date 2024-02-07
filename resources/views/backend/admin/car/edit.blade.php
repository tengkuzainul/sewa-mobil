@extends('backend.layouts.index')
@section('title', 'Edit Data Cars')
@section('title_page', 'Edit Data Cars')
@section('breadcrumb', 'Edit Data Cars')
@section('content')

    {{-- alert eror --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- alert --}}
    @if (session()->has('massage-image'))
        <div class="alert alert-{{ session()->get('alert-type-image') }} alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            {{ session()->get('massage-image') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Form Edit Data Cars</h5>
                <!-- No Labels Form -->

                <form class="row g-3" action="{{ route('cars.update', $car->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <input type="text" name="nama_mobil" class="form-control" placeholder="Nama Mobil"
                            value="{{ old('nama_mobil', $car->nama_mobil) }}">
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="harga_sewa" class="form-control" placeholder="Harga Sewa"
                            value="{{ old('harga_sewa', $car->harga_sewa) }}">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="bahan_bakar" class="form-control" placeholder="Bahan Bakar"
                            value="{{ old('bahan_bakar', $car->bahan_bakar) }}">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="jumlah_kursi" class="form-control" placeholder="Jumlah Kursi"
                            value="{{ old('jumlah_kursi', $car->jumlah_kursi) }}">
                    </div>
                    <div class="col-6">
                        <select name="tranmisi" id="tranmisi" class="form-control">
                            {{-- <option value="" selected disabled>--- Pilih Tranmisi ---</option> --}}
                            <option {{ $car->transmisi == 'Manual' ? 'selected' : null }} value="Manual">Manual</option>
                            <option {{ $car->transmisi == 'Otomatis' ? 'selected' : null }} value="Otomatis">Otomatis
                            </option>
                        </select>
                    </div>
                    <div class="col-6">
                        <select name="status" id="status" class="form-control">
                            {{-- <option value="" selected disabled>--- Pilih Status ---</option> --}}
                            <option {{ $car->status == 'Tersedia' ? 'selected' : null }} value="Tersedia">Tersedia</option>
                            <option {{ $car->status == 'Tidak Tersedia' ? 'selected' : null }} value="Tidak Tersedia">Tidak
                                Tersedia</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="deskripsi" class="mb-1">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control">{{ old('deskripsi', $car->deskripsi) }}</textarea>
                    </div>
                    <div class="col-6">
                        <select name="p3k" id="p3k" class="form-control">
                            {{-- <option value="" selected disabled>--- Pilih Status P3K ---</option> --}}
                            <option {{ $car->p3k === '1' ? 'selected' : null }} value="1">Tersedia</option>
                            <option {{ $car->p3k === '0' ? 'selected' : null }} value="0">Tidak Tersedia</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <select name="audio" id="audio" class="form-control">
                            {{-- <option value="" selected disabled>--- Pilih Status Audio ---</option> --}}
                            <option {{ $car->audio === '1' ? 'selected' : null }} value="1">Tersedia</option>
                            <option {{ $car->audio === '0' ? 'selected' : null }} value="0">Tidak Tersedia</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <select name="ac" id="ac" class="form-control">
                            {{-- <option value="" selected disabled>--- Pilih Status AC ---</option> --}}
                            <option {{ $car->ac === '1' ? 'selected' : null }} value="1">Tersedia</option>
                            <option {{ $car->ac === '0' ? 'selected' : null }} value="0">Tidak Tersedia</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <select name="charger" id="charger" class="form-control">
                            {{-- <option value="" selected disabled>--- Pilih Status Charger ---</option> --}}
                            <option {{ $car->charger === '1' ? 'selected' : null }} value="1">Tersedia</option>
                            <option {{ $car->charger === '0' ? 'selected' : null }} value="0">Tidak Tersedia</option>
                        </select>
                    </div>
                    <div class="text-center d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-2"><i class="bi bi-check-circle"></i> Save</button>
                        <button type="reset" class="btn btn-secondary"> <i class="bi bi-x-circle"></i> Reset</button>
                    </div>
                </form><!-- End No Labels Form -->

            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Form Edit Data Gambar Car</h5>
                <!-- No Labels Form -->

                <form class="row g-3" action="{{ route('cars.updateImage', $car->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <img src="{{ Storage::url($car->gambar) }}" width="200px"
                            class="img-thumbnail rounded align-items-center" alt="Gambar Mobil">
                    </div>
                    <div class="col-md-12">
                        <input type="file" name="gambar" id="gambar" class="form-control">
                    </div>
                    <div class="text-center d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-2"><i class="bi bi-check-circle"></i>
                            Save</button>
                        <button type="reset" class="btn btn-secondary"> <i class="bi bi-x-circle"></i> Reset</button>
                    </div>
                </form><!-- End No Labels Form -->
            </div>
        </div>
    </div>

@endsection
