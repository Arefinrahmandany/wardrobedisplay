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
            $table->string('product_name')->nullable();
            $table->string('product_category')->nullable();
            $table->string('product_brand')->nullable();
            $table->string('material_name')->nullable();
            $table->string('product_waterproof')->nullable();
            $table->string('product_model')->nullable();
            $table->string('frame_colour')->nullable();
            $table->string('dial_size')->nullable();
            $table->string('watch_type')->nullable();
            $table->string('movement')->nullable();
            $table->string('resistance')->nullable();
            $table->string('product_feature')->nullable();
            $table->string('warranty_type')->nullable();
            $table->string('warranty')->nullable();
            $table->string('warranty_policy')->nullable();
            $table->text('highlight')->nullable();
            $table->double('price')->nullable();
            $table->double('discount_price')->nullable();
            $table->string('colour')->nullable();
            $table->string('SellerSKU')->nullable();
            $table->string('quantity')->nullable();
            $table->text('description')->nullable();
            $table->text('product_photo')->nullable(); // Assuming you want to store product images as JSON
            $table->boolean('status')->default(true);
            $table->boolean('trash')->default(false);
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
