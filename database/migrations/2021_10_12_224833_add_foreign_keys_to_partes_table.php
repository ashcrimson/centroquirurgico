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
            $table->foreign('cirugia_tipo_id', 'fk_partes_cirugia_tipos')->references('id')->on('cirugia_tipos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('clasificacion_id', 'fk_partes_clasificaciones1')->references('id')->on('clasificaciones')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('diagnostico_id', 'fk_partes_diagnosticos1')->references('id')->on('diagnosticos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('especialidad_id', 'fk_partes_especialidades1')->references('id')->on('especialidades')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('intervencion_id', 'fk_partes_intervenciones1')->references('id')->on('intervenciones')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('pabellon_id', 'fk_partes_pabellones1')->references('id')->on('pabellones')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('paciente_id', 'fk_partes_pacientes1')->references('id')->on('pacientes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('estado_id', 'fk_partes_parte_estados1')->references('id')->on('parte_estados')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('preoperatorio_id', 'fk_partes_preoperatorios1')->references('id')->on('preoperatorios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('user_ingresa', 'fk_partes_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
            $table->dropForeign('fk_partes_diagnosticos1');
            $table->dropForeign('fk_partes_especialidades1');
            $table->dropForeign('fk_partes_intervenciones1');
            $table->dropForeign('fk_partes_pabellones1');
            $table->dropForeign('fk_partes_pacientes1');
            $table->dropForeign('fk_partes_parte_estados1');
            $table->dropForeign('fk_partes_preoperatorios1');
            $table->dropForeign('fk_partes_users1');
        });
    }
}
