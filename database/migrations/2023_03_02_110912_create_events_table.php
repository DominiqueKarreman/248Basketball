<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->foreignId('veld_id')->nullable()->constrained()->references('id')->on('velden');
            $table->foreignId('verantwoordelijke')->nullable()->constrained()->references('id')->on('users');
            $table->timestamp('datumTijd');
            $table->integer('aantal_aanmeldingen')->default(0);
            $table->integer('aantal_bezoekers')->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_open')->default(true);
            $table->string('beschrijving');
            $table->integer('capaciteit');
            $table->integer('duratie');
            $table->string('img_url');
            $table->string('locatie');
            $table->foreignId('locatie_id')->nullable()->constrained()->references('id')->on('locaties');
            $table->decimal('prijs')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};