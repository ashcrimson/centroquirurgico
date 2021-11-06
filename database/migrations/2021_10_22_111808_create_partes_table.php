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
            $table->unsignedBigInteger('paciente_id')->nullable()->index('fk_partes_pacientes1_idx');
            $table->unsignedBigInteger('cirugia_tipo_id')->nullable()->index('fk_partes_cirugia_tipos_idx');
            $table->unsignedBigInteger('especialidad_id')->nullable()->index('fk_partes_especialidades1_idx');
            $table->unsignedBigInteger('diagnostico_id')->nullable()->index('fk_partes_diagnosticos1_idx');
            $table->text('otros_diagnosticos')->nullable();
            $table->unsignedBigInteger('intervencion_id')->nullable()->index('fk_partes_intervenciones1_idx');
            $table->string('lateralidad')->nullable();
            $table->text('otras_intervenciones')->nullable();
            $table->tinyInteger('cma')->nullable();
            $table->unsignedBigInteger('clasificacion_id')->nullable()->index('fk_partes_clasificaciones1_idx');
            $table->integer('tiempo_quirurgico')->nullable();
            $table->string('anestesia_sugerida')->nullable();
            $table->tinyInteger('aislamiento')->nullable();
            $table->tinyInteger('alergia_latex')->nullable();
            $table->tinyInteger('usuario_taco')->nullable();
            $table->tinyInteger('nececidad_cama_upc')->nullable();
            $table->string('tipo_cama_upc')->nullable();
            $table->tinyInteger('prioridad')->nullable();
            $table->tinyInteger('necesita_donante_sangre')->nullable();
            $table->tinyInteger('evaluacion_preanestesica')->nullable();
            $table->tinyInteger('equipo_rayos')->nullable();
            $table->tinyInteger('segundo_ojo')->nullable();
            $table->tinyInteger('prioridad_administrativa')->nullable();
            $table->tinyInteger('prioridad_clinica')->nullable();
            $table->tinyInteger('cancer')->nullable();
            $table->unsignedBigInteger('sistema_salud_id')->nullable()->index('fk_partes_sistema_salud1_idx');
            $table->enum('titular_carga',['Sí mismo','Carga'])->nullable();
            $table->unsignedBigInteger('preoperatorio_id')->nullable()->index('fk_partes_preoperatorios1_idx');
            $table->unsignedBigInteger('grupo_base_id')->nullable()->index('fk_partes_grupo_base1_idx');
            $table->unsignedBigInteger('insumo_especifico_id')->nullable()->index('fk_partes_insumo_pecifico1_idx');
            $table->string('biopsia')->nullable();
            $table->unsignedBigInteger('user_ingresa')->index('fk_partes_users1_idx');
            $table->unsignedBigInteger('estado_id')->index('fk_partes_parte_estados1_idx');
            $table->unsignedInteger('pabellon_id')->nullable()->index('fk_partes_pabellones1_idx');
            $table->tinyInteger('extrademanda')->nullable();
            $table->unsignedBigInteger('convenio_id')->nullable()->index('fk_partes_convenios1_idx');
            $table->tinyInteger('derivacion')->nullable();
            $table->unsignedBigInteger('reparticion_id')->nullable()->index('fk_partes_reparticiones1_idx');
            $table->dateTime('fecha_pabellon')->nullable();
            $table->dateTime('fecha_digitacion')->nullable();
            $table->tinyInteger('examenes_realizados')->nullable();
            $table->dateTime('fecha_examenes')->nullable();
            $table->tinyInteger('control_preop_eu')->nullable();
            $table->dateTime('fecha_preop_eu')->nullable();
            $table->tinyInteger('control_preop_medico')->nullable();
            $table->dateTime('fecha_preop_medico')->nullable();
            $table->tinyInteger('control_preop_anestesista')->nullable();
            $table->tinyInteger('consentimiento')->nullable();
            $table->dateTime('fecha_preop_anestesista')->nullable();
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
