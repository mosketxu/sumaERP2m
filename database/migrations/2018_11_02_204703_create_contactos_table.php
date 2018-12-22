<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Foundation\Testing\Constraints\SoftDeletedInDatabase;

class CreateContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->unsignedInteger('departamento_id');
            $table->foreign('departamento_id')->references('id')->on('departamentos');
            $table->boolean('esfacturacion')->default('1');
            $table->string('name');
            $table->string('lastname')->nullable();
            $table->string('slug')->nullable();
            $table->string('avatar')->nullable();
            $table->string('telefono1')->nullable();
            $table->string('email1')->nullable();
            $table->string('telefono2')->nullable();
            $table->string('email2')->nullable();
            $table->string('observaciones')->nullable();
            $table->boolean('estado')->default('1');
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
        Schema::dropIfExists('contactos');
    }
}
