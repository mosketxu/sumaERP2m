<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('alias')->nullable();
            $table->unsignedBigInteger('tipoempresa_id')->nullable();
            $table->foreign('tipoempresa_id')->references('id')->on('tipo_empresas');
            $table->string('direccion')->nullable();
            $table->string('codpostal')->nullable();
            $table->string('localidad')->nullable();
            $table->string('provincia_id')->nullable();
            $table->foreign('provincia_id')->references('id')->on('provincias');
            $table->string('pais_id', 2)->nullable();
            $table->foreign('pais_id')->references('id')->on('pais');
            $table->string('cifnif')->nullable();
            $table->string('tfno')->nullable();
            $table->string('email')->nullable();
            $table->string('web')->nullable();
            $table->string('idioma', 2)->default('es');
            $table->string('cuentacontable')->nullable();
            $table->integer('marta')->nullable();
            $table->integer('susana')->nullable();
            $table->boolean('estado')->default('1');
            $table->string('observaciones')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
