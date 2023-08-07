<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    protected $table = 'products';
    public function index(Request $request){
        $products = DB::table($this->table);
        if($request->input('search')){
            $searchInput = '%'.$request->input('search').'%';
            $products = $products->where('name', 'like', "$searchInput");
        }
        $products = $products->get();
        return view('admin.product-info', compact('products'));
    }
    public function addProduct(){
        return view('admin.product-add');
    }

    public function postProduct(ProductRequest $request){
        $request->validated();
        $files = [];
        if($request->hasfile('image'))
		{
			foreach($request->file('image') as $file)
			{
			    $name = time().rand(1,100).'.'.$file->extension();
			    $file->move(public_path('files'), $name);
			    $files[] = 'files/'.$name;
			}
		}
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->sale = $request->sale;
        $product->created_at = date('Y-m-d h:i:s');
        $product->image_link = $files[0];
        $product->save();
        foreach($files as $file){
            DB::table('images')->insert([
                'link' => $file,
                'productId' => $product->id,
                'created_at' => date('Y-m-d h:i:s')
            ]);
        }
        return redirect()->route('admin.product.info');
    }

    public function getEdit($id){
        $product = DB::table($this->table)->where('id', $id)->first();
        $images = DB::table('images')->where('productId', $id)->get();
        if(empty($product)) return abort(404);
        return view('admin.product-edit', compact('product', 'images'));
    }
    public function postEdit(ProductRequest $request){
        $request->validated();
        $files = [];
        if($request->hasfile('files'))
		{
			foreach($request->file('files') as $file)
			{
			    $name = time().rand(1,100).'.'.$file->extension();
			    $file->move(public_path('files'), $name);
			    $files[] = 'files/'.$name;
			}
		}
        foreach($files as $file){
            DB::table('images')->insert([
                'link' => $file,
                'productId' => $request->id,
                'created_at' => date('Y-m-d h:i:s')
            ]);
        }
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->sale = $request->sale;
        $product->created_at = date('Y-m-d h:i:s');
        if(empty($product->image_link)) $product->image_link = $files[0];
        $product->save();
        DB::table($this->table)
            ->where('id', $request->input('id'))
            ->update([
                'name'=> $request->input('name'),
                'category'=> $request->input('category'),
                'description'=> $request->input('description'),
                'price'=> $request->input('price'),
                'sale'=> $request->input('sale'),
                'updated_at' => date('Y-m-d h:i:s')
            ]);
        return redirect()->back();
    }

    public function delete($id){
        $images = DB::table('images')->where('productId', $id)->get();
        foreach ($images as $img) {
            unlink($img->link);
        }
        DB::table($this->table)->delete($id);
        return redirect()->route('admin.product.info');
    }

    public function deleteImg($productId, $imgId){
        $img = Image::find($imgId);
        $product = Product::find($productId);
        unlink($img->link);
        $img->delete();
        $img_link = Image::where('productId', $productId)->first()->link;
        if(empty($product->image_link)) $product->image_link = $img_link?$img_link:"";
        $product->save();
        return redirect()->back();
    }

}
