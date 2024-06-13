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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('lname');
            $table->date('DOB')->nullable();
            $table->string('username');
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->enum('marital_status',['Married','Single','Divorced', 'Widower'])->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('religion')->nullable();
            $table->string('mobile')->nullable();
            $table->string('job_title')->nullable();
            $table->string('home_address')->nullable();
            $table->string('district')->nullable();
            $table->string('professional_reg_number')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('house_no')->nullable();
            $table->string('street')->nullable();
            $table->string('emp_id')->nullable();
            $table->bigInteger('deptId')->unsigned();
            $table->bigInteger('employment_typeId')->unsigned();
            // $table->bigInteger('health_info_Id')->unsigned();
            $table->string('employee_cv')->nullable();
            $table->string('NIN')->nullable();
            $table->string('nssf_no')->nullable();
            $table->string('domicile')->nullable();

            $table->string('password');
            $table->foreign('deptId')->references('id')->on('departments');
            $table->foreign('employment_typeId')->references('id')->on('employment_types');
            // $table->foreign('health_info_Id')->references('id')->on('health_details');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
