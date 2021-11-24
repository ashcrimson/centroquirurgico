<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEspecialidadGrupoBaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('especialidad_grupo_base', function (Blueprint $table) {
            $table->foreign('especialidad_id', 'fk_especialidad_grupo_base1')->references('id')->on('especialidades');
            $table->foreign('grupo_base_id', 'fk_especialidad_grupo_base2')->references('id')->on('grupo_base');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('especialidad_grupo_base', function (Blueprint $table) {
            $table->dropForeign('fk_especialidad_grupo_base1');
            $table->dropForeign('fk_especialidad_grupo_base2');
        });
    }
}
