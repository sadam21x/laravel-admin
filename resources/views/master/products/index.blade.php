@extends('layouts/main')
@section('title', 'Products')
@section('extra-css')
<link rel="stylesheet" href="{{ asset('/css/products.css') }}">
@endsection
@section('header-icon', 'fas fa-carrot')
@section('header-title', 'Products')

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
        TAMBAH PRODUK BARU
    </button>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID PRODUK</th>
                <th scope="col">NAMA PRODUK</th>
                <th colspan="3" scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $products)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $products->id }}</td>
                <td>{{ $products->name }}</td>
                <td class="aksi">
                    <button type="button" class="tomboldetail btn btn-sm btn-success" data-toggle="modal"
                            data-target="#product-detail" data-id="{{ $products->id }}">
                        <i class="fas fa-info-circle mr-1"></i>
                        Detail
                    </button>

                    <a href="" class="tomboleditdata btn btn-sm btn-info" data-id="{{ $products->id }}" data-toggle="modal" data-target="#modal-form">
                        <i class="fas fa-edit mr-1"></i>
                        EDIT
                    </a>

                    <form action="{{ url('/products', $products->id) }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf

                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data produk ini?');">
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
                <h5 class="modal-title" id="modal-form-lable">Tambah Produk Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/products') }}" method="POST">
                    @csrf

                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="category_id" class="col-form-label">Kategori:</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">== Pilih Kategori ==</option>
                            @foreach ($categories as $categories)
                            <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-form-label">Nama Produk:</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}" autocomplete="off">

                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price" class="col-form-label">Harga/Kg (Rp):</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                            name="price" value="{{ old('price') }}" autocomplete="off">

                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="stock" class="col-form-label">Stok Produk (Kg):</label>
                        <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock"
                            name="stock" value="{{ old('stock') }}" autocomplete="off">

                        @error('stock')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="explanation" class="col-form-label">Deskripsi Produk:</label>
                        <textarea id="description-textarea" class="form-control @error('explanation') is-invalid @enderror" rows="7"></textarea>

                        <input type="hidden" name="explanation" id="explanation" value="">

                        @error('explanation')
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
<div class="modal fade" id="product-detail" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-form-label">ID Produk:</label>
                    <h5 id="detail-id"></h5>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Kategori:</label>
                    <h5 id="detail-category"></h5>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Nama Produk:</label>
                    <h5 id="detail-name"></h5>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Harga/Kg (Rp):</label>
                    <h5 id="detail-price"></h5>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Stok Produk (Kg):</label>
                    <h5 id="detail-stock"></h5>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Deskripsi Produk:</label>
                    <p id="detail-explanation"></p>
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
{{-- <script src="{{ asset('/js/dropdown-customers.js') }}"></script>
--}}
<script src="{{ asset('/js/modal-products.js') }}"></script>
<script src="{{ asset('/js/product-detail.js') }}"></script>
<script src="{{ asset('/js/product-description.js') }}"></script>
@endsection
