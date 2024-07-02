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
            $table->bigInteger('remarkId')->unsigned();
            $table->bigInteger('privilegeId')->unsigned();
            $table->string('email')->nullable();
            $table->bigInteger('userId')->unsigned();
            $table->bigInteger('hmisId')->unsigned();
            $table->bigInteger('nhifId')->unsigned()->nullable();
            $table->bigInteger('form_id')->unsigned()->nullable();
            $table->string('aruti')->nullable();
            $table->string('active_drt')->nullable();
            $table->string('VPN')->nullable();
            $table->string('pbax')->nullable();
            $table->string('sap')->nullable();
            $table->text('hardware_request')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('physical_access')->nullable();
            $table->foreign('remarkId')->references('id')->on('remarks');
            $table->foreign('form_id')->references('id')->on('forms');
            $table->foreign('privilegeId')->references('id')->on('privilege_levels');
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('hmisId')->references('id')->on('h_m_i_s_access_levels');
            $table->integer('delete_status')->nullable();
            $table->foreign('nhifId')->references('id')->on('nhif_qualifications');

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
