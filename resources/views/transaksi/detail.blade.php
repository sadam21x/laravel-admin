@extends('layouts/main')
@section('title', 'Riwayat Transaksi | Detail')
@section('extra-css')
<link rel="stylesheet" href="{{ asset('/css/riwayat.css') }}">
@endsection
@section('header-icon', 'fas fa-history')
@section('header-title', 'Riwayat Transaksi | Detail')

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

    <div class="top-detail">
        <div class="form-group row">
            <label for="user" class="col-sm-2 col-form-label">Staff</label>
            <div class="col-sm-4">
                <input type="text" readonly name="user" id="user" class="form-control-plaintext"
                    value="{{ App\User::where('id', $sales->user_id)->value('name') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="customer" class="col-sm-2 col-form-label">Pelanggan</label>
            <div class="col-sm-4">
                <input type="text" readonly name="customer" id="customer" class="form-control-plaintext"
                    value="{{ App\Customer::where('id', $sales->customer_id)->value('first_name') }} {{ App\Customer::where('id', $sales->customer_id)->value('last_name') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="date" class="col-sm-2 col-form-label">Tanggal</label>
            <div class="col-sm-4">
                <input type="text" readonly name="date" id="date" class="form-control-plaintext"
                    value="{{ $sales->created_at }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="total_payment" class="col-sm-2 col-form-label">Total Transaksi</label>
            <div class="col-sm-4">
                <input type="text" readonly name="total_payment" id="total_payment" class="form-control-plaintext"
                    value="Rp {{ $sales->total_payment }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="payment_method" class="col-sm-2 col-form-label">Metode Transaksi</label>
            <div class="col-sm-4">
                <input type="text" readonly name="payment_method" id="payment_method" class="form-control-plaintext"
                    value="{{ $sales->payment_method }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="card_number" class="col-sm-2 col-form-label">Card Number</label>
            <div class="col-sm-4">
                <input type="text" readonly name="card_number" id="card_number" class="form-control-plaintext"
                    value="{{ $sales->card_number }}">
            </div>
        </div>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID PRODUK</th>
                <th scope="col">NAMA PRODUK</th>
                <th scope="col">QTY</th>
                <th scope="col">HARGA SATUAN (Rp)</th>
                <th scope="col">DISKON (%)</th>
                <th scope="col">HARGA AKHIR (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales_detail as $sales_detail)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $sales_detail->product_id }}</td>
                <td>{{ App\Product::where('id', $sales_detail->product_id)->value('name') }}</td>
                <td>{{ $sales_detail->quantity }}</td>
                <td>{{ $sales_detail->selling_price }}</td>
                <td>{{ $sales_detail->discount }}</td>
                <td>{{ $sales_detail->total_price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('extra-script')
{{-- Script modal dialog --}}
{{-- <script src="{{ asset('/js/modal-products.js') }}"></script>
<script src="{{ asset('/js/product-detail.js') }}"></script>
<script src="{{ asset('/js/product-description.js') }}"></script> --}}
@endsection
