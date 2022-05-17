<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('checklists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('checklistItem_id');
            $table->unsignedBigInteger('checklistGroup_id');
            $table->unsignedBigInteger('contact_id');
            $table->boolean('status')->default(false);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();


            $table->foreign('checklistGroup_id')->references('id')->on('checklist_groups');
            $table->foreign('checklistItem_id')->references('id')->on('checklist_items');
            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checklists');
    }
}
