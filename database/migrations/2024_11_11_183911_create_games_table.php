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
        Schema::create('games', function (Blueprint $table) {
            $table->id('id_game');
            $table->unsignedBigInteger('id_publisher'); // Cria a coluna manualmente
            $table->foreign('id_publisher') // Define a chave estrangeira
            ->references('id_publisher') // Aponta para 'id_publisher' em 'publishers'
            ->on('publishers')
                ->onDelete('cascade');
            $table->decimal('price', 10, 2);
            $table->string('name', 255);
            $table->enum('rating', [
                'Overwhelmingly Positive', 'Very Positive', 'Positive',
                'Mostly Positive', 'Mixed', 'Mostly Negative',
                'Negative', 'Very Negative', 'Overwhelmingly Negative'
            ])->nullable();

            $table->string('icon')->nullable();
            $table->string('banner')->nullable();
            $table->string('screenshot_1')->nullable();
            $table->string('screenshot_2')->nullable();
            $table->string('screenshot_3')->nullable();
            $table->string('screenshot_4')->nullable();

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
