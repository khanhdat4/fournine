<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function show(){
        $orders = Order::all();
        return view('admin.order-info', compact('orders'));
    }

    public function confirm(Request $request){
        $id = $request->id;
        $order = Order::find($id);
        $order->status = 1;
        $order->save();
        return back();
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
        return view('admin.order-detail', compact('order', 'listCart'));
    }
    public function cancel(Request $request){
        $id = $request->id;
        $order = Order::find($id);
        $order->status = 2;
        $order->save();
        return back();
    }
}
