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
            $table->id('id_user'); // id_user como PRIMARY KEY com auto incremento
            $table->string('username', 50); // Campo username com VARCHAR(50)
            $table->string('password', 50); // Campo password com VARCHAR(50)
            $table->string('email', 100); // Campo email com VARCHAR(100)
            $table->string('phone', 15)->nullable(); // Campo phone com VARCHAR(15) e opcional
            $table->integer('purchases')->default(0); // Campo purchases com valor default 0
            $table->string('profile_pic', 250)->nullable(); // Campo profile_pic com VARCHAR(250) e opcional
            $table->enum('role', ['client', 'admin']); // Campo role como ENUM
            $table->boolean('is_2fa_enabled')->default(false); // Campo is_2fa_enabled com valor default FALSE
            $table->timestamps(); // Campos created_at e updated_at
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
