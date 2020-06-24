@extends('layouts/main')
@section('title', 'Users')
@section('extra-css')
<link rel="stylesheet" href="{{ asset('/css/users.css') }}">
@endsection
@section('header-icon', 'fas fa-users-cog')
@section('header-title', 'Users')

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

    {{-- <button type="button" class="tomboltambahdata btn btn-primary mb-3" data-toggle="modal" data-target="#modal-form">
        <i class="fas fa-plus-square mr-1"></i>
        TAMBAH KATEGORI BARU
    </button> --}}

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID USER</th>
                <th scope="col">NAMA USER</th>
                <th scope="col">EMAIL</th>
                {{-- <th scope="col">AKSI</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $users)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $users->id }}</td>
                <td>{{ $users->name }}</td>
                <td>{{ $users->email }}</td>
                {{-- <td class="aksi">
                    <a href="" class="tomboleditdata btn btn-sm btn-info" data-id="{{ $users->id }}" data-toggle="modal" data-target="#modal-form">
                        <i class="fas fa-edit mr-1"></i>
                        EDIT
                    </a>
                    
                    <form action="{{ url('/categories', $categories->id) }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf

                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data kategori ini?');">
                            <i class="fas fa-trash-alt mr-1"></i>
                            DELETE
                        </button>
                    </form>
                </td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal -->
{{-- <div class="modal fade" id="modal-form" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
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
                <form action="{{ url('/categories') }}" method="POST">
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
</div> --}}
@endsection

@section('extra-script')
@endsection
