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
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('sku')->unique();

            $table->string('picture')->nullable();
            $table->string('banner')->nullable();
            $table->json('images')->nullable();

            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();

            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands');

            $table->unsignedBigInteger('product_attr_group_id');
            $table->foreign('product_attr_group_id')->references('id')->on('brands')->onDelete('cascade');

            $table->decimal('price', 18, 2)->default(0);
            $table->decimal('sale_price', 18, 2)->default(0);
            $table->decimal('cost_price', 18, 2)->nullable();

            $table->boolean('in_stock')->default(true);
            $table->integer('stock')->default(1);

            // Status & Flags
            $table->unsignedBigInteger('order_id')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('status')->default(1);

            // Indexes
            $table->index(['status', 'price']);
            $table->index(['brand_id']);

            $table->timestamps();
        });


        Schema::create('category_product', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')
                ->constrained('products')
                ->cascadeOnDelete();

            $table->foreignId('category_id')
                ->constrained('categories')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('category_product');
    }
};
