<?php

use App\Models\CustomerAddress;
use App\Models\User;
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
            $table->foreignIdFor(User::class);
            $table->enum('status', ['pending', 'processing', 'shipped', 'delivered', 'declined', 'canceled', 'refunded', 'failed']);
            $table->enum('payment_method', ['cash', 'credit_card', 'paypal', 'stripe']);
            $table->string('payment_id')->nullable();
            $table->enum('payment_status', ['pending', 'paid', 'failed']);
            $table->float('total_price');
            $table->foreignIdFor(CustomerAddress::class);
            $table->boolean('archived')->default(false);
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
