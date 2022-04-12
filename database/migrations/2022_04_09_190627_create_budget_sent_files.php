<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetSentFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budget_sent_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('budget_sent');
            $table->string('path');
            $table->timestamps();

            $table->foreign('budget_sent')->references('id')->on('budget_sent');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('budget_sent_files');
    }
}
