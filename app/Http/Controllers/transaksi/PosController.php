<?php

namespace App\Http\Controllers\transaksi;

use App\Categories;
use App\Product;
use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $customers = Customer::all();
        $categories = Categories::all();
        return view('transaksi/pos', compact('products'), compact('customers'), compact('categories'));
    }

    // Menampilkan produk berdasarkan kategori
    public function product_category()
    {
        if( $_POST['id'] == 'all' ){
            $product = Product::all()->pluck('name', 'id');
            return json_encode($product);
        } else {
            $product = Product::where('category_id', $_POST['id'])
            ->pluck('name', 'id');
        }

        return json_encode($product);
    }

    // Menambahkan product ke daftar belanja
    public function addproduct()
    {
        $products = Product::find($_POST['id']);
        $products->get();
        $products->category_id = $products->categories->name;
        return json_encode($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
