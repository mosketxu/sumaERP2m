<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCondicionFacturacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condicion_facturacions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->unsignedInteger('formapago_id');
            $table->foreign('formapago_id')->references('id')->on('forma_pagos');
            $table->unsignedInteger('periodopago_id');
            $table->foreign('periodopago_id')->references('id')->on('periodo_pagos');
            $table->integer('diafactura')->nullable();
            $table->integer('diavencimiento')->nullable();
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
        Schema::dropIfExists('condicion_facturacions');
    }
}
