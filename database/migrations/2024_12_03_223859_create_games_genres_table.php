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
        Schema::create('games_genres', function (Blueprint $table) {
            $table->foreignId('id_genre')->references('id_genre')->on('genres')->onDelete('cascade');
            $table->foreignId('id_game')->references('id_game')->on('games')->onDelete('cascade');
            $table->primary(['id_genre', 'id_game']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games_genres');
    }
};
