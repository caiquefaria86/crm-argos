<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name');
            $table->string('cpf');
            $table->string('rg')->nullable();
            $table->string('cep')->nullable();
            $table->string('rua');
            $table->string('numero');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('cellphone');
            $table->string('email')->nullable();
            $table->string('origin');
            $table->unsignedBigInteger('contact_id')->nullable();
            $table->timestamps();

            $table->foreign('contact_id')->references('id')->on('contacts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
