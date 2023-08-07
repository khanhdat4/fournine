<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $sales = DB::table('products')->where('sale', '!=', '0')->get();
        $products = DB::table('products')->limit(8)->orderBy('created_at', 'asc')->get();
        return view('pages.home', compact('sales', 'products'));
    }
}
