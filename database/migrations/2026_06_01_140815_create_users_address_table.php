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
        Schema::create('users_address', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email_address')->nullable();

            $table->string('street');
            $table->string('city');
            $table->string('postal_code');
            $table->string('state');
            $table->string('phone_number');
            $table->enum('address_type', ['invoice', 'shipping']);

            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users_address');
    }
};
