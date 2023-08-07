<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = File::get('database/data/product.json');
        $products = json_decode($json);

        foreach ($products as $key => $value) {
            Product::create([
                "name" => $value->name,
                "category" => $value->category,
                "description" => $value->description,
                "price" => $value->price,
                "sale" => 0,
                "image_link" => ""
            ]);
        }
    }
}
