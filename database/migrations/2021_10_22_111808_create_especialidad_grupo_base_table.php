<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint; 
use Illuminate\Support\Facades\Schema;

class CreateEspecialidadGrupoBaseTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('especialidad_grupo_base', function (Blueprint $table) {
            $table->unsignedBigInteger('especialidad_id')->index('especialidad_grupo_base_idx1');
            $table->unsignedBigInteger('grupo_base_id')->index('especialidad_grupo_base_idx2');
            $table->primary(['especialidad_id', 'grupo_base_id'],'pk_especialidad_grupo_base');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('especialidad_grupo_base');
    }
}
