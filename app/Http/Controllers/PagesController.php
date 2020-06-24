<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Customer;
use App\Product;
use App\User;

class PagesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $total_categories = Categories::count();
        $total_customer = Customer::count();
        $total_product = Product::count();
        $total_user = User::count();

        return view('dashboard', compact('total_categories'),
                compact('total_customer'), compact('total_product'), compact('total_user'));
    }
}
