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
        Schema::create('additional_informations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')
                ->constrained()
                ->onDelete('cascade');

            $table->text('material')->nullable();
            $table->text('style')->nullable();
            $table->text('properties')->nullable();

            $table->foreignId('brand_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('additional_informations');
    }
};
