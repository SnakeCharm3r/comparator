<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHslbsTable extends Migration
{
    public function up()
    {
        Schema::create('hslbs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->default(0);
            $table->string('loan_status');
            $table->string('form_iv_index_no')->nullable();
            $table->text('hr_comment')->nullable();
            $table->foreign('userId')->references('id')->on('users');
            $table->string('hr_member')->nullable();
            $table->string('signature');
            $table->date('date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hslbs');
    }
}
