<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    protected $table = "Carts";
    public function show()
    {
        $userId = auth()->user()->id;
        $carts = DB::table($this->table)
            ->join('Products', 'Carts.productId', '=', 'Products.id')
            ->select('Carts.*', 'Products.name', 'Products.price', 'Products.description', 'Products.category', 'Products.sale', 'Products.image_link')
            ->where('userId', $userId)
            ->where('status', 'like', 'No')
            ->get();

        return view('pages.cart', compact('carts'));
    }
    public function add(Request $request)
    {
        $product = Product::find($request->id);
        if (!isset($product)) {
            return response()->json(['status' => 'error'], 422);
        }

        $productId = $product->id;
        $quantity = $request->quantity;
        $userId = auth()->user()->id;
        $cartItem = DB::table($this->table)
            ->where('userId', $userId)
            ->where('status', 'like', 'No')
            ->where('productId', $productId)->first();
        if (!isset($cartItem)) {
            $cartItem = array(
                'userID' => $userId,
                'productId' => $productId,
                'quantity' => $quantity,
                'status' => 'No',
                'created_at' => date('Y-m-d h:i:s'),
            );
            DB::table($this->table)->insert($cartItem);
        } else {
            $add = $request->add;
            if (isset($add)) {
                $item = DB::table($this->table)
                    ->where('userId', $userId)
                    ->where('productId', $productId)
                    ->where('status', 'like', 'No')
                    ->first();
                $quantity = $item->quantity + $quantity;
            }
            DB::table($this->table)
                ->where('userId', $userId)
                ->where('productId', $productId)
                ->where('status', 'like', 'No')
                ->update(['quantity' => $quantity, 'updated_at' => date('Y-m-d h:i:s')]);
        }
        $cartCount = getProductQuantity();
        return response()->json(['msg' => 'Add success', 'cartCount' => $cartCount]);
    }

    public function update(Request $request)
    {
        $userId = auth()->user()->id;
        $id = $request->id;
        if(!DB::table($this->table)
            ->where('userId', $userId)
            ->where('status', 'like', 'No')
            ->where('id', $id)
            ->first()) return response()->json(['error' => 'Invalid id'], 422);
        DB::table($this->table)
            ->where('userId', $userId)
            ->where('status', 'like', 'No')
            ->where('id', $id)
            ->update(['quantity' => $request->quantity, 'updated_at' => date('Y-m-d h:i:s')]);
        $subtotal = DB::table(function ($query) use ($userId) {
            $query->selectRaw('(Carts.quantity * (Products.price - Products.price/100*Products.sale)) as total')
                ->from('Carts')
                ->join('Products', 'Carts.productId', '=', 'Products.id')
                ->where('userId', $userId)
                ->where('status', 'like', 'No');
        }, 'Carts')
            ->sum('total');
        return response()->json(['msg' => "Cập nhật thành công", 'subtotal' => $subtotal]);
    }

    public function remove(Request $request)
    {
        $userId = auth()->user()->id;
        $id = $request->id;
        DB::table($this->table)
            ->where('userId', $userId)->where('status', 'like', 'No')
            ->where('id', $id)
            ->delete();
        return redirect()->route('cart');
    }
}
