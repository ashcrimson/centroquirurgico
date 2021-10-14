<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIntervencionesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervenciones', function (Blueprint $table) {
            $table->id('id');
            $table->string('cod_fonasa');
            $table->string('glosa');
            $table->string('legado_sn');
            $table->string('cod_as400');
            $table->integer('codpab');
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
        Schema::drop('intervenciones');
    }
}
