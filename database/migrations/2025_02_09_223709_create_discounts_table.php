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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id('id_discount');
            $table->decimal('discount_percentage', 5, 2)->nullable();
            $table->decimal('fixed_discount', 10, 2)->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();

            $table->foreignId("id_game")->references('id_game')->on('games')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
