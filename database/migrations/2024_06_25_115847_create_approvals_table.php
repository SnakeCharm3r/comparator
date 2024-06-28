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
        Schema::create('approvals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('approval_form_id'); //resource 
            $table->string('stage'); // e.g., 'line_manager', 'hr', 'it_manager', 'it_admin'
            $table->string('status'); // e.g., 'line_manager', 'hr', 'it_manager', 'it_admin'
            $table->bigInteger('approver_id'); // The user responsible for this stage
            $table->boolean('approved')->nullable();
            $table->text('comments')->nullable();
            $table->foreign('ict_access_resource_id')->references('id')->on('ict_access_resources');
            $table->foreign('approver_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approvals');
    }
};
