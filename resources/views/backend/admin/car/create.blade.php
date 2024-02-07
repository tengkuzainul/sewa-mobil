@extends('backend.layouts.index')
@section('title', 'Create Data Cars')
@section('title_page', 'Create Data Cars')
@section('breadcrumb', 'Create Data Cars')
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

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Form Tambah Data Cars</h5>
                <!-- No Labels Form -->

                <form class="row g-3" action="{{ route('cars.save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <input type="text" name="nama_mobil" class="form-control" placeholder="Nama Mobil"
                            value="{{ old('nama_mobil') }}">
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="harga_sewa" class="form-control" placeholder="Harga Sewa"
                            value="{{ old('harga_sewa') }}">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="bahan_bakar" class="form-control" placeholder="Bahan Bakar"
                            value="{{ old('bahan_bakar') }}">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="jumlah_kursi" class="form-control" placeholder="Jumlah Kursi"
                            value="{{ old('jumlah_kursi') }}">
                    </div>
                    <div class="col-6">
                        <select name="tranmisi" id="tranmisi" class="form-control">
                            <option value="" selected disabled>--- Pilih Tranmisi ---</option>
                            <option value="Manual">Manual</option>
                            <option value="Otomatis">Otomatis</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <select name="status" id="status" class="form-control">
                            <option value="" selected disabled>--- Pilih Status ---</option>
                            <option value="Tersedia">Tersedia</option>
                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="deskripsi" class="mb-1">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control"> {{ old('deskripsi') }}</textarea>
                    </div>
                    <div class="col-6">
                        <select name="p3k" id="p3k" class="form-control">
                            <option value="" selected disabled>--- Pilih Status P3K ---</option>
                            <option value="1">Tersedia</option>
                            <option value="0">Tidak Tersedia</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <select name="audio" id="audio" class="form-control">
                            <option value="" selected disabled>--- Pilih Status Audio ---</option>
                            <option value="1">Tersedia</option>
                            <option value="0">Tidak Tersedia</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <select name="ac" id="ac" class="form-control">
                            <option value="" selected disabled>--- Pilih Status AC ---</option>
                            <option value="1">Tersedia</option>
                            <option value="0">Tidak Tersedia</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <select name="charger" id="charger" class="form-control">
                            <option value="" selected disabled>--- Pilih Status Charger ---</option>
                            <option value="1">Tersedia</option>
                            <option value="0">Tidak Tersedia</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <input type="file" name="gambar" id="gambar" class="form-control">
                    </div>
                    <div class="text-center d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-2"><i class="bi bi-check-circle"></i> Save</button>
                        <button type="reset" class="btn btn-secondary"> <i class="bi bi-x-circle"></i> Reset</button>
                    </div>
                </form><!-- End No Labels Form -->

            </div>
        </div>
    </div>

@endsection
