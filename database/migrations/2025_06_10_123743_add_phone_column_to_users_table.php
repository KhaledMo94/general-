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
            $table->string('phone_number',15);
            $table->string('country_code',5)->default('+20');
            $table->unique(['country_code','phone_number'],'phone');
            $table->timestamp('phone_verified_at')->nullable()->default(null);
            $table->enum('sex',['m','f'])->default('m');
            $table->string('image')->nullable()->default(null);
            $table->enum('status',['active','inactive'])->default('active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone_number',
                'country_code',
                'phone_verified_at',
                'sex',
                'status',
            ]);
        });
    }
};
