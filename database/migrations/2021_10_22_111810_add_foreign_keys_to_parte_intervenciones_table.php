<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToParteIntervencionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parte_intervenciones', function (Blueprint $table) {
            $table->foreign('intervencion_id', 'fk_parte_intervenciones1')->references('id')->on('intervenciones');
            $table->foreign('parte_id', 'fk_parte_intervenciones2')->references('id')->on('partes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parte_intervenciones', function (Blueprint $table) {
            $table->dropForeign('fk_parte_intervenciones1');
            $table->dropForeign('fk_parte_intervenciones2');
        });
    }
}
