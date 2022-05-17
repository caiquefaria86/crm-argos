<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {

            $table->id();
            $table->date('data_fechamento');
            $table->string('type');
            $table->string('tipoInversor')->nullable();
            $table->integer('qtd_inversores')->nullable();
            $table->float('tamanhoInversor', 8, 2)->nullable();
            $table->float('valor_material')->nullable();
            $table->float('valor_instalacao')->nullable();
            $table->float('valor_total')->nullable();
            $table->string('tipo_pagamento')->nullable();
            $table->boolean('entrada')->nullable();
            $table->string('qtd_parcelas')->nullable();
            $table->string('status')->nullable();
            $table->foreignId('client_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
