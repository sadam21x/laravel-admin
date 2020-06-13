<?php

namespace App\Http\Controllers\master;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\Province;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        $provinces = Province::pluck('name', 'id');
        return view('master/customers/index', compact('customers'), compact('provinces'));
    }

    public function city(Request $request)
    {
        //
        $cities = City::where('province_id', $request->get('id'))
        ->pluck('name', 'id');

        return response()->json($cities);
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
            'first_name' => 'required',
            'phone' => 'required|max:12',
            'email' => 'required',
            'street' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zip_code' => 'required|max:5|min:5'
        ];

        $custommessage = [
            'first_name.required' => 'Nama depan wajib diisi.',
            'phone.required' => 'Nomor telepon wajib diisi.',
            'phone.max' => 'Panjang karaakter maksimal 12 digit.',
            'email.required' => 'Email wajib diisi.',
            'street.required' => 'Alamat pelanggan wajib diisi.',
            'state.required' => 'Anda belum memilih provinsi.',
            'city.required' => 'Anda belum memilih kota/kabupaten.',
            'zip_code.required' => 'Kode pos wajib diisi.',
            'zip_code.min' => 'Kode pos harus 5 digit.',
            'zip_code.max' => 'Kode pos harus 5 digit.',
        ];

        $this->validate($request, $rules, $custommessage);

        // Get province/state name
        $provinsi = Province::where('id', $request->state)
                    ->pluck('name');
        
        $provinsi = str_replace('["', '', $provinsi);
        $provinsi = str_replace('"]', '', $provinsi);

        // Store data to database and redirect user to categories index with alert status
        $customer = new Customer;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->street = $request->street;
        $customer->city = $request->city;
        $customer->state = $provinsi;
        $customer->zip_code = $request->zip_code;
        $customer->save();

        return redirect('/customers')->with('status', 'Data pelanggan baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $customers = Customer::find($_POST['id']);
        $customers->get();
        return json_encode($customers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $customers = Customer::find($_POST['id']);
        $customers->get();
        return json_encode($customers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        // Validating request
        $rules = [
            'first_name' => 'required',
            'phone' => 'required|max:12',
            'email' => 'required',
            'street' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zip_code' => 'required|max:5|min:5'
        ];

        $custommessage = [
            'first_name.required' => 'Nama kategori wajib diisi.',
            'phone.required' => 'Nomor telepon wajib diisi.',
            'phone.max' => 'Panjang karaakter maksimal 12 digit.',
            'email.required' => 'Email wajib diisi.',
            'street.required' => 'Alamat pelanggan wajib diisi.',
            'state.required' => 'Anda belum memilih provinsi.',
            'city.required' => 'Anda belum memilih kota/kabupaten.',
            'zip_code.required' => 'Kode pos wajib diisi.',
            'zip_code.min' => 'Kode pos harus 5 digit.',
            'zip_code.max' => 'Kode pos harus 5 digit.',
        ];

        $this->validate($request, $rules, $custommessage);

        // Get province/state name
        $provinsi = Province::where('id', $request->state)
                    ->pluck('name');
        
        $provinsi = str_replace('["', '', $provinsi);
        $provinsi = str_replace('"]', '', $provinsi);

        Customer::where('id', $request->id)
            ->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'email' => $request->email,
                'street' => $request->street,
                'city' => $request->city,
                'state' => $provinsi,
                'zip_code' => $request->zip_code
            ]);
        
        return redirect('/customers')->with('status', 'Perubahan berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::destroy($id);
        return redirect('/customers')->with('status', 'Data pelanggan berhasil dihapus');
    }
}
