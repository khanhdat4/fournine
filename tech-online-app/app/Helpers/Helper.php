<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

    function getProductQuantity(){
        $userId = Auth::user()->id;
        $productQuantity = DB::table('Carts')
            ->where('userId', $userId)
            ->where('status', 'like', 'No')
            ->count();
        return $productQuantity;
    }
    function getCategories(){
        return DB::table('categories')->select('name')->get();
    }
?>
