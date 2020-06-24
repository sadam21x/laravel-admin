@extends('layouts/main')
@section('title', 'Dashboard')
@section('extra-css')
<link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">
@endsection
@section('header-icon', 'fas fa-tachometer-alt')
@section('header-title', 'Dashboard')

@section('konten')

<!-- Content -->
<div class="col-md-12">
    <!-- Overview jumlah product, customer, dan user -->
    <div class="row text-white">
        <div class="card bg-primary mr-2">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-stream mr-2"></i>
                </div>
                <h5 class="card-title">CATEGORIES</h5>
                <div class="display-4">
                    {{ $total_categories }}
                </div>
                <a href="{{ url('/categories') }}">
                    <p class="card-text text-white">
                        Lihat detail
                        <i class="fas fa-angle-double-right ml-2"></i>
                    </p>
                </a>
            </div>
        </div>

        <div class="card bg-info mr-2">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-carrot mr-2"></i>
                </div>
                <h5 class="card-title">PRODUCTS</h5>
                <div class="display-4">
                    {{ App\Product::count() }}
                </div>
                <a href="{{ url('/products') }}">
                    <p class="card-text text-white">
                        Lihat detail
                        <i class="fas fa-angle-double-right ml-2"></i>
                    </p>
                </a>
            </div>
        </div>

        <div class="card bg-danger mr-2">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-user-friends mr-2"></i>
                </div>
                <h5 class="card-title">CUSTOMERS</h5>
                <div class="display-4">
                    {{ $total_customer }}
                </div>
                <a href="{{ url('/customers') }}">
                    <p class="card-text text-white">
                        Lihat detail
                        <i class="fas fa-angle-double-right ml-2"></i>
                    </p>
                </a>
            </div>
        </div>

        <div class="card bg-success">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-users-cog mr-2"></i>
                </div>
                <h5 class="card-title">USERS</h5>
                <div class="display-4">
                    {{ App\User::count() }}
                </div>
                <a href="{{ url('/users') }}">
                    <p class="card-text text-white">
                        Lihat detail
                        <i class="fas fa-angle-double-right ml-2"></i>
                    </p>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- End of content -->

@endsection
