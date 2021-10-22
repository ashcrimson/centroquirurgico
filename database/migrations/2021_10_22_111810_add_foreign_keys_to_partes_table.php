<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPartesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('partes', function (Blueprint $table) {
            $table->foreign('cirugia_tipo_id', 'fk_partes_cirugia_tipos')->references('id')->on('cirugia_tipos');
            $table->foreign('clasificacion_id', 'fk_partes_clasificaciones1')->references('id')->on('clasificaciones');
            $table->foreign('convenio_id', 'fk_partes_convenios1')->references('id')->on('convenios');
            $table->foreign('diagnostico_id', 'fk_partes_diagnosticos1')->references('id')->on('diagnosticos');
            $table->foreign('especialidad_id', 'fk_partes_especialidades1')->references('id')->on('especialidades');
            $table->foreign('grupo_base_id', 'fk_partes_grupo_base1')->references('id')->on('grupo_base');
            $table->foreign('insumo_especifico_id', 'fk_partes_insumo_pecifico1')->references('id')->on('insumo_especifico');
            $table->foreign('intervencion_id', 'fk_partes_intervenciones1')->references('id')->on('intervenciones');
            $table->foreign('pabellon_id', 'fk_partes_pabellones1')->references('id')->on('pabellones');
            $table->foreign('paciente_id', 'fk_partes_pacientes1')->references('id')->on('pacientes');
            $table->foreign('estado_id', 'fk_partes_parte_estados1')->references('id')->on('parte_estados');
            $table->foreign('preoperatorio_id', 'fk_partes_preoperatorios1')->references('id')->on('preoperatorios');
            $table->foreign('reparticion_id', 'fk_partes_reparticiones1')->references('id')->on('reparticiones');
            $table->foreign('sistema_salud_id', 'fk_partes_sistema_salud1')->references('id')->on('sistema_salud');
            $table->foreign('user_ingresa', 'fk_partes_users1')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('partes', function (Blueprint $table) {
            $table->dropForeign('fk_partes_cirugia_tipos');
            $table->dropForeign('fk_partes_clasificaciones1');
            $table->dropForeign('fk_partes_convenios1');
            $table->dropForeign('fk_partes_diagnosticos1');
            $table->dropForeign('fk_partes_especialidades1');
            $table->dropForeign('fk_partes_grupo_base1');
            $table->dropForeign('fk_partes_insumo_pecifico1');
            $table->dropForeign('fk_partes_intervenciones1');
            $table->dropForeign('fk_partes_pabellones1');
            $table->dropForeign('fk_partes_pacientes1');
            $table->dropForeign('fk_partes_parte_estados1');
            $table->dropForeign('fk_partes_preoperatorios1');
            $table->dropForeign('fk_partes_reparticiones1');
            $table->dropForeign('fk_partes_sistema_salud1');
            $table->dropForeign('fk_partes_users1');
        });
    }
}
