<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    protected $table = 'products';
    //
    public function show(Request $request){
        $products = DB::table($this->table);
        if($request->input('search')){
            $searchInput = $request->input('search');
            $searchInput = trim($searchInput);
            $searchInput = strtolower($searchInput);
            $products = $products->where('name', 'like', "%$searchInput%");
        }
        if($request->category){
            $products = $products->where('category', 'like', "$request->category");
        }
        $sortBy = $request->sortBy;
        $sortType = $request->sortType;
        if(in_array($sortBy, ['price', 'name']) && in_array($sortType, ['asc', 'desc'])){
            $products = $products->orderBy($sortBy, $sortType);
        }
        $products = $products->paginate(12)->appends($request->all());
        return view('pages.product', compact('products'));
    }

    public function details($id) {
        $product = DB::table($this->table)->where('id', '=', $id)->first();
        if(empty($product)) return abort(404);
        $img = Image::where('productId', $product->id)->get();
        return view('pages.details', compact('product', 'img'));
    }
}
