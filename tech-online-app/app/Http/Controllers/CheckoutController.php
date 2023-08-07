<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    protected $table = 'Carts';

    public function show(){
        $userId = auth()->user()->id;
        $carts = DB::table($this->table)
            ->join('Products', 'Carts.productId', '=', 'Products.id')
            ->select('Carts.*', 'Products.name', 'Products.price', 'Products.description', 'Products.category', 'Products.sale', 'Products.image_link')
            ->where('userId', $userId)
            ->where('status', 'like', 'No')
            ->get();
        if($carts->count()==0) return redirect()->route('cart');
        return view('pages.checkout', compact('carts'));
    }

    public function checkout(Request $request){

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);
        $userId = auth()->user()->id;
        $order = new Order;
        $order->name = $request->name;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->total = $request->total;
        $order->created_at = date('Y-m-d h:i:s');
        $order->userId = $userId;
        $order->save();
        DB::table('carts')
        ->where('userId', $userId)
        ->where('Status', 'like', 'No')
        ->update(['Status' => 'Yes', 'orderId' => $order->id, 'updated_at' => date('Y-m-d h:i:s')]);
        return redirect()->route('checkout.success');
    }
}
