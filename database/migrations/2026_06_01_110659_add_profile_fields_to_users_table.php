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
    Schema::table('users', function (Blueprint $table) {
        $table->string('street')->nullable();
        $table->string('city')->nullable();
        $table->string('postal_code')->nullable();
        $table->string('state')->nullable();
        $table->string('profile_url')->nullable();
    });
}

public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn([
            'street',
            'city',
            'postal_code',
            'state',
            'profile_url',
        ]);
    });
}
};
