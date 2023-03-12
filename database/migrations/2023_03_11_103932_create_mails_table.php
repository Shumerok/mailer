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
        Schema::create('mails', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('mail_from', 255);
            $table->string('mail_to', 255);
            $table->string('mail_copy', 255)->nullable();
            $table->string('ip', 15);
            $table->string('user_agent', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mails');
    }
};
