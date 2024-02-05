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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->decimal('variant_price');
            $table->decimal('variant_specialPrice')->nullable();
            $table->integer('variant_quantity');
            $table->string('variant_sellerSKU')->nullable();
            $table->string('variant_colour')->nullable();
            $table->text('variant_image')->nullable(); // Assuming you want to store variant images as strings
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
        Schema::dropIfExists('product_variants');
    }
};
