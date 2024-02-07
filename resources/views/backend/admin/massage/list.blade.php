@extends('backend.layouts.index')
@section('title', 'List Massage')
@section('title_page', 'List Massage')
@section('breadcrumb', 'List Massage')
@section('content')

    {{-- alert --}}
    @if (session()->has('massage-delete'))
        <div class="alert alert-{{ session()->get('alert-type-massage-delete') }} alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            {{ session()->get('massage-delete') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="col-lg-12">
        {{-- <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('cars.create') }}" class="btn btn-primary rounded">
                <i class="bi bi-plus-circle"></i> Data
            </a>
        </div> --}}
        <div class="card ps-3 pe-3">
            <h5 class="card-title">Tables Massage</h5>
            <div class="card-body">
                <!-- Table with stripped rows -->
                <table class="table datatable table-responsive table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Pesan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesan as $pesans)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $pesans->name }}</td>
                                <td>{{ $pesans->email }}</td>
                                <td>{{ $pesans->subject }}</td>
                                <td>{{ $pesans->pesan }}</td>
                                <td>
                                    <form onclick="return confirm('Yakin Anda Ingin Menghapus Data Ini?')"
                                        action="{{ route('massage.delete', $pesans->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-xs btn-danger"><i
                                                class="bi bi-trash"></i></button>
                                    </form>
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
