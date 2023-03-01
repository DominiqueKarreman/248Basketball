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
        Schema::create('velden', function (Blueprint $table) {
            $table->id();
            $table->decimal('longitude', 10, 7);
            $table->decimal('latitude', 10, 7);
            $table->string('naam');
            $table->string('adres');
            $table->string('postcode');
            $table->string('plaats');
            $table->integer('capaciteit');
            $table->integer('aantal_baskets');
            $table->boolean('verlichting');
            $table->boolean('competitie');
            $table->time('openingstijden');
            $table->time('sluitingstijden');
            $table->foreignId('veld_leider')->nullable()->constrained()->references('id')->on('users');
            $table->integer('aantal_bezoekers')->nullable()->constrained();
            $table->string('conditie');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('velds');
    }
};
