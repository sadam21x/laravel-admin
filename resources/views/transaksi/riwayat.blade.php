@extends('layouts/main')
@section('title', 'Riwayat Transaksi')
@section('extra-css')
<link rel="stylesheet" href="{{ asset('/css/riwayat.css') }}">
@endsection
@section('header-icon', 'fas fa-history')
@section('header-title', 'Riwayat Transaksi')

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

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID TRANSAKSI</th>
                <th scope="col">TANGGAL</th>
                <th scope="col">STAFF</th>
                <th scope="col">PELANGGAN</th>
                <th scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sales)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $sales->id }}</td>
                <td>{{ $sales->created_at }}</td>
                <td>{{ App\User::where('id', $sales->user_id)->value('name') }}</td>
                <td>
                    {{ App\Customer::where('id', $sales->customer_id)->value('first_name') }}
                    {{ App\Customer::where('id', $sales->customer_id)->value('last_name') }}
                </td>
                <td class="aksi">
                    <a href="{{ url('/riwayattransaksi', $sales->id) }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-info-circle mr-1"></i>
                        Detail
                    </a>
                </td>
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
