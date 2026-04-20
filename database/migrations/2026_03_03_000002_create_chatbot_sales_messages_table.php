<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chatbot_sales_messages', function (Blueprint $table): void {
            $table->id();
            $table->uuid('chat_id')->index(); // links to chatbot_sales_sessions.chat_id

            $table->enum('role', ['user', 'assistant', 'system']);
            $table->text('content');
            $table->unsignedSmallInteger('turn_number')->default(0); // AI turns only (user msgs = 0)

            $table->timestamps();

            $table->index(['chat_id', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chatbot_sales_messages');
    }
};
