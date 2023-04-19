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
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->foreignId('from_user')->constrained()->references('id')->on('users');
            $table->foreignId('to_user')->constrained()->references('id')->on('users');
            $table->boolean('is_read')->default(false);
            $table->timestamp('read_at')->nullable();
            $table->timestamp('sent_at')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_messages');
    }
};