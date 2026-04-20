<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chatbot_sales_sessions', function (Blueprint $table): void {
            $table->id();
            $table->uuid('session_id')->unique()->index(); // client-generated, per page-load
            $table->uuid('chat_id')->unique()->index();    // server-generated on first message

            // Guided-step context collected before AI chat
            $table->string('business_type', 100)->nullable();
            $table->string('daily_enquiries', 50)->nullable();
            $table->string('channel', 50)->nullable();
            $table->string('after_hours', 20)->nullable();

            // Contact info captured at end of conversation
            $table->string('contact_name', 255)->nullable();
            $table->string('whatsapp', 30)->nullable()->index();
            $table->string('email', 255)->nullable();

            // Additional fields from inline form (when source = form)
            $table->string('business_name', 255)->nullable();
            $table->string('team_size', 50)->nullable();
            $table->string('monthly_volume', 50)->nullable();
            $table->string('runs_ads', 50)->nullable();

            $table->string('source', 30)->default('inline_chat'); // inline_chat | form
            $table->integer('total_turns')->default(0);
            $table->enum('status', ['active', 'lead_captured', 'demo_booked', 'abandoned'])
                  ->default('active')->index();

            $table->ipAddress('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();

            $table->index(['status', 'created_at']);
            $table->index(['whatsapp', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chatbot_sales_sessions');
    }
};
