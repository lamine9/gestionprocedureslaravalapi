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
        Schema::create('product_order', function (Blueprint $table) {
           $table
               ->foreignIdFor(\App\Models\Product::class)
               ->constrained()
               ->cascadeOnDelete()
               ->cascadeOnUpdate();
           $table
               ->foreignIdFor(\App\Models\Order::class)
               ->constrained()
               ->cascadeOnUpdate()
               ->cascadeOnUpdate();
           $table->primary(["product_id", "order_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_order');
    }
};
