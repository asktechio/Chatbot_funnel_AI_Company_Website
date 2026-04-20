<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('chatbot_sales_sessions', function (Blueprint $table) {
            $table->text('pain_points')->nullable()->after('runs_ads');
        });
    }

    public function down(): void
    {
        Schema::table('chatbot_sales_sessions', function (Blueprint $table) {
            $table->dropColumn('pain_points');
        });
    }
};
