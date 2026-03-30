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
            // 🔗 Relations
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            // $table->foreignId('vendor_id')->nullable()->constrained()->nullOnDelete();

            // 🧾 Order Info
            $table->string('order_number')->unique();
            $table->string('invoice_number')->nullable();

            // 💰 Pricing
            $table->decimal('subtotal', 12, 2)->default(0);
            $table->decimal('discount_amount', 12, 2)->default(0);
            $table->decimal('tax_amount', 12, 2)->default(0);
            $table->decimal('shipping_cost', 12, 2)->default(0);
            $table->decimal('total_amount', 12, 2);


            // 💳 Payment
            $table->string('payment_method')->nullable(); // bkash, nagad, card
            $table->string('payment_status')->default('pending'); // pending, paid, failed
            $table->string('transaction_id')->nullable();

            // 📦 Order Status
            $table->string('order_status')->default('pending');
            // pending, confirmed, processing, shipped, delivered, cancelled, returned

            // 🚚 Shipping Info
            $table->string('shipping_name');
            $table->string('shipping_phone');
            $table->string('shipping_email')->nullable();
            $table->text('shipping_address');
            $table->string('shipping_city')->nullable();
            $table->string('shipping_postcode')->nullable();
            $table->string('shipping_country')->default('Bangladesh');

            // 📝 Extra
            $table->text('notes')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->softDeletes();

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
