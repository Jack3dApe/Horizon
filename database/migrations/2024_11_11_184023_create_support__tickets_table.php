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
        Schema::create('support_tickets', function (Blueprint $table) {
            $table->id('id_ticket');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->text('issue_description');
            $table->enum('status', ['Open', 'In Progress', 'Closed'])->default('Open');
            $table->date('creation_date');
            $table->date('resolution_date')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support__tickets');
    }
};
