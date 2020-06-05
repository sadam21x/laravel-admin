@extends('layouts/main')
@section('title', 'Categories')
@section('extra-css')
<link rel="stylesheet" href="{{ asset('/css/categories.css') }}">
@endsection
@section('header-icon', 'fas fa-stream')
@section('header-title', 'Categories')

@section('konten')
<div class="col-md-10">
    <div class="tomboltambahdata btn btn-primary mb-3">
        <i class="fas fa-plus-square mr-1"></i>
        TAMBAH KATEGORI BARU
    </div>
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
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td class="aksi">
                    <a href="#" class="btn btn-info"><i class="fas fa-edit mr-1"></i>EDIT</a>
                    <a href="#" class="btn btn-danger"><i class="fas fa-trash-alt mr-1"></i>DELETE</a>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td class="aksi">
                    <a href="#" class="btn btn-info"><i class="fas fa-edit mr-1"></i>EDIT</a>
                    <a href="#" class="btn btn-danger"><i class="fas fa-trash-alt mr-1"></i>DELETE</a>
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td class="aksi">
                    <a href="#" class="btn btn-info"><i class="fas fa-edit mr-1"></i>EDIT</a>
                    <a href="#" class="btn btn-danger"><i class="fas fa-trash-alt mr-1"></i>DELETE</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
