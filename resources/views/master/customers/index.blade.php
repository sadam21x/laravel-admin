@extends('layouts/main')
@section('title', 'Customers')
@section('extra-css')
<link rel="stylesheet" href="{{ asset('/css/customers.css') }}">
@endsection
@section('header-icon', 'fas fa-user-friends')
@section('header-title', 'Customers')

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
        TAMBAH PELANGGAN BARU
    </button>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID PELANGGAN</th>
                <th scope="col">NAMA PELANGGAN</th>
                <th colspan="3" scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customers)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $customers->id }}</td>
                <td>{{ $customers->first_name }} {{ $customers->last_name }}</td>
                <td class="aksi">
                    <button type="button" class="tomboldetail btn btn-sm btn-success" data-toggle="modal"
                            data-target="#customer-detail" data-id="{{ $customers->id }}">
                        <i class="fas fa-info-circle mr-1"></i>
                        Detail
                    </button>

                    <a href="" class="tomboleditdata btn btn-sm btn-info" data-id="{{ $customers->id }}" data-toggle="modal" data-target="#modal-form">
                        <i class="fas fa-edit mr-1"></i>
                        EDIT
                    </a>

                    <form action="{{ route('customers-delete', $customers->id) }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf

                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data pelanggan ini?');">
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

<!-- Input Data Modal -->
<div class="modal fade" id="modal-form" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-form-lable">Tambah Pelanggan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('customers-add') }}" method="POST">
                    @csrf

                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="first_name" class="col-form-label">Nama Depan:</label>
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name"
                            name="first_name" value="{{ old('first_name') }}" autocomplete="off">

                        @error('first_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="last_name" class="col-form-label">Nama Belakang (opsional):</label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                            name="last_name" value="{{ old('last_name') }}" autocomplete="off">

                        @error('last_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone" class="col-form-label">Nomor Telepon:</label>
                        <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone"
                            name="phone" value="{{ old('phone') }}" autocomplete="off">

                        @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email') }}" autocomplete="off">

                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="street" class="col-form-label">Alamat:</label>
                        <input type="text" class="form-control @error('street') is-invalid @enderror" id="street"
                            name="street" value="{{ old('street') }}" autocomplete="off">

                        @error('street')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="state" class="col-form-label">Provinsi:</label>
                        <select name="state" id="state" class="form-control">
                            <option value="">== Pilih Provinsi ==</option>
                            @foreach ($provinces as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="city" class="col-form-label">Kota/Kabupaten:</label>
                        <select name="city" id="city" class="form-control">
                            <option value="">== Pilih Kota/Kabupaten ==</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="zip_code" class="col-form-label">Kode Pos:</label>
                        <input type="number" maxlength="5" class="form-control @error('zip_code') is-invalid @enderror" id="zip_code"
                            name="zip_code" value="{{ old('zip_code') }}" autocomplete="off">

                        @error('zip_code')
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

<!-- Customer Detail Modal -->
<div class="modal fade" id="customer-detail" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-form-label">ID Pelanggan:</label>
                    <h5 id="detail-id"></h5>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Nama Pelanggan:</label>
                    <h5 id="detail-name"></h5>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Nomor Telepon:</label>
                    <h5 id="detail-phone"></h5>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Email:</label>
                    <h5 id="detail-email"></h5>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Alamat:</label>
                    <h5 id="detail-street"></h5>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Kota/Kabupaten:</label>
                    <h5 id="detail-city"></h5>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Provinsi:</label>
                    <h5 id="detail-state"></h5>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Kode Pos:</label>
                    <h5 id="detail-zip"></h5>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-script')
{{-- Script modal dialog --}}
<script src="{{ asset('/js/dropdown-customers.js') }}"></script>
<script src="{{ asset('/js/customer-detail.js') }}"></script>
<script src="{{ asset('/js/modal-customers.js') }}"></script>

@endsection
