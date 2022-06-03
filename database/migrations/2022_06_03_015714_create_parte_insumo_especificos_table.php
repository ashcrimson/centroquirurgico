<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParteInsumoEspecificosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parte_insumo_especificos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('parte_id')->index('fk_parte_insumo_especiIdx1');
            $table->unsignedBigInteger('insumo_id')->index('fk_parte_insumo_especiIdx2');
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
        Schema::dropIfExists('parte_insumo_especificos');
    }
}
