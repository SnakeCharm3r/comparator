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
        Schema::create('clearance_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId');
            
            $table->boolean('id_card')->default(false);
            $table->boolean('name_tag')->default(false);
            $table->boolean('nhif_cards')->default(false);
            $table->boolean('bonding_agreement')->default(false);
            $table->boolean('work_permit')->default(false);
            $table->boolean('residence_permit')->default(false);
            
            $table->boolean('changing_room_keys')->default(false);
            $table->boolean('office_keys')->default(false);
            $table->boolean('mobile_phone')->default(false);
            $table->boolean('camera')->default(false);
            $table->boolean('uniforms')->default(false);
            $table->boolean('car_keys')->default(false);
            $table->text('other_items')->nullable();
            
            $table->boolean('repaid_advance')->default(false);
            $table->boolean('informed_finance')->default(false);
            $table->boolean('repaid_imprest')->default(false);
            
            $table->boolean('laptop_returned')->default(false);
            $table->boolean('access_card_returned')->default(false);
            $table->boolean('domain_account_disabled')->default(false);
            $table->boolean('email_account_disabled')->default(false);
            $table->boolean('telephone_pin_disabled')->default(false);
            $table->boolean('openclinic_account_disabled')->default(false);
            $table->boolean('sap_account_disabled')->default(false);
            $table->boolean('aruti_account_disabled')->default(false);
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clearance_forms');
    }
};
