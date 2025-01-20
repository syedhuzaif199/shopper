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
            // sqlite does not support enum, so use check instead
            // $table->enum('discount_type', ['fixed', 'percentage']);
            $table->string('discount_type')->check('discount_type IN ("fixed", "percentage")');
            $table->integer('discount_value');
            $table->string('coupon_type')->check('coupon_type IN ("general", "user_specific")');
            $table->integer('min_order_amount')->nullable();
            $table->integer('max_discount_amount')->nullable();
            $table->integer('usage_limit')->nullable();
            $table->integer('usage_per_user')->nullable();
            $table->dateTime('expiry_date');
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
