<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('business_owner')->nullable();
            $table->string('legal_owner')->nullable();
            $table->string('reference')->nullable();
            $table->string('counterparty')->nullable();
            $table->string('telephone_number')->nullable();
            $table->string('email_address')->nullable();
            $table->string('physical_address')->nullable();
            $table->string('contract_type')->nullable();
            $table->string('internal_approval_1')->nullable();
            $table->string('internal_approval_2')->nullable();
            $table->string('status')->nullable();
            $table->decimal('contract_total_value', 15, 2)->nullable();
            $table->date('termination_date')->nullable();
            $table->date('give_notice_date')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('duration_years')->nullable();
            $table->string('services_satisfaction')->nullable();
            $table->integer('grace_period_to_new_contract')->nullable();
            $table->string('goods_services')->nullable();
            $table->string('category')->nullable();
            $table->string('review_interval')->nullable();
            $table->integer('likelihood_rating')->nullable();
            $table->integer('impact_rating')->nullable();
            $table->integer('overall_risk_score')->nullable();
            $table->text('notes_or_remarks')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vendors');
    }
}
