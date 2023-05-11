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
        Schema::create('veld_statistics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('veld')->constrained()->references('id')->on('velden');
            $table->integer('wins')->default(0);
            $table->integer('losses')->default(0);
            $table->integer('misses')->default(0);
            $table->integer('makes')->default(0);
            $table->integer('points')->default(0);
            $table->integer('games_played')->default(0);
            $table->foreignId('user')->constrained()->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veld_statistics');
    }
};
