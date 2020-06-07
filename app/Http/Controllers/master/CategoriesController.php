<?php

namespace App\Http\Controllers\master;

use App\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();
        return view('master/categories/index', ['categories' => $categories]);
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
            'name' => 'required'
        ];

        $custommessage = [
            'name.required' => 'Nama kategori wajib diisi.'
        ];

        $this->validate($request, $rules, $custommessage);

        // Store data to database and redirect user to categories index with alert status
        Categories::create($request->all());
        return redirect('/categories')->with('status', 'Kategori baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $categories = Categories::find($_POST['id']);
        $categories->get();
        return json_encode($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categories $categories)
    {
        // Validating request
        $rules = [
            'name' => 'required'
        ];

        $custommessage = [
            'name.required' => 'Nama kategori wajib diisi.'
        ];

        $this->validate($request, $rules, $custommessage);

        Categories::where('id', $request->id)
            ->update([
                'name' => $request->name
            ]);

        return redirect('/categories')->with('status', 'Perubahan berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categories::destroy($id);
        return redirect('/categories')->with('status', 'Kategori berhasil dihapus');
    }
}
