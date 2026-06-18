<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->enum('delivery_method', [
                'Standard Delivery',
                'Express Delivery'
            ])->nullable()->after('status');

            $table->string('payment_method')->nullable()->after('delivery_method');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'delivery_method',
                'payment_method'
            ]);
        });
    }
};