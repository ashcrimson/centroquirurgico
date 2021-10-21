<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    public function up()
    {
        Schema::create('partes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id')->index('fk_partes_pacientes1_idx');
            $table->unsignedBigInteger('cirugia_tipo_id')->index('fk_partes_cirugia_tipos_idx');
            $table->unsignedBigInteger('especialidad_id')->index('fk_partes_especialidades1_idx');
            $table->unsignedBigInteger('diagnostico_id')->index('fk_partes_diagnosticos1_idx');
            $table->text('otros_diagnosticos')->nullable(); 
            $table->text('medicamentos')->nullable();
            $table->unsignedBigInteger('intervencion_id')->index('fk_partes_intervenciones1_idx');
            $table->string('lateralidad')->nullable();
            $table->text('otras_intervenciones')->nullable();
            $table->tinyInteger('cma')->nullable();
            $table->unsignedBigInteger('clasificacion_id')->index('fk_partes_clasificaciones1_idx');
            $table->integer('tiempo_quirurgico')->nullable();
            $table->string('anestesia_sugerida')->nullable();
            $table->tinyInteger('aislamiento')->nullable();
            $table->tinyInteger('alergia_latex')->nullable();
            $table->tinyInteger('usuario_taco')->nullable();
            $table->tinyInteger('nececidad_cama_upc')->nullable();
            $table->tinyInteger('prioridad')->nullable();
            $table->tinyInteger('necesita_donante_sangre')->nullable();
            $table->tinyInteger('evaluacion_preanestesica')->nullable();
            $table->tinyInteger('equipo_rayos')->nullable();
            $table->tinyInteger('insumos_especificos')->nullable();
            $table->unsignedBigInteger('preoperatorio_id')->index('fk_partes_preoperatorios1_idx');
            $table->string('biopsia')->nullable();
            $table->unsignedBigInteger('user_ingresa')->index('fk_partes_users1_idx');
            $table->unsignedBigInteger('sistemasalud_id')->index('fk_partes_sistemasaluds1_idx')->nullable();
            $table->unsignedBigInteger('grupobase_id')->index('fk_partes_grupobases1_idx')->nullable();
            $table->unsignedBigInteger('estado_id')->index('fk_partes_parte_estados1_idx');
            $table->unsignedInteger('pabellon_id')->nullable()->index('fk_partes_pabellones1_idx');
            $table->dateTime('fecha_pabellon')->nullable();
            $table->dateTime('fecha_digitacion')->nullable();
            $table->text('instrumental')->nullable();
            $table->text('observaciones')->nullable();
            $table->text('email')->nullable();
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
        Schema::dropIfExists('partes');
    }
}
