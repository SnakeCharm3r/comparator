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
        Schema::create('notifications', function (Blueprint $table) {
            $table->Id('UserId')->primary();
            $table->string('full_name')->nullable();
            $table->string('relationship')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('occupation')->nullable();
            $table->string('delete_status')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
