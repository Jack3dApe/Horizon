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
        Schema::create('libraries', function (Blueprint $table) {
            $table->id('id_library');
            $table->foreignId('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreignId("id_game")->references('id_game')->on('games')->onDelete('cascade');
            $table->foreignId('id_order')->nullable()->references('id_order')->on('orders')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libraries');
    }
};
