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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->enum('type', ['fixed', 'percentage']);
            $table->integer('value');
            $table->integer('min_order_amount')->nullable();
            $table->integer('max_discount_amount')->nullable();
            $table->integer('usage_limit')->nullable();
            $table->integer('usage_per_user')->nullable();
            $table->dateTime('valid_from');
            $table->dateTime('valid_to');
            $table->boolean('is_active')->default(true);
            $table->text('description')->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};