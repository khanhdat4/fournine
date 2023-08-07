<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('Carts', function (Blueprint $table) {
            $table->foreign('userId')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('productId')->references('id')->on('products')->onDelete('CASCADE');
            $table->foreign('orderId')->references('id')->on('orders')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Cart', function (Blueprint $table) {
            //
        });
    }
};
