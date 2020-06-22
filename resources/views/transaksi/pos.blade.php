@extends('layouts/main')
@section('title', 'Point of Sales')
@section('extra-css')
<link rel="stylesheet" href="{{ asset('/css/pos.css') }}">
@endsection
@section('header-icon', 'fas fa-cash-register')
@section('header-title', 'Point of Sales')

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

    <div class="row">
        <div class="col-lg-12">
            <form action="">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="staff">Staff</label>
                        <input type="text" class="form-control" readonly value="Sadam" name="staff" id="staff">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="customer">Pelanggan</label>
                        <select id="customer" class="form-control">
                            @foreach ($customers as $customers)
                            <option value="{{ $customers->id }}">{{ $customers->first_name }} {{ $customers->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row my-2">
                    <h5>Tambah Produk</h5>
                </div>

                <div class="form-row mt-2">
                    <div class="form-group mx-2">
                        <label for="categories">Kategori</label>
                        <select id="categories" name="categories" class="form-control">
                            <option value="all">Semua</option>
                            @foreach (App\Categories::all() as $categories)
                            <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mx-2">
                        <label for="product">Produk</label>
                        <select id="product" name="product" class="form-control">
                            @foreach ($products as $products)
                            <option value="{{ $products->id }}">{{ $products->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4 mt-4">
                        <a class="btn btn-sm btn-success mt-2 text-white tombolTambahProduct">Tambah</a>
                    </div>
                </div>

                

                <table class="table table-hover table_item my-4">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Product ID</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Price</th>
                            <th scope="col">Discout (%)</th>
                            <th scope="col">Price Total</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                    </tbody>
                </table>

                <div class="form-group row mt-5">

                    <div class="form-group col-md-6">
                        <h3>Payment</h3>

                        <div class="form-group row">
                            <label for="price_total" class="col-sm-4 col-form-label">Price Total (IDR)</label>
                            <div class="col-sm-4">
                                <input type="text" readonly class="form-control-plaintext" id="price_total"
                                    name="price_total" value="0">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="discount_total" class="col-sm-4 col-form-label">Discount (IDR)</label>
                            <div class="col-sm-4">
                                <input type="text" readonly class="form-control-plaintext" id="discount_total"
                                    name="discount_total" value="0">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="final_price" class="col-sm-4 col-form-label">Final Price (IDR)</label>
                            <div class="col-sm-4">
                                <input type="text" readonly class="form-control-plaintext" id="final_price"
                                    name="final_price" value="0">
                            </div>
                        </div>

                    </div>

                    <div class="form-group col-md-4">
                        <h3>Payment Method</h3>

                        <div class="form-group">
                            <select id="payment_method" name="payment_method" class="form-control" value="">
                                <option value="cash">Cash</option>
                                <option value="ovo">OVO</option>
                                <option value="gopay">Gopay</option>
                                <option value="debit_card">Debit Card</option>
                            </select>

                            <div id="ifYes" class="mt-3" style="display: none;">
                                <input type="text" class="form-control" id="card_number" name="card_number"
                                    placeholder="card number">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary my-3">SAVE AND PRINT INVOICE</button>
                </div>

            </form>
        </div>
    </div>

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
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
        value="{{ old('name') }}" autocomplete="off">

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
{{-- Script modal dialog --}}
{{-- <script src="{{ asset('/js/modal-categories.js') }}"></script> --}}
<script src="{{ asset('/js/payment.js') }}"></script>
<script src="{{ asset('/js/pos.js') }}"></script>
@endsection
