<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToParteInsumoEspecificosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parte_insumo_especificos', function (Blueprint $table) {
            $table->foreign('parte_id', 'fk_parte_insumo_especi1')->references('id')->on('partes');
            $table->foreign('insumo_id', 'fk_parte_insumo_especi2')->references('id')->on('insumo_especifico');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parte_insumo_especificos', function (Blueprint $table) {
            $table->dropForeign('fk_parte_insumo_especificos1');
            $table->dropForeign('fk_parte_insumo_especificos2');
        });
    }
}
