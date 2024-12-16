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
        Schema::create('scrap_emails', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email-sender');
            $table->string('email-receiver');
            $table->string('niche');
            $table->string('sequence');
            $table->string('status1')->nullable();
            $table->string('status2')->nullable();
            $table->string('status3')->nullable();
            $table->string('status4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scrap_emails');
    }
};
