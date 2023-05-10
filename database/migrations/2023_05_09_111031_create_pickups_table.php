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
        Schema::create('pickups', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(false);
            $table->boolean('is_official')->default(false);
            $table->string('name');
            $table->foreignId('veld')->constrained()->references('id')->on('velden');
            $table->integer('max_players');
            $table->integer('current_players');
            $table->time('start_time'); 
            $table->time('end_time');
            $table->string('description');
            $table->foreignId('group')->constrained()->references('id')->on('groups');
            $table->foreignId('creator')->constrained()->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pickups');
    }
};
