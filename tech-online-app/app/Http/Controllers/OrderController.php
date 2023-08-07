<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function show()
    {
        $userId = auth()->user()->id;
        $orders = Order::where('userId', $userId)->orderBy('created_at', 'desc')->get();
        return view('user.order', compact('orders'));
    }

    public function detail($id)
    {
        $order = Order::find($id);
        if (!isset($order)) {
            abort(404);
        }
        $userId = auth()->user()->id;

        $listCart = DB::table('carts')
            ->join('Products', 'Carts.productId', '=', 'Products.id')
            ->select('Carts.*', 'Products.name', 'Products.price', 'Products.description', 'Products.category', 'Products.sale', 'Products.image_link')
            ->where('userId', $userId)
            ->where('orderId', $id)
            ->get();
        // dd($listCart);
        return view('user.detail', compact('order', 'listCart'));
    }

    public function cancel($id)
    {
        $order = Order::find($id);
        $order->status = 2;
        $order->save();
        return redirect()->route('user.order');
    }
}
