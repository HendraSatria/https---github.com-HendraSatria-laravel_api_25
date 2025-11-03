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
            $table->unsignedBigInteger('product_category_id'); // penting: harus sama tipe-nya
            $table->string('name');
            $table->decimal('price', 10, 2);
            $table->timestamps();
        
            $table->foreign('product_category_id')
                  ->references('id')
                  ->on('product_categories')
                  ->onDelete('restrict');
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
