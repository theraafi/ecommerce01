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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category_id');
            $table->string('sku');
            $table->float('purchase_price', 8, 2);
            $table->float('mrp', 8, 2);
            $table->float('discounted_price', 8, 2)->nullable();
            $table->string('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->longText('additional_information')->nullable();
            $table->string('thumbnail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
