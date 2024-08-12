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
        Schema::create('ict_access_resources', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('remarkId');
            $table->unsignedBigInteger('privilegeId');
            $table->string('email')->nullable();
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('hmisId');
            $table->unsignedBigInteger('nhifId')->nullable();
            $table->string('aruti')->nullable();
            $table->string('active_drt')->nullable();
            $table->string('VPN')->nullable();
            $table->string('pbax')->nullable();
            $table->string('sap')->nullable();
            $table->text('hardware_request')->nullable();
            $table->string('network_folder')->nullable();
            $table->string('folder_privilege')->nullable();
            $table->string('status')->nullable();
            $table->string('physical_access')->nullable();
            $table->tinyInteger('delete_status')->default(0);
            // $table->foreign('remarkId')->references('id')->on('remarks')->onDelete('cascade');
            $table->foreign('privilegeId')->references('id')->on('privilege_levels')->onDelete('cascade');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('hmisId')->references('id')->on('h_m_i_s_access_levels')->onDelete('cascade');
            $table->foreign('nhifId')->references('id')->on('nhif_qualifications')->onDelete('cascade');
            $table->timestamps();

           
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ict_access_resources');
    }
};
