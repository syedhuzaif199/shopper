<?php

use App\Models\Order;
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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_id')->unique()->nullable();
            $table->string('payment_method')->check('payment_method IN ("cash", "paypal")');
            $table->string('payment_status')->check('payment_status IN ("pending", "paid", "failed")');
            $table->string('payment_amount');
            $table->string('payment_currency');
            $table->foreignIdFor(Order::class);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
