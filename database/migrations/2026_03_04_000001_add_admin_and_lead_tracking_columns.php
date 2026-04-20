<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Add is_admin flag to users table
        Schema::table('users', function (Blueprint $table): void {
            $table->boolean('is_admin')->default(false)->after('email');
        });

        // Add lead-source tracking and admin notes to sessions
        Schema::table('chatbot_sales_sessions', function (Blueprint $table): void {
            $table->string('page_url', 500)->nullable()->after('user_agent');
            $table->string('referrer', 500)->nullable()->after('page_url');
            $table->text('admin_notes')->nullable()->after('referrer');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->dropColumn('is_admin');
        });

        Schema::table('chatbot_sales_sessions', function (Blueprint $table): void {
            $table->dropColumn(['page_url', 'referrer', 'admin_notes']);
        });
    }
};
