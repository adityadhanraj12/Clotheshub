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

            $table->foreignId('collection_id')
                ->constrained('collections')
                ->onDelete('cascade');

            $table->foreignId('brand_id')
                ->constrained('brands')
                ->onDelete('cascade');

            $table->string('name');
            $table->text('description')->nullable();
            $table->string('base_price');
            $table->string('image_url')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
