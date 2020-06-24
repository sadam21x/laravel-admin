<?php

namespace App\Http\Controllers\transaksi;

use App\Sales;
use App\SalesDetail;
use App\User;
use App\Customer;
use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
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
        $sales = Sales::all();
        return view('transaksi/riwayat', compact('sales'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sales = Sales::find($id);
        $sales->get();
        $sales_detail = SalesDetail::where('nota_id', $id)->get();
        
        return view('transaksi/detail', ['sales' => $sales], ['sales_detail' => $sales_detail]);
    }

    public function show_print($id)
    {
        $sales = Sales::find($id);
        $sales->get();
        $sales_detail = SalesDetail::where('nota_id', $id)->get();
        
        return view('detailprint', ['sales' => $sales], ['sales_detail' => $sales_detail]);
    }

    // Print Invoice
    public function print_invoice($id)
    {
        $sales = Sales::find($id);
        $sales->get();
        $sales_detail = SalesDetail::where('nota_id', $id)->get();

        // $pdf = PDF::loadView('transaksi/detail', ['sales' => $sales], ['sales_detail' => $sales_detail]);
        $pdf = PDF::loadView('detailprint', ['sales' => $sales], ['sales_detail' => $sales_detail]);
        return $pdf->download('coba.pdf');
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
