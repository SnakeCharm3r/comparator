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
        Schema::create('ict_accesses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('start_date');
            $table->string('end_date');
            $table->enum('request_category', ['create', 'modify', 'delete']);
            $table->string('hardware_request')->nullable();
            $table->string('logical_access')->nullable();
            $table->enum('remark', ['grant', 'revoke'])->nullable();
            $table->text('email')->nullable();
            $table->text('oc')->nullable();
            $table->text('aruti')->nullable();
            $table->text('sap')->nullable();
            $table->text('vpn')->nullable();
            $table->text('pabx')->nullable();
            $table->text('nhif_qualification')->nullable();
            $table->text('physical_access')->nullable();
            $table->text('access_card')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ict_accesses');
    }
};
