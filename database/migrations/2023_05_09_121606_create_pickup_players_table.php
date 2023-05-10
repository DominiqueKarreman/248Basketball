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
        Schema::create('pickup_players', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group')->constrained()->references('id')->on('groups');
            $table->foreignId('user')->constrained()->references('id')->on('users');
            $table->integer('current_wins')->default(0);
            $table->integer('current_losses')->default(0);
            $table->integer('current_misses')->default(0);
            $table->integer('current_makes')->default(0);
            $table->integer('current_points')->default(0);
            $table->integer('current_games_played')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pickup_players');
    }
};
