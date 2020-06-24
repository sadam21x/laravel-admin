<?php

namespace App\Http\Controllers\transaksi;

use App\Categories;
use App\Product;
use App\Customer;
use App\User;
use App\Sales;
use App\SalesDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
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
        // dd($request);
        
        // return $request->product_name[1];
        // $product = DB::table('products')->get()->pluck('name');
        // $x = array();

        // foreach($product as $product){
        //     array_push($x, $product);
        // }

        // $end = last($x);
        // return count(Product::all());
        // return $end;


        // Insert sales table
        $sales = new Sales;
        $sales->customer_id = $request->customer_id;
        $sales->user_id = $request->user_id;
        $sales->total_payment = $request->total_payment;
        $sales->payment_method = $request->payment_method;
        $sales->card_number = $request->card_number;
        $sales->save();

        // Mendapatkan nota id
        $arr_sales = DB::table('sales')->get()->pluck('id');
        $arr_sales2 = array();
        foreach($arr_sales as $arr_sales){
            array_push($arr_sales2, $arr_sales);
        }
        $nota_id = last($arr_sales2);

        // insert sales detail table
        $jumlah_item = count($request->product_id);

        for( $i = 0; $i < $jumlah_item; $i++ ){
            $sales_detail = new SalesDetail;
            $sales_detail->nota_id = $nota_id;
            $sales_detail->product_id = $request->product_id[$i];
            $sales_detail->quantity = $request->product_qty[$i];
            $sales_detail->selling_price = $request->product_price[$i];
            $sales_detail->discount = $request->product_discount[$i];
            $sales_detail->total_price = $request->product_final_price[$i];
            $sales_detail->save();
            
        }

        return redirect('/riwayattransaksi')->with('status', 'Data transaksi berhasil disimpan');
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
