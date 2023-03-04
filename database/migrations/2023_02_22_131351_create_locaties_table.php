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
        Schema::create('locaties', function (Blueprint $table) {
            $table->id();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->string('naam');
            $table->string('adres')->nullable();
            $table->string('postcode')->nullable();
            $table->string('plaats')->nullable();
            $table->foreignId('veld_id')->nullable()->constrained()->references('id')->on('velden');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locaties');
    }
};
