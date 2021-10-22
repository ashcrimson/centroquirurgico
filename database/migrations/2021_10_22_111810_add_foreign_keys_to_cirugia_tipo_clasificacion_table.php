<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCirugiaTipoClasificacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cirugia_tipo_clasificacion', function (Blueprint $table) {
            $table->foreign('cirugia_tipo_id', 'fk_cirugia_tipo_clasificacion1')->references('id')->on('cirugia_tipos');
            $table->foreign('clasificacion_id', 'fk_cirugia_tipo_clasificacion2')->references('id')->on('clasificaciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cirugia_tipo_clasificacion', function (Blueprint $table) {
            $table->dropForeign('fk_cirugia_tipo_clasificacion1');
            $table->dropForeign('fk_cirugia_tipo_clasificacion2');
        });
    }
}
