@extends('layouts/main')
@section('title', 'Categories')
@section('extra-css')
<link rel="stylesheet" href="{{ asset('/css/categories.css') }}">
@endsection
@section('header-icon', 'fas fa-stream')
@section('header-title', 'Categories')

@section('konten')
<div class="col-md-12">
    {{-- Alert status --}}
    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('status') }}
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <button type="button" class="tomboltambahdata btn btn-primary mb-3" data-toggle="modal" data-target="#modal-form">
        <i class="fas fa-plus-square mr-1"></i>
        TAMBAH KATEGORI BARU
    </button>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID KATEGORI</th>
                <th scope="col">NAMA KATEGORI</th>
                <th colspan="2" scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $categories)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $categories->id }}</td>
                <td>{{ $categories->name }}</td>
                <td class="aksi">
                    <a href="" class="tomboleditdata btn btn-sm btn-info" data-id="{{ $categories->id }}" data-toggle="modal" data-target="#modal-form">
                        <i class="fas fa-edit mr-1"></i>
                        EDIT
                    </a>
                    
                    <form action="{{ route('categories-delete', $categories->id) }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf

                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data kategori ini?');">
                            <i class="fas fa-trash-alt mr-1"></i>
                            DELETE
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-form" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-form-lable">Tambah Kategori Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('categories-add') }}" method="POST">
                    @csrf

                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name" class="col-form-label">Nama Kategori:</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}" autocomplete="off">

                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
                        <button type="submit" class="btn btn-primary">TAMBAH</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-script')
{{-- Script modal dialog --}}
<script src="{{ asset('/js/modal-categories.js') }}"></script>
@endsection
