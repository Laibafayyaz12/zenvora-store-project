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
        Schema::create('orders', function (Blueprint $table) {

            $table->id();

            // 👤 USER RELATION
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            // 💰 ORDER TOTAL
            $table->decimal('total', 10, 2)->default(0);

            // 📦 ORDER STATUS
            $table->string('status')->default('pending');

            // 📍 CUSTOMER INFO (CHECKOUT DATA)
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();

            // 💳 PAYMENT METHOD (future ready)
            $table->string('payment_method')->nullable();

            // 🧾 TRACKING
            $table->string('tracking_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};