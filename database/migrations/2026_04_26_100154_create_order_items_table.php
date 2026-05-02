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
        Schema::create('order_items', function (Blueprint $table) {

            $table->id();

            // 🧾 ORDER RELATION
            $table->foreignId('order_id')
                ->constrained()
                ->onDelete('cascade');

            // 📦 PRODUCT RELATION (BEST PRACTICE)
            $table->foreignId('product_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');

            // 🛍️ SNAPSHOT DATA (ORDER TIME SAFE COPY)
            $table->string('product_name');
            $table->decimal('price', 10, 2);

            // 🔢 QUANTITY
            $table->integer('quantity')->default(1);

            // 💰 TOTAL FOR ITEM (optional but useful)
            $table->decimal('subtotal', 10, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};