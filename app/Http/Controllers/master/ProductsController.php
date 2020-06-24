<?php

namespace App\Http\Controllers\master;

use App\Product;
use App\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();
        $products = Product::all();
        return view('master/products/index', compact('categories'), compact('products'));
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
        // Validating request
        $rules = [
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'explanation' => 'required'
        ];

        $custommessage = [
            'category_id.required' => 'Anda belum menentukan kategori untuk produk ini.',
            'name.required' => 'Nama produk wajib diisi.',
            'price.required' => 'Harga produk wajib diisi.',
            'stock.required' => 'Stok produk wajib diisi.',
            'explanation.required' => 'Deskripsi produk wajib diisi.'
        ];

        $this->validate($request, $rules, $custommessage);

        // Store data to database and redirect user to categories index with alert status
        Product::create($request->all());

        return redirect('/products')->with('status', 'Data produk baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $products = Product::find($_POST['id']);
        $products->get();
        $products->category_id = $products->categories->name;
        return json_encode($products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $products = Product::find($_POST['id']);
        $products->get();
        return json_encode($products);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // Validating request
        $rules = [
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'explanation' => 'required'
        ];

        $custommessage = [
            'category_id.required' => 'Anda belum menentukan kategori untuk produk ini.',
            'name.required' => 'Nama produk wajib diisi.',
            'price.required' => 'Harga produk wajib diisi.',
            'stock.required' => 'Stok produk wajib diisi.',
            'explanation.required' => 'Deskripsi produk wajib diisi.'
        ];

        $this->validate($request, $rules, $custommessage);

        // Store data to database and redirect user to categories index with alert status
        Product::where('id', $request->id)
            ->update([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock,
                'explanation' => $request->explanation
            ]);

        return redirect('/products')->with('status', 'Perubahan data berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('/products')->with('status', 'Data produk berhasil dihapus');
    }
}
