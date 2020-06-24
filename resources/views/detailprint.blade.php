<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice | TaniStore</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <div class="kontainer">
        <div class="col-md-12">

            <div class="judul mt-3 mb-5 justify-content-center">
                <h2 class="text-center" style="text-decoration: underline;">INVOICE | TANISTORE</h2>
                <h6 class="text-center">Jl. Airlangga No. 5 Surabaya</h6>
                <h6 class="text-center">Telp. (031) 01010. <span style="color: blue">https://sadam.masuk.id</span></h6>
            </div>

            <table class="table table-borderless my-3 col-md-8">
                <tbody>
                    <tr>
                        <td><h5>Staff</h5></td>
                        <td><h5>{{ App\User::where('id', $sales->user_id)->value('name') }}</h5></td>
                    </tr>
                    <tr>
                        <td><h5>Pelanggan</h5></td>
                        <td><h5>{{ App\Customer::where('id', $sales->customer_id)->value('first_name') }} {{ App\Customer::where('id', $sales->customer_id)->value('last_name') }}</h5></td>
                    </tr>
                    <tr>
                        <td><h5>Tanggal</h5></td>
                        <td><h5>{{ $sales->created_at }}</h5></td>
                    </tr>
                    <tr>
                        <td><h5>Total Transaksi</h5></td>
                        <td><h5>IDR {{ $sales->total_payment }}</h5></td>
                    </tr>
                    <tr>
                        <td><h5>Metode Transaksi</h5></td>
                        <td><h5>{{ $sales->payment_method }}</h5></td>
                    </tr>
                    <tr>
                        <td><h5>Metode Transaksi</h5></td>
                        <td><h5>{{ $sales->card_number }}</h5></td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered">
                <thead class="">
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
    </div>
</body>

</html>
