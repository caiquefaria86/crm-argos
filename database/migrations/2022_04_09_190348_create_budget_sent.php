<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetSent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budget_sent', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contactId');
            $table->date('date_apresentation')->nulable();
            $table->string('type_apresentation')->nulable();
            $table->timestamps();

            $table->foreign('contactId')->references('id')->on('contacts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('budget_sent');
    }
}
