@extends('backend.layouts.index')
@section('title', 'List Cars')
@section('title_page', 'List Cars')
@section('breadcrumb', 'List Cars')
@section('content')

    {{-- alert --}}
    @if (session()->has('massage'))
        <div class="alert alert-{{ session()->get('alert-type') }} alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            {{ session()->get('massage') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- alert --}}
    @if (session()->has('massage-delete'))
        <div class="alert alert-{{ session()->get('alert-type-delete') }} alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            {{ session()->get('massage-delete') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- alert --}}
    @if (session()->has('massage-update'))
        <div class="alert alert-{{ session()->get('alert-type-update') }} alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            {{ session()->get('massage-update') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="col-lg-12">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('cars.create') }}" class="btn btn-primary rounded">
                <i class="bi bi-plus-circle"></i> Data
            </a>
        </div>
        <div class="card ps-3 pe-3">
            <h5 class="card-title">Tables Cars</h5>
            <div class="card-body">
                <!-- Table with stripped rows -->
                <table class="table datatable table-responsive table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Nama Mobil</th>
                            <th scope="col">Harga Sewa</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($car as $cars)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td class="w-25">
                                    <img src="{{ asset('storage/' . $cars->gambar) }}" alt="Gambar Mobil" class="img-fluid"
                                        style="width: 150px">
                                </td>
                                <td>{{ $cars->nama_mobil }}</td>
                                <td>Rp. {{ number_format($cars->harga_sewa) }}</td>
                                <td>{{ $cars->status }}</td>
                                <td>
                                    <div class="d-flex justify-content-arround">
                                        <a href="{{ route('cars.edit', $cars->id) }}"
                                            class="btn btn-xs btn-warning me-2"><i class="bi bi-pencil-square"></i></a>
                                        <form onclick="return confirm('Yakin Anda Ingin Menghapus Data Ini?')"
                                            action="{{ route('cars.delete', $cars->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-xs btn-danger"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

            </div>
        </div>

    </div>
@endsection
