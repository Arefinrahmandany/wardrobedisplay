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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fName');
            $table->string('role')->default(2);
            $table->string('username');
            $table->string('slug');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('cell');
            $table->string('password');
            $table->string('address');
            $table->string('access_token')->nullable();
            $table->string('oauth_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
